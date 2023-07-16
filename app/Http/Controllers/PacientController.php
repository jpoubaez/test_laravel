<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PDF;

use App\Models\Pacient;

class PacientController extends Controller
{
    public function index()
    {

        return view('ladent.pacients.index',[
            'pacients' => Pacient::latest()->filtre(
                request(['cerca'])
            )->paginate(6)->withQueryString()
        ]);
    }

    public function mostra(Pacient $pacient) // la info d'un pacient
    {
        return view('ladent.pacients.mostra',[
        'pacient' => $pacient
        ]);
    }

    public function afegir_pacient()
    {
        return view('ladent.pacients.afegir');
    }

    public function guardar_pacient()
    {
       
        $atributs = request()->validate([
            'nom' => 'max:255',
            'cognoms' => 'required|max:255'
        ]);


        $noupacient=Pacient::create($atributs);
        $retorna='/pacient/'.$noupacient->id; // fem ruta

        return redirect($retorna)->with('exitos','El pacient s ha creat.');
    }

    public function editar_pacient(Pacient $pacient)
    {
        return view('ladent.pacients.editar',[
        'pacient' => $pacient
        ]);
    }

    public function actualitzar_pacient(Pacient $pacient)
    {
       
        $atributs = request()->validate([
            'nom' => 'max:255',
            'cognoms' => 'required|max:255'
        ]);
            

        $pacient->update($atributs);
        $retorna='/pacient/'.$pacient->id; // fem ruta

        return redirect($retorna)->with('exitos','El pacient s ha actualitzat.');
    }

    public function esborrar_pacient(Pacient $pacient)
    {
        return view('ladent.pacients.esborrar',[
        'pacient' => $pacient
        ]);
    }

    public function eliminar_pacient(Pacient $pacient)
    {
        $pacient->delete();
        $retorna='/pacients'; // fem ruta

        return redirect($retorna)->with('exitos','El pacient s ha eliminat.');
    }

    public function imprimeix_pacient(Pacient $pacient)
    {
        
        $coses=$pacient->getAttributes();        
        $encarrecs = [
            'encarrecs' => $pacient->encarrecs
        ];

       
        //ddd($coses+$encarrecs);

        $pdf = PDF::loadView('ladent.pacients.mostrapdf', $coses+$encarrecs);

        return $pdf->stream('pacient.pdf');  
    }

}
