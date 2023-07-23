<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table = 'factures';
    protected $guarded = []; // els fem tots fillable

    // per a fer cerques de 

    // factures amb albarans amb comandes que tenen algo
    public function scopeWithWhereHas($query, $relation, $constraint)
    {
        return $query->whereHas($relation, $constraint)->with([$relation => $constraint]);
    }

    public function scopeFiltre($query, array $filtres)
    {
        if ($filtres['cerca'] ?? false) {
            // només tornaré les factures filtrades, no totes
            $query->where(fn($query)=>
                $query->where('data_generacio','like', '%'.request('cerca').'%') // fem una consulta SQL
            );
        }

        if ($filtres['pacient'] ?? false) {

            $query->WithWhereHas('albarans',fn($query) =>$query->with(['encarrec' => fn($query)=>$query->where('pacient_id','like',request('pacient'))])->whereHas('encarrec',fn($query) => $query->where('pacient_id','like',request('pacient'))))->get();

        }
        

        if ($filtres['dentista'] ?? false) {
            // només tornarné els posts filtrats, no tots
            $query->WithWhereHas('albarans',fn($query) =>$query->with(['encarrec' => fn($query)=>$query->where('dentista_id','like',request('dentista'))])->whereHas('encarrec',fn($query) => $query->where('dentista_id','like',request('dentista'))))->get();
        }

    }

    public function albarans()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Albara::class,'factura_id');

    }
}
