<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table = 'factures';

    public function encarrec()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Encarrec::class);

    }
}
