<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albara extends Model
{
    use HasFactory;
    protected $table='albarans';

    public function factura()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Factura::class);

    }

    public function encarrec()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasOne(Encarrec::class,'albara_id');

    }
}
