<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PDF;

use App\Models\Material;

class MaterialController extends Controller
{
    public function index()
    {

        return view('ladent.materials.index',[
            'materials' => Material::latest()->filtre(
                request(['cerca'])
            )->paginate(6)->withQueryString()
        ]);
    }

    public function mostra(Material $material) // la info d'un material
    {
        return view('ladent.materials.mostra',[
        'material' => $material
        ]);
    }

    public function afegir_material()
    {
        return view('ladent.materials.afegir');
    }

    public function guardar_material()
    {
       
        $atributs = request()->validate([
            'nom' => 'required|max:255',
            'codimaterial' => 'required|digits:5|unique:materials',
            'fotomaterial' => 'image',
            'preu_unitari' => 'required|numeric|between:0,9999.99'
        ]);        

         if (isset($atributs['fotomaterial'])) {
            $atributs['fotomaterial'] = request()->file('fotomaterial')->store('fotomaterial');
        }

        $noumaterial=Material::create($atributs);
        $retorna='/material/'.$noumaterial->id; // fem ruta

        return redirect($retorna)->with('exitos','El material s ha creat.');
    }

    public function editar_material(Material $material)
    {
        return view('ladent.materials.editar',[
        'material' => $material
        ]);
    }

    public function actualitzar_material(Material $material)
    {
       
        $atributs = request()->validate([
            'nom' => 'required|max:255',
            'codimaterial' => 'required|digits:5',
            'preu_unitari' => 'required|numeric|between:0,9999.99'
        ]);
            

        $material->update($atributs);
        $retorna='/material/'.$material->id; // fem ruta

        return redirect($retorna)->with('exitos','El material s ha actualitzat.');
    }

    public function esborrar_material(Material $material)
    {
        return view('ladent.materials.esborrar',[
        'material' => $material
        ]);
    }

    public function eliminar_material(Material $material)
    {
        $material->delete();
        $retorna='/materials'; // fem ruta

        return redirect($retorna)->with('exitos','El material s ha eliminat.');
    }

    public function imprimeix_material(Material $material)
    {
        
        $coses=$material->getAttributes();        
        $encarrecs = [
            'encarrecs' => $material->encarrecs
        ];

       
        //ddd($coses+$encarrecs);

        $pdf = PDF::loadView('ladent.materials.mostrapdf', $coses+$encarrecs);

        return $pdf->stream('material.pdf');  
    }
}
