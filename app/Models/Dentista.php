<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentista extends Model
{
    use HasFactory;
    protected $table = 'dentistes';

    // per a fer cerques de dentistes
    public function scopeFiltre($query, array $filtres)
    {
        if ($filtres['cerca'] ?? false) {
            // només tornarné els posts filtrats, no tots
            $query->where(fn($query)=>
                $query->where('clinica','like', '%'.request('cerca').'%') // fem una consulta SQL
                ->orWhere('nom','like', '%'.request('cerca').'%')
                ->orWhere('cognoms','like', '%'.request('cerca').'%')
                ->orWhere('numcolegiat','like', '%'.request('cerca').'%')
            );
        }
        if ($filtres['clinica'] ?? false) {
            // només tornarné els posts filtrats, no tots
            $query->where(fn($query) => // torna dentista amb la clinica
                $query->where('clinica',request('clinica')));  // que tingui un nom determinat
        }
    }

    public function encarrecs()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Encarrec::class,'dentista_id')->orderBy('created_at','desc');

    }
}
