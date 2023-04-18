<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['titol','excerpt','body'];

    public function scopeFiltre($query, array $filtres)
    {
        if ($filtres['cerca'] ?? false) {
            // només tornarné els posts filtrats, no tots
            $query->where(fn($query)=>
                $query->where('titol','like', '%'.request('cerca').'%') // fem una consulta SQL
                ->orWhere('body','like', '%'.request('cerca').'%'));
        }
        /*if ($filtres['categoria'] ?? false) {
            // només tornarné els posts filtrats, no tots
            $query->whereExists(fn($query) =>
                $query->from('categories')->whereColumn('categories.id','posts.categoria_id')
                ->where('categories.slug',request('categoria')));
        }*/

        if ($filtres['categoria'] ?? false) {
            // només tornarné els posts filtrats, no tots
            $query->whereHas('categoria', fn($query) => // torna post amb la categoria
                $query->where('slug',request('categoria')));  // que tingui un slug determinat
        }

        if ($filtres['autor'] ?? false) {
            // només tornarné els posts filtrats, no tots
            $query->whereHas('autor', fn($query) => // torna post amb l autor
                $query->where('username',request('autor')));  // que tingui un username determinat
        }

    }

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
