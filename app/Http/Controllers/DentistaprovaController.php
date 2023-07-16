<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PDF;

use App\Models\Dentista;

class DentistaprovaController extends Controller
{
    public function index()
    {
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

    public function afegir_dentista()
    {
        return view('ladent.dentistes.afegir');
    }

    public function guardar_dentista()
    {
       
        $atributs = request()->validate([
            'nom' => 'max:255',
            'cognoms' => 'required',
            'fotodentista' => 'image',
            'clinica' => 'required',
            'adresa' => 'max:255',
            'codipostal' => 'digits:5',
            'ciutat' => 'max:255',
            'NIF' => 'required',
            'numcolegiat' => 'required|numeric|unique:dentistes'
        ]);


       if (isset($atributs['fotodentista'])) {
            $atributs['fotodentista'] = request()->file('fotodentista')->store('thumbnails');
        }
            

        $noudentista=Dentista::create($atributs);
        $retorna='/dentista/'.$noudentista->numcolegiat; // fem ruta

        return redirect($retorna)->with('exitos','El dentista s ha creat.');
    }

    public function editar_dentista(Dentista $dentista)
    {
        return view('ladent.dentistes.editar',[
        'dentista' => $dentista
        ]);
    }

    public function actualitzar_dentista(Dentista $dentista)
    {
       
        $atributs = request()->validate([
            'nom' => 'max:255',
            'cognoms' => 'required',
            'fotodentista' => 'image',
            'clinica' => 'required',
            'adresa' => 'max:255',
            'codipostal' => 'digits:5',
            'ciutat' => 'max:255',
            'NIF' => 'required',
            'numcolegiat' => 'required|numeric'
        ]);


       if (isset($atributs['fotodentista'])) {
            $atributs['fotodentista'] = request()->file('fotodentista')->store('thumbnails');
        }
            

        $dentista->update($atributs);
        $retorna='/dentista/'.$dentista->numcolegiat; // fem ruta

        return redirect($retorna)->with('exitos','El dentista s ha actualitzat.');
    }

    public function esborrar_dentista(Dentista $dentista)
    {
        return view('ladent.dentistes.esborrar',[
        'dentista' => $dentista
        ]);
    }

    public function eliminar_dentista(Dentista $dentista)
    {
        $dentista->delete();
        $retorna='/dentistes'; // fem ruta

        return redirect($retorna)->with('exitos','El dentista s ha eliminat.');
    }

    public function imprimeix_dentista(Dentista $dentista)
    {
        
        $coses=$dentista->getAttributes();        
        $encarrecs = [
            'encarrecs' => $dentista->encarrecs
        ];

       
        //ddd($coses+$encarrecs);

        $pdf = PDF::loadView('ladent.dentistes.mostrapdf', $coses+$encarrecs);

        return $pdf->stream('dentista.pdf');  
    }

    
}
