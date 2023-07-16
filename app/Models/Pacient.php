<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;
    protected $table='pacients';
    protected $guarded = []; // els fem tots fillable

    // per a fer cerques de dentistes
    public function scopeFiltre($query, array $filtres)
    {
        if ($filtres['cerca'] ?? false) {
            // només tornarné els posts filtrats, no tots
            $query->where(fn($query)=>
                $query->where('nom','like', '%'.request('cerca').'%') // fem una consulta SQL
                ->orWhere('cognoms','like', '%'.request('cerca').'%')
            );
        }
    }


    public function encarrecs()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Encarrec::class,'pacient_id');
    }
}
