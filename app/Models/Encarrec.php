<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encarrec extends Model
{
    use HasFactory;
    protected $table = 'encarrecs';

    public function dentista()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Dentista::class);

    }

    public function material()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Material::class);

    }
}
