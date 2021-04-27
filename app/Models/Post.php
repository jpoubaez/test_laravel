<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
		$path = resource_path("posts/{$slug}.html");
		
		if (! file_exists($path)) { // si no la troba cridem algo
			 //ddd("El fitxer no existeix"); // una funcio per fer missatge error
			 //ddd($path); // tornem el path dolent
			// abort(404);
			throw new ModelNotFoundException("Error Processing Request", 1);
			
		}

		return cache()->remember("posts.{$slug}", 5, fn() => file_get_contents($path));  
	}

	public static function all() {
		$fitxers = File::files(resource_path("posts/"));
		$fitxers_html = array_map(function ($fitxer) {
			return $fitxer->getContents();
		} , $fitxers);

		return $fitxers_html;
	}


}
?>