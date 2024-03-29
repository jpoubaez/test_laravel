<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PDF;

use App\Models\Dentista;
use App\Models\Pacient;
use App\Models\Albara;
use App\Models\Encarrec;
use App\Models\Material_Encarrec;

class Material_EncarrecController extends Controller
{
    public function guardar_material_encarrec(Encarrec $encarrec)
    {


        $atributs = request()->validate([
            'materials_id' => 'required|numeric',
            'quantitat_material' => 'required|numeric'
        ]);

         $id_encarrec = [
            'sub_total' => 0,
            'encarrecs_id' => $encarrec->id
        ];
               
        $atributs = $atributs + $id_encarrec;
        
        $noumaterialencarrec=Material_Encarrec::create($atributs);
        $subtotal = [
            'sub_total' => ($noumaterialencarrec->quantitat_material * $noumaterialencarrec->material->preu_unitari)
        ];

        $noumaterialencarrec->update($subtotal);

        $retorna='/admin/encarrec/editar/'.$encarrec->id; // fem ruta
        return redirect($retorna)->with('exitos','La feina s ha afegit.');
    }

    public function editar_material_encarrec(Material_Encarrec $material_encarrec)
    {
        return view('ladent.material_encarrecs.editar',[
        'material_encarrec' => $material_encarrec
        ]);
    }

    public function actualitzar_material_encarrec(Material_Encarrec $material_encarrec)
    {
        $atributs = request()->validate([
            'materials_id' => 'required|numeric',
            'quantitat_material' => 'required|numeric'
        ]);

        $material_encarrec->update($atributs);
        $sub_total=$material_encarrec->material->preu_unitari * $material_encarrec->quantitat_material;
        $atributsnous = $material_encarrec->getAttributes();
        $atributsnous['sub_total']=$sub_total;
        $material_encarrec->update($atributsnous);

        $retorna='/admin/encarrec/editar/'.$material_encarrec->encarrecs_id; // fem ruta

        return redirect($retorna)->with('exitos','La línia s ha actualitzat.');
    }

    public function eliminar_material_encarrec(Material_Encarrec $material_encarrec)
    {
        $retorna='/admin/encarrec/editar/'.$material_encarrec->encarrecs_id; // fem ruta

        $material_encarrec->delete();
        
        return redirect($retorna)->with('exitos','La línia s ha eliminat.');
    }
}
