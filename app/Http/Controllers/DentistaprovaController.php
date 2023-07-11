<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Dentista;
class DentistaprovaController extends Controller
{
    public function index()
    {
       // return view('afegeix-dentista-post-form');


        return view('ladent.dentistes.index',[
            'dentistes' => Dentista::latest()->filtre(
                request(['cerca','clinica'])
            )->paginate(6)->withQueryString()
        ]);
    }

    public function mostra(Dentista $dentista) // la info d'un dentista
    {
        return view('ladent.dentistes.mostra',[
        'dentista' => $dentista
        ]);
    }


    public function guardar_dentista(Dentista $dentista)
    {
        
        $atributs = request()->validate([
            'titol' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts','slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'categoria_id' => ['required', Rule::exists('categories','id')] // numero categoria existent a la taula categories
        ]);

        $atributs['user_id'] = auth()->id();
        $atributs['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        
        Dentista::create($atributs);

        return redirect('/dentistes');
    }

    /*public function store(Request $request)
    {
        $Dentista = new Dentista;
        $Dentista->nom = $request->nom;
        $Dentista->cognoms = $request->cognoms;
        $Dentista->clinica = $request->clinica;
        $Dentista->adresa = $request->adresa;
        $Dentista->codipostal = $request->codipostal;
        $Dentista->ciutat = $request->ciutat;
        $Dentista->NIF = $request->NIF;
        $Dentista->numcolegiat = $request->numcolegiat;        
        $Dentista->save();
        return redirect('afegeix-dentista-post-form')->with('status', 'S ha afegit un dentista nou');
    }*/
}
