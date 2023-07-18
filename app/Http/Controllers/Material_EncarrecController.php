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

        $id_encarrec = [
            'encarrecs_id' => $encarrec->id
        ];
        $atributs = request()->validate([
            'materials_id' => 'required|numeric',
            'quantitat_material' => 'required|numeric'
        ]);
               
        $atributs = $atributs + $id_encarrec;
        
        $noumaterialencarrec=Material_Encarrec::create($atributs);
        $retorna='/admin/encarrec/editar/'.$encarrec->id; // fem ruta

        return redirect($retorna)->with('exitos','La feina s ha afegit.');
    }
}
