<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table = 'materials';

    // Falten funcions encarrecs()  

    public function encarrecs()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsToMany(Material_Encarrec::class);
    }
}
