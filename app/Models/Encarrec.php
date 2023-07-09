<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encarrec extends Model
{
    use HasFactory;
    protected $table = 'encarrecs';

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
}
