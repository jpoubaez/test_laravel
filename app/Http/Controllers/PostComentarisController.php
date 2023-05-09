<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostComentarisController extends Controller
{
    public function guarda(Post $post) {
        // validar que hi ha missatge i que hi ha usuari validat, no?
        request()->validate([
            'cos' => 'required'
        ]);
        // Guardar el comentari al post que toqui
        $post->comentaris()->create([
            'user_id' => auth()->id(),
            'cos' => request('cos')
        ]);

        //redireccionar
        return back();
    }
}
