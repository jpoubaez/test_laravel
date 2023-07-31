<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
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
            'total' => 0,
            'entregat' => 0
        ]);

        $totalencarrec = 0;
        foreach($encarrec->material_encarrec as $liniaencarrec)
            $totalencarrec+=$liniaencarrec->sub_total;
        
        $atributs['total'] = $totalencarrec;
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

    public function mostra_albara(Encarrec $encarrec)
    {
        
        $albara =  $encarrec->albara;
        $atributs = $albara->getAttributes();
        $atributs['data_entrega'] = today()->toDateTimeString();
        $albara->update($atributs);

        $feines =  $encarrec->material_encarrec;

        $data = [
            'encarrec'    => $encarrec,
            'albara'    => $albara,
            'feines'    => $feines 
        ];
        
        $pdf = PDF::loadView('ladent.albarans.plantilla',$data);
        return $pdf->stream('albara.pdf'); // el mostra 
    }

    public function imprimeix_albara(Encarrec $encarrec)
    {
        
        $albara =  $encarrec->albara;
        $atributs = $albara->getAttributes();
        $atributs['data_entrega'] = today()->toDateTimeString();
        $albara->update($atributs);
        //ddd($albara);

        $feines =  $encarrec->material_encarrec;
        

        $data = [
            'encarrec'    => $encarrec,
            'albara'    => $albara,
            'feines'    => $feines 
        ];
        
        
        //$pdf = PDF::loadView('ladent.dentistes.mostrapdf2');
        //$pdf = PDF::loadView('ladent.albarans.mostrapdf',$data);
        $pdf = PDF::loadView('ladent.albarans.plantilla',$data);
        
        //$retorna='/albara/'.$albara->id;; // fem ruta
        //return redirect($retorna)->with('exitos','L albarà s ha imprès.');  

        //return $pdf->stream('albara.pdf'); // el mostra
        return $pdf->download('albara.pdf'); // el baixa
    }
}
