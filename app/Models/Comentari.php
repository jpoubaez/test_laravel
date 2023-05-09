<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentari extends Model
{
    use HasFactory;

    //protected $guarded = [];  // els fem tots fillable

    public function autor() // Com que el nom de la funcio no es igual al camp, CAL explicitar abaix
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class,'user_id');

    }

    public function post() // Com que el nom de la funcio es igual al camp, no cal explicitar abaix
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Post::class);

    }
}
