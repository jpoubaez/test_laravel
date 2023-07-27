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
use App\Models\Albara;
use App\Models\Material_Encarrec;

use App\Models\User;
use App\Services\Newsletter;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\DentistaprovaController;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\AlbaraController;
use App\Http\Controllers\EncarrecController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\Material_EncarrecController;



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


Route::get('kk', function () {

    $encarrec = Encarrec::find(8);
    //ddd($encarrec);
    $albara =  $encarrec->albara;
    $feines =  $encarrec->material_encarrec;  
    return view('ladent.albarans.mostrapdf',[
        'encarrec'    => $encarrec,
        'albara'    => $albara,
        'feines'    => $feines 
    ]);
});

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
Route::get('dentista/{dentista:numcolegiat}', [DentistaprovaController::class, 'mostra']);
Route::get('admin/dentista/afegir', [DentistaprovaController::class, 'afegir_dentista']); // algun dia ->middleware('admin');
Route::post('admin/dentistes',[DentistaprovaController::class, 'guardar_dentista']); // algun dia ->middleware('admin');
Route::get('admin/dentista/editar/{dentista:id}', [DentistaprovaController::class, 'editar_dentista']); // algun dia ->middleware('admin');
Route::post('admin/dentista/actualitzar/{dentista:id}',[DentistaprovaController::class, 'actualitzar_dentista']); // algun dia ->middleware('admin');
Route::get('admin/dentista/esborrar/{dentista:id}', [DentistaprovaController::class, 'esborrar_dentista']); // algun dia ->middleware('admin');
Route::get('admin/dentista/eliminar/{dentista:id}',[DentistaprovaController::class, 'eliminar_dentista']); // algun dia ->middleware('admin');
Route::get('print/dentista/{dentista:id}',[DentistaprovaController::class, 'imprimeix_dentista']); // algun dia ->middleware('admin');

Route::get('pacients', [PacientController::class, 'index'])->name('pacients'); // guardo el nom de la ruta, tambe
Route::get('pacient/{pacient:id}', [PacientController::class, 'mostra']);
Route::get('admin/pacient/afegir', [PacientController::class, 'afegir_pacient']); // algun dia ->middleware('admin');
Route::post('admin/pacients',[PacientController::class, 'guardar_pacient']); // algun dia ->middleware('admin');
Route::get('admin/pacient/editar/{pacient:id}', [PacientController::class, 'editar_pacient']); // algun dia ->middleware('admin');
Route::post('admin/pacient/actualitzar/{pacient:id}',[PacientController::class, 'actualitzar_pacient']); // algun dia ->middleware('admin');
Route::get('admin/pacient/esborrar/{pacient:id}', [PacientController::class, 'esborrar_pacient']); // algun dia ->middleware('admin');
Route::get('admin/pacient/eliminar/{pacient:id}',[PacientController::class, 'eliminar_pacient']); // algun dia ->middleware('admin');
Route::get('print/pacient/{pacient:id}',[PacientController::class, 'imprimeix_pacient']); // algun dia ->middleware('admin');

Route::get('materials', [MaterialController::class, 'index'])->name('materials'); // guardo el nom de la ruta, tambe
Route::get('material/{material:id}', [MaterialController::class, 'mostra']);
Route::get('admin/material/afegir', [MaterialController::class, 'afegir_material']); // algun dia ->middleware('admin');
Route::post('admin/materials',[MaterialController::class, 'guardar_material']); // algun dia ->middleware('admin');
Route::get('admin/material/editar/{material:id}', [MaterialController::class, 'editar_material']); // algun dia ->middleware('admin');
Route::post('admin/material/actualitzar/{material:id}',[MaterialController::class, 'actualitzar_material']); // algun dia ->middleware('admin');
Route::get('admin/material/esborrar/{material:id}', [MaterialController::class, 'esborrar_material']); // algun dia ->middleware('admin');
Route::get('admin/material/eliminar/{material:id}',[MaterialController::class, 'eliminar_material']); // algun dia ->middleware('admin');
Route::get('print/material/{material:id}',[MaterialController::class, 'imprimeix_material']); // algun dia ->middleware('admin');

