<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::get('posts/{post}', function ($slug) {
	// Troba un post que té un slug i el passa a una vista que es diu posts.

	$post = Post::findOrFail($slug);


	return view('posts',[
		'posts_din' => $post
	]);

});