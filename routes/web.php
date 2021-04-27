<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	
    return view('welcome');
});

Route::get('blog', function () {

	$fitxers = File::files(resource_path("posts"));


	// fem dos collect->map seguits
	/*
	$posts = collect($fitxers)  // podem fer map , filter, each , merge, pull , push , 
		-> map(
			function ($fitxer) {
				return YamlFrontMatter::parseFile($fitxer);
			}
		) ->map(function ($docu) {
				return new Post($docu->titol,$docu->excerpt,$docu->data,$docu->body(),$docu->slug);
			}
		); 
*/
    //* i ho podem escriure
	$posts = collect($fitxers)  // podem fer map , filter, each , merge, pull , push , 
		-> map(fn($fitxer)=> YamlFrontMatter::parseFile($fitxer))
		->map(fn($docu)=> new Post($docu->titol,$docu->excerpt,$docu->data,$docu->body(),$docu->slug)); 
    

	/* Lo mateix d'abans pero amb collect 

	$posts = collect($fitxers)  // podem fer map , filter, each , merge, pull , push , 
		-> map(function ($fitxer) {
			$docu = YamlFrontMatter::parseFile($fitxer);

			return new Post($docu->titol,$docu->excerpt,$docu->data,$docu->body(),$docu->slug);

			}
		);
		*/

/*
	// array_map torna un array que conté els elements de $fitxers després d'aplicar a cada un la funcio function 
	$posts = array_map(function ($fitxer) {
		$docu = YamlFrontMatter::parseFile($fitxer);

		return new Post($docu->titol,$docu->excerpt,$docu->data,$docu->body(),$docu->slug);

	}, $fitxers);
	*/

	return view('blog',[
    	'posts' => $posts
    ]);
});

Route::get('post', function () {
	
	$post = file_get_contents(__DIR__.'/../resources/posts/primer.html');
    return view('post', [
    	'post' => $post
    ]);
});

Route::get('posts/{post}', function ($slug) {
	// Troba un post que té un slug i el passa a una vista que es diu posts

	$post = Post::find($slug);

	return view('posts',[
		'posts_din' => $post
	]);

})-> where ('post','[A-z]+');