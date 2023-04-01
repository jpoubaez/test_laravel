<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Dentista;
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

	$posts = Post::all();	

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

Route::get('posts/{post}', function ($id) {
	// Troba un post que té un id i el passa a una vista que es diu posts

	$post = Post::findOrFail($id);

	return view('posts',[
		'posts_din' => $post
	]);

});

Route::get('dentistes', function () {

	$dentistes = Dentista::all();	

	return view('dentistes',[
    	'dentistes' => $dentistes
    ]);
});

Route::get('dentistes/{dentista}', function ($id) {
	// Troba un dentista que té un id i el passa a una vista que es diu dentista

	$dentista = Dentista::findOrFail($id);

	return view('dentista',[
		'dentista_din' => $dentista
	]);

});