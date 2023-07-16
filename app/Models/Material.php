<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table = 'materials';

    protected $guarded = []; // els fem tots fillable

    // per a fer cerques de materials
    public function scopeFiltre($query, array $filtres)
    {
        if ($filtres['cerca'] ?? false) {
            // només tornarné els posts filtrats, no tots
            $query->where(fn($query)=>
                $query->where('codimaterial','like', '%'.request('cerca').'%') // fem una consulta SQL
                ->orWhere('nom','like', '%'.request('cerca').'%')
            );
        }
    }

    public function materials_encarrecs()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Material_Encarrec::class,'materials_id');
    }
}
