<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encarrec extends Model
{
    use HasFactory;
    protected $table = 'encarrecs';
    protected $guarded = []; // els fem tots fillable

    // per a fer cerques de dentistes
    public function scopeFiltre($query, array $filtres)
    {
        if ($filtres['cerca'] ?? false) {
            // només tornarné els posts filtrats, no tots
            $query->where(fn($query)=>
                $query->where('descripcio','like', '%'.request('cerca').'%') // fem una consulta SQL
            );
        }
        if ($filtres['dentista'] ?? false) {
            // només tornarné els posts filtrats, no tots
            $query->where(fn($query) => // torna encarrecs amb el dentista
                $query->where('dentista_id',request('dentista')));  // que tingui un dentista determinat
        }
        if ($filtres['pacient'] ?? false) {
            // només tornarné els posts filtrats, no tots
            $query->where(fn($query) => // torna encarrecs amb pacient
                $query->where('pacient_id',request('pacient')));  // que tingui un pacient determinat
        }
    }

    // Falten funcions pacient() albara() 

    public function dentista()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Dentista::class);

    }

    public function pacient()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Pacient::class);

    }

    public function albara()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Albara::class);

    }

    public function material_encarrec()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Material_Encarrec::class,'encarrecs_id');

    }
}
