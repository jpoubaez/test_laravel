<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albara extends Model
{
    use HasFactory;
    protected $table='albarans';
    protected $guarded = []; // els fem tots fillable

    // per a fer cerques de dentistes
    public function scopeFiltre($query, array $filtres)
    {
        if ($filtres['cerca'] ?? false) {
            // només tornarné els albarans filtrats, no tots
            $query->where(fn($query)=>
                $query->where('data_generacio','like', '%'.request('cerca').'%') // fem una consulta SQL
            );
        }
        if ($filtres['dentista'] ?? false) {
            // només tornarné els posts filtrats, no tots
            $query->with(['encarrec' => fn($query)=>$query->where('dentista_id','like',request('dentista'))])->whereHas('encarrec',fn($query) => $query->where('dentista_id','like',request('dentista')))->get();

        }
        if ($filtres['pacient'] ?? false) {
            // només tornarné els posts filtrats, no tots
            $query->with(['encarrec' => fn($query)=>$query->where('pacient_id','like',request('pacient'))])->whereHas('encarrec',fn($query) => $query->where('pacient_id','like',request('pacient')))->get();
        }

    }

    public function factura()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Factura::class);

    }

    public function encarrec()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasOne(Encarrec::class,'albara_id');

    }
}
