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
        $atributs_factura = ([
            'tipus' => 0,
            'data_generacio' => date("Y/m/d"),
            'total_a_cobrar' => 0,
            'cobrada' => 0
        ]);
        $novafactura = Factura::create($atributs_factura);

        // posar factura_id a $albara
        $atributs= $albara->getAttributes();
        $atributs= ([
            'factura_id' => $novafactura->id
        ]);
        $albara->update($atributs);

        // Posar total albarà a la factura
        $atributs_factura ['total_a_cobrar'] = $albara->total;
        $novafactura->update($atributs_factura);
          
        $retorna='/factura/'.$novafactura->id; // fem ruta
        return redirect($retorna)->with('exitos','La factura s ha creat.');
    }

    public function buscar_albarafactura(Factura $factura)
    {
        // Ha de cridar una vista on es vegin tots els albarans del dentista de la factura que encara no tenen factura
        // els ha de mostrar en un desplegable i enviar id d'albarà per a canviar-li factura_id

      return view('ladent.factures.editar',[
        'factura' => $factura
        ]);
    }

    public function afegir_albarafactura(Factura $factura)
    {
        // Rebo la factura, i de parms, l'id de l'albara 
        // Recalcuré total factura amb el nou albara

        // Rebo un parametre albara_id
        $albara= Albara::where('id','like', request('albara_id'))->get()[0];
        $atributsalbara = $albara->getAttributes();
        $atributsalbara['factura_id'] = $factura->id;
        $albara->update($atributsalbara);

        $totalfactura=0;
        foreach ($factura->albarans as $albara) {
           $totalfactura=$totalfactura+$albara->total;
        }
        $atributs_factura = $factura->getAttributes();
        $atributs_factura['total_a_cobrar']=$totalfactura;
        $factura->update($atributs_factura);

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
        // Agafar factura
        $factura = $albara->factura;

        // Treu albara de la factura on esta
        $atributs = $albara->getAttributes();
        $atributs ['factura_id'] = null;
        $albara->update( $atributs);

        // Recalcular factura
        $atributs = $factura->getAttributes();
        $albarans = $factura->albarans; // ja no hi ha albara que hem tret

        $totalfactura=0;
        foreach ($albarans as $albara) {
            $totalfactura=$totalfactura+$albara->total;
        }

        $atributs ['total_a_cobrar'] = $totalfactura;
        $factura->update($atributs);
        $retorna='/albara/'.$albara->id; // fem ruta

        return redirect($retorna)->with('exitos','L albara s ha tret de la factura.');
    }


    public function imprimeix_factura(Factura $factura)
    {
        
        $retorna='/factures'; // fem ruta

        return redirect($retorna)->with('exitos','La factura s ha imprès.');
    }
}
