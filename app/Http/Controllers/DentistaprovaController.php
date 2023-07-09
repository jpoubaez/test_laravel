<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Dentista;
class DentistaprovaController extends Controller
{
    public function index()
    {
        return view('afegeix-dentista-post-form');
    }
    public function store(Request $request)
    {
        $Dentista = new Dentista;
        $Dentista->nom = $request->nom;
        $Dentista->nom = $request->cognoms;
        $Dentista->nom = $request->clinica;
        $Dentista->adresa = $request->adresa;
        $Dentista->codipostal = $request->codipostal;
        $Dentista->ciutat = $request->ciutat;
        $Dentista->NIF = $request->NIF;
        $Dentista->numcolegiat = $request->numcolegiat;        
        $Dentista->save();
        return redirect('afegeix-dentista-post-form')->with('status', 'S ha afegit un dentista nou');
    }
}
