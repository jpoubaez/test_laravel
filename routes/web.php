<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\Dentista;
use App\Models\Factura;
use App\Models\Material;
use App\Models\Encarrec;
use Spatie\YamlFrontMatter\YamlFrontMatter; 
use App\Http\Controllers\DentistaprovaController;

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

Route::get('posts/{post:slug}', function (Post $post) { // Aixo farà Post::where('slug',$post=>firstOrFail()) torna el primer amb l'slug a trobar
	// Troba un post directament

	return view('posts',[
		'posts_din' => $post
	]);

});

Route::get('categories', function () {
	$categories = Category::all();	

	return view('categories',[
    	'categories' => $categories
    ]);
});

Route::get('categories/{categoria:slug}', function (Category $categoria) {

	return view('blog', [
    	'posts' => $categoria->posts
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

Route::get('afegeix-dentista-post-form', [DentistaprovaController::class, 'index']);
Route::post('guarda-dentista-form', [DentistaprovaController::class, 'store']);

Route::get('factures', function () {

	$factures = Factura::all();	

	return view('factures',[
    	'factures' => $factures
    ]);
});

Route::get('factures/{factura}', function ($id) {
	// Troba una factura que té un id i el passa a una vista que es diu factura

	$factura = Factura::findOrFail($id);

	return view('factura',[
		'factura_din' => $factura
	]);

});

Route::get('encarrecs', function () {

	$encarrecs = Encarrec::all();	

	return view('encarrecs',[
    	'encarrecs' => $encarrecs
    ]);
});

Route::get('encarrecs/{encarrec}', function ($id) {
	// Troba un encarrec que té un id i el passa a una vista que es diu encarrec

	$encarrec = Encarrec::findOrFail($id);

	return view('encarrec',[
		'encarrec_din' => $encarrec
	]);

});

Route::get('materials', function () {

	$materials = Material::all();	

	return view('materials',[
    	'materials' => $materials
    ]);
});

Route::get('materials/{material}', function ($id) {
	// Troba un material que té un id i el passa a una vista que es diu material

	$material = Material::findOrFail($id);

	return view('material',[
		'material_din' => $material
	]);

});