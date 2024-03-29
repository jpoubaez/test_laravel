<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function posts()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        //return $this->hasMany(Post::class);
        return $this->hasMany(Post::class,'categoria_id');
    }
}

