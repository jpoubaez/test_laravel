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
        // Fa autenticacio i entrem amb l'usuari
        // torna un missatge
        if (auth()->attempt($atributs)) {
            session()->regenerate(); // per evitar que algu faci servir la sessio un altre moment
            return redirect('blog')->with('success','Bentornat/da!');
        }
        return back()
            ->withInput()
            ->withErrors([
            'email' => 'Les creedncials no s han pogut verificar correctament.'
        ]); // $errors
        // podem fer tambe
//        throw ValidationException::withMessages([
//        'email' => 'El correu no s ha pogut verificar correctament.'
//        ]); // $errors



    }
    public function destruir() {
        auth()->logout();

        return redirect('blog')->with('success','Adeu');
    }
}
