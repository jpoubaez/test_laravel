<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;
    protected $table='pacients';

    // Falten funcions encarrecs() 

    public function encarrecs()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Encarrec::class,'pacient_id');
    }
}
