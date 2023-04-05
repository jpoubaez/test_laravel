<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['titol','excerpt','body'];

    public function categoria()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);

    }


    //public function user() // assumeix que la foreign key es user_id
    public function autor() 
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id'); // li puc forçar el camp on hi ha la foreign key
    }
}
