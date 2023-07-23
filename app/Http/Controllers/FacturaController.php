<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PDF;

use App\Models\Albara;
use App\Models\Encarrec;
use App\Models\Factura;


class FacturaController extends Controller
{
    public function index()
    {
        return view('ladent.factures.index',[
            'factures' => Factura::latest()->filtre(
                request(['cerca','dentista','pacient'])
            )->paginate(6)->withQueryString()
        ]);
    }

   public function mostra(Factura $factura) // la info d'una factura
    {
        return view('ladent.factures.mostra',[
        'factura' => $factura
        ]);
    }

   public function afegir_factura(Albara $albara)
    {
      

      // Fer factura a partir d'un albara
      $atributs = ([
            'tipus' => 0,
            'data_generacio' => date("Y/m/d"),
            'total_a_cobrar' => 23,
            'cobrada' => 0
      ]);
      $novafactura = Factura::create($atributs);

      // posar factura_id a $albara
      $idalbara= ([
            'factura_id' => $novafactura->id
      ]);
      $encarrec->update($idalbara);

      $retorna='/factura/'.$factura->id; // fem ruta
      return redirect($retorna)->with('exitos','La factura s ha creat.');
    }

    public function afegir_albarafactura(Albara $albara)
    {
      // Fer factura a partir d'un albara
      $atributs = ([
            'tipus' => 0,
            'data_generacio' => date("Y/m/d"),
            'total_a_cobrar' => 23,
            'cobrada' => 0
      ]);
      $novafactura = Factura::create($atributs);

      // posar factura_id a $albara
      $idalbara= ([
            'factura_id' => $novafactura->id
      ]);
      $encarrec->update($idalbara);

      $retorna='/factura/'.$factura->id; // fem ruta
      return redirect($retorna)->with('exitos','La factura s ha creat.');
    }

    public function eliminar_factura(Factura $factura)
    {
        // Pertany a molts albarans! Cal buscar-los tots
        $albarans = $factura->albarans;
        foreach ($albarans as $albara) {
            $atributs = $albara->getAttributes();
            $atributs ['factura_id'] = null;
            $albara->update( $atributs); 
        }
        
        $factura->delete();
        $retorna='/factures'; // fem ruta

        return redirect($retorna)->with('exitos','La factura s ha eliminat.');
    }

    public function eliminar_albarafactura(Albara $albara)
    {
        // Pertany a molts albarans! Cal buscar-los tots
        $albarans = $factura->albarans;
        foreach ($albarans as $albara) {
            $atributs = $albara->getAttributes();
            $atributs ['factura_id'] = null;
            $albara->update( $atributs); 
        }
        
        $factura->delete();
        $retorna='/factures'; // fem ruta

        return redirect($retorna)->with('exitos','La factura s ha eliminat.');
    }


    public function imprimeix_factura(Factura $factura)
    {
        
        $retorna='/factures'; // fem ruta

        return redirect($retorna)->with('exitos','La factura s ha imprès.');
    }
}
