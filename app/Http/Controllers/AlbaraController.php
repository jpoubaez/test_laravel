<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PDF;

use App\Models\Albara;
use App\Models\Encarrec;

class AlbaraController extends Controller
{
   public function index()
    {
        return view('ladent.albarans.index',[
            'albarans' => Albara::latest()->filtre(
                request(['cerca','dentista','pacient'])
            )->paginate(6)->withQueryString()
        ]);
    }

   public function mostra(Albara $albara) // la info d'un albara
    {
        return view('ladent.albarans.mostra',[
        'albara' => $albara
        ]);
    }

   public function afegir_albara(Encarrec $encarrec)
    {
      // Calcular total de l'encarrec

      // Fer albara i posar total i associar a encarrec
      $atributs = ([
            'data_generacio' => date("Y/m/d"),
            'total' => 23,
            'entregat' => 0
      ]);
      $noualbara = Albara::create($atributs);

      // posar albara_id a $encarrec
      $idalbara= ([
            'albara_id' => $noualbara->id
      ]);
      $encarrec->update($idalbara);

      $retorna='/encarrec/'.$encarrec->id; // fem ruta
      return redirect($retorna)->with('exitos','L albara s ha creat.');
    }

    public function eliminar_albara(Encarrec $encarrec)
    {
        $albara=$encarrec->albara;
        $atributs = $encarrec->getAttributes();
        $atributs ['albara_id'] = null;
        $encarrec->update( $atributs);  

        $albara->delete();
        $retorna='/albarans'; // fem ruta

        return redirect($retorna)->with('exitos','L albarà s ha eliminat.');
    }
}
