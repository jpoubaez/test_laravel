<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentista extends Model
{
    use HasFactory;
    protected $table = 'dentistes';

     public function encarrecs()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Encarrec::class);

    }
}
