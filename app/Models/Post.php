<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/**
 * 
 */
class Post 
{
	
	public $titol;
	public $excerpt;
	public $data;
	public $body;
	public $slug;

	public function __construct($titol, $excerpt, $data, $body, $slug)
	{

		$this->titol = $titol;
		$this->excerpt = $excerpt;
		$this->data = $data;
		$this->body = $body;
		$this->slug = $slug;

	}

	public static function find($slug)
	{
		// Trobar un slug que coincideixi amb el demanat
		// Cridarem tots els posts i en mirarem el slug
		$posts = static::all();
		
		return $posts->firstWhere('slug',$slug);
	}

	public static function all() {
	    
		return cache()->rememberForever('posts.all', function(){ 
			return collect(File::files(resource_path("posts")))  // podem fer map , filter, each , merge, pull , push , 
			-> map(fn($fitxer)=> YamlFrontMatter::parseFile($fitxer))
			->map(fn($docu)=> new Post($docu->titol,$docu->excerpt,$docu->data,$docu->body(),$docu->slug))->sortByDesc('data'); 
		});
	}

}
?>