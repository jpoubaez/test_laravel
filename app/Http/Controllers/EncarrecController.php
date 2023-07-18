<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PDF;

use App\Models\Dentista;
use App\Models\Pacient;
use App\Models\Albara;
use App\Models\Encarrec;




class EncarrecController extends Controller
{
    public function index()
    {
        return view('ladent.encarrecs.index',[
            'encarrecs' => Encarrec::latest()->filtre(
                request(['cerca','dentista','pacient'])
            )->paginate(6)->withQueryString()
        ]);
    }

    public function mostra(Encarrec $encarrec) // la info d'un dentista
    {
        return view('ladent.encarrecs.mostra',[
        'encarrec' => $encarrec
        ]);
    }

    public function afegir_encarrec()
    {
        return view('ladent.encarrecs.afegir');
    }

    public function guardar_encarrec()
    {
       
        $atributs = request()->validate([
            'descripcio' => 'required|max:255',
            'data_entrega' => 'nullable|date',
            'pacient_id' => 'required|numeric',
            'dentista_id' => 'required|numeric'
        ]);

        $nouencarrec=Encarrec::create($atributs);
        $retorna='/encarrec/'.$nouencarrec->id; // fem ruta

        return redirect($retorna)->with('exitos','L encarrec s ha creat.');
    }

    public function editar_encarrec(Encarrec $encarrec)
    {
        return view('ladent.encarrecs.editar',[
        'encarrec' => $encarrec
        ]);
    }

    public function actualitzar_encarrec(Encarrec $encarrec)
    {
           
        $atributs = request()->validate([
            'descripcio' => 'required|max:255',
            'data_entrega' => 'nullable|date',
            'pacient_id' => 'required|numeric',
            'dentista_id' => 'required|numeric'
        ]);

        $encarrec->update($atributs);
        $retorna='/encarrec/'.$encarrec->id; // fem ruta

        return redirect($retorna)->with('exitos','L encarrec s ha actualitzat.');
    }

    public function esborrar_encarrec(Encarrec $encarrec)
    {
        return view('ladent.encarrecs.esborrar',[
        'encarrec' => $encarrec
        ]);
    }

    public function eliminar_encarrec(Encarrec $encarrec)
    {
        $encarrec->delete();
        $retorna='/encarrecs'; // fem ruta

        return redirect($retorna)->with('exitos','L encarrec s ha eliminat.');
    }

    public function imprimeix_encarrec(Encarrec $encarrec)
    {
        
        $coses=$encarrec->getAttributes();        
        $linies = [
            'encarrecs' => $encarrec->encarrec_material
        ];

       
        //ddd($coses+$encarrecs);

        $pdf = PDF::loadView('ladent.encarrecs.mostrapdf', $coses+$linies);

        return $pdf->stream('encarrec.pdf');  
    }

}
