<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class SessioController extends Controller
{
    public function crear() {
        auth()->logout();

        return view('sessions.crear');
    }

    public function guarda() {
        // valida les dades, el correu ha d'existir a la BBDD
        $atributs = request()->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);
        // Comproba autenticacio
        if (! auth()->attempt($atributs)) {
            return back()
                ->withInput()
                ->withErrors([
                    'email' => 'Les credencials no s han pogut verificar correctament.'
                ]); // $errors
            // podem fer tambe
    //        throw ValidationException::withMessages([
    //        'email' => 'El correu no s ha pogut verificar correctament.'
    //        ]); // $errors

        }

        // entrem amb l'usuari i torna un missatge OK
        session()->regenerate(); // per evitar que algu faci servir la sessio un altre moment

        //return redirect('blog')->with('exitos','Bentornat/da!');
        return redirect()->route('blog')->with('exitos','Bentornat/da!');
    }
    public function destruir() {
        auth()->logout();

        //return redirect('blog')->with('success','Adeu');
        return redirect()->route('blog')->with('exitos','Adeu!');
    }
}
