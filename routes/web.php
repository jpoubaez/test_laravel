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

Route::get('admin/posts/afegir',[PostController::class, 'afegir_post'])->middleware('admin');
Route::post('admin/posts',[PostController::class, 'guardar_post'])->middleware('admin');

/* ** Controladors epou **  */

Route::get('/', [DentistaprovaController::class, 'index']); // guardo el nom de la ruta, tambe

Route::get('dentistes', [DentistaprovaController::class, 'index'])->name('dentistes'); // guardo el nom de la ruta, tambe
Route::get('dentista/{dentista:numcolegiat}', [DentistaprovaController::class, 'mostra']); // guardo el nom de la ruta, tambe
Route::get('admin/dentista/afegir', [DentistaprovaController::class, 'afegir_dentista']); // algun dia ->middleware('admin');
Route::post('admin/dentistes',[DentistaprovaController::class, 'guardar_dentista']); // algun dia ->middleware('admin');
Route::get('admin/dentista/editar/{dentista:id}', [DentistaprovaController::class, 'editar_dentista']); // algun dia ->middleware('admin');
Route::post('admin/actualitzar/{dentista:id}',[DentistaprovaController::class, 'actualitzar_dentista']); // algun dia ->middleware('admin');
Route::get('admin/dentista/esborrar/{dentista:id}', [DentistaprovaController::class, 'esborrar_dentista']); // algun dia ->middleware('admin');
Route::get('admin/eliminar/{dentista:id}',[DentistaprovaController::class, 'eliminar_dentista']); // algun dia ->middleware('admin');

Route::get('afegeix-dentista-post-form', [DentistaprovaController::class, 'index']);
Route::post('guarda-dentista-form', [DentistaprovaController::class, 'store']);

Route::get('factures', [FacturaController::class, 'index'])->name('factures'); // guardo el nom de la ruta, tambe
Route::get('factures/{factura}', [FacturaController::class, 'mostra']);

Route::get('encarrecs', [EncarrecController::class, 'index'])->name('encarrecs'); // guardo el nom de la ruta, tambe
Route::get('encarrecs/{encarrec>:id}', [EncarrecController::class, 'mostra']);

Route::get('materials', [MaterialController::class, 'index'])->name('materials'); // guardo el nom de la ruta, tambe
Route::get('materials/{material}', [MaterialController::class, 'mostra']);

Route::get('pacients', [PacientController::class, 'index'])->name('pacients'); // guardo el nom de la ruta, tambe
Route::get('pacients/{pacient}', [PacientController::class, 'mostra']); 
