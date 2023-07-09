<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material_Encarrec extends Model
{
    use HasFactory;
    protected $table = 'materials_encarrecs';

    // Falten funcions encarrec() material()
    public function encarrec()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Encarrec::class);
    }

    public function material()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Material::class);
    }

}
