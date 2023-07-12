<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Dentista;
class DentistaprovaController extends Controller
{
    public function index()
    {
       // return view('afegeix-dentista-post-form');

        return view('ladent.dentistes.index',[
            'dentistes' => Dentista::latest()->filtre(
                request(['cerca','clinica'])
            )->paginate(6)->withQueryString()
        ]);
    }

    public function mostra(Dentista $dentista) // la info d'un dentista
    {
        return view('ladent.dentistes.mostra',[
        'dentista' => $dentista
        ]);
    }

    public function afegir_dentista(Dentista $dentista)
    {
        return view('ladent.dentistes.afegir');
    }

    public function guardar_dentista(Dentista $dentista)
    {
        //$atributs = request()->all();
       
        $atributs = request()->validate([
            'cognoms' => 'required',
            'fotodentista' => 'image',
            'clinica' => 'required',
            'NIF' => 'required',
            'numcolegiat' => 'required|numeric|unique:dentistes'
        ]);


       if (isset($atributs['fotodentista'])) {
            $atributs['fotodentista'] = request()->file('fotodentista')->store('thumbnails');
        }
        
        $noudentista=Dentista::create($atributs);
        $retorna='/dentista/'.$noudentista->numcolegiat;

        return redirect($retorna)->with('exitos','El dentista s ha creat.');
    }
}
