<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table = 'factures';

    // Falta funcio albarans() 

    public function albarans()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Albara::class,'factura_id');

    }
}
