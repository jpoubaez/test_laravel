<?php

use Illuminate\Support\Facades\Route;

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
    return view('blog');
});

Route::get('post', function () {
	$post = file_get_contents(__DIR__.'/../resources/posts/primer.html');
    return view('post', [
    	'post' => $post
    ]);
});

Route::get('posts/{post}', function ($slug) {

	$path = __DIR__."/../resources/posts/{$slug}.html";
	
	if (! file_exists($path)) { // si no la troba cridem algo
		// ddd("El fitxer no existeix"); // una funcio per fer missatge error
		// abort(404);
		return redirect('/blog'); // tornem a l'arrel
	}
	$post = file_get_contents($path);

    return view('posts', [
    	'posts_din' => $post
    ]);
});