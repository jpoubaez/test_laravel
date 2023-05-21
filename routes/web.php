<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistreController;
use App\Http\Controllers\SessioController;
use App\Http\Controllers\PostComentarisController;
use App\Http\Controllers\NewsletterController;


use App\Models\Category;
use App\Models\Dentista;
use App\Models\Factura;
use App\Models\Material;
use App\Models\Encarrec;
use App\Models\User;
use App\Services\Newsletter;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\DentistaprovaController;
use Illuminate\Validation\ValidationException;

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


Route::get('blog', [PostController::class, 'index'])->name('blog'); // guardo el nom de la ruta, tambe

Route::get('posts/{post:slug}', [PostController::class, 'mostra']);
Route::post('posts/{post:slug}/comentaris', [PostComentarisController::class, 'guarda']);

Route::post('newsletter', NewsletterController::class); // no dic funció que crido del controlador perquè he definit __invoke()

Route::get('registre',[RegistreController::class, 'crear'])->middleware('guest');
Route::post('registre',[RegistreController::class, 'guardar'])->middleware('guest');

Route::get('entrar',[SessioController::class, 'crear'])->middleware('guest');
Route::post('sessions',[SessioController::class, 'guarda'])->middleware('guest');

Route::post('sortir',[SessioController::class, 'destruir'])->middleware('auth');

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