Route::get('encarrecs', [EncarrecController::class, 'index'])->name('encarrecs'); // guardo el nom de la ruta, tambe
Route::get('encarrec/{encarrec:id}', [EncarrecController::class, 'mostra']);
Route::get('admin/encarrec/afegir', [EncarrecController::class, 'afegir_encarrec']); // algun dia ->middleware('admin');
Route::post('admin/encarrecs',[EncarrecController::class, 'guardar_encarrec']); // algun dia ->middleware('admin');
Route::get('admin/encarrec/editar/{encarrec:id}', [EncarrecController::class, 'editar_encarrec']); // algun dia ->middleware('admin');
Route::post('admin/encarrec/actualitzar/{encarrec:id}',[EncarrecController::class, 'actualitzar_encarrec']); // algun dia ->middleware('admin');
Route::get('admin/encarrec/esborrar/{encarrec:id}', [EncarrecController::class, 'esborrar_encarrec']); // algun dia ->middleware('admin');
Route::get('admin/encarrec/eliminar/{encarrec:id}',[EncarrecController::class, 'eliminar_encarrec']); // algun dia ->middleware('admin');
Route::get('print/encarrec/{encarrec:id}',[EncarrecController::class, 'imprimeix_encarrec']); // algun dia ->middleware('admin');

Route::post('admin/materialencarrecs/afegir/{encarrec:id}',[Material_EncarrecController::class, 'guardar_material_encarrec']); // algun dia ->middleware('admin');
Route::get('admin/materialencarrecs/editar/{material_encarrec:id}', [Material_EncarrecController::class, 'editar_material_encarrec']); // algun dia ->middleware('admin');
Route::post('admin/materialencarrecs/actualitzar/{material_encarrec:id}',[Material_EncarrecController::class, 'actualitzar_material_encarrec']); // algun dia ->middleware('admin');
Route::get('admin/materialencarrecs/eliminar/{material_encarrec:id}',[Material_EncarrecController::class, 'eliminar_material_encarrec']); // algun dia ->middleware('admin');

Route::get('albarans', [AlbaraController::class, 'index'])->name('albarans'); // guardo el nom de la ruta, tambe
Route::get('albara/{albara:id}', [AlbaraController::class, 'mostra']);
Route::get('admin/albara/afegir/{encarrec:id}',[AlbaraController::class, 'afegir_albara']); // algun dia ->middleware('admin');
Route::get('admin/albara/eliminar/{encarrec:id}',[AlbaraController::class, 'eliminar_albara']); // algun dia ->middleware('admin');
Route::get('print/albara/{encarrec:id}',[AlbaraController::class, 'imprimeix_albara']); // algun dia ->middleware('admin');


Route::get('factures', [FacturaController::class, 'index'])->name('factures'); // guardo el nom de la ruta, tambe
Route::get('factura/{factura:id}', [FacturaController::class, 'mostra']);
Route::get('admin/factura/afegir/{albara:id}',[FacturaController::class, 'afegir_factura']); // algun dia ->middleware('admin');
Route::get('admin/factura/buscaralbara/{factura:id}',[FacturaController::class, 'buscar_albarafactura']); // algun dia ->middleware('admin');
Route::post('admin/factura/afegiralbara/{factura:id}',[FacturaController::class, 'afegir_albarafactura']); // algun dia ->middleware('admin');
Route::get('admin/factura/treurealbara/{albara:id}',[FacturaController::class, 'eliminar_albarafactura']); // algun dia ->middleware('admin');
Route::get('admin/factura/eliminar/{factura:id}',[FacturaController::class, 'eliminar_factura']); // algun dia ->middleware('admin');
Route::get('print/factura/{factura:id}',[FacturaController::class, 'imprimeix_factura']); // algun dia ->middleware('admin');


