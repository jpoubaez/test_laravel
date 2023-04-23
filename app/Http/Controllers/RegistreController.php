<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistreController extends Controller
{
    //
    public function crear() {
        return view('registre.crear');
    }

    public function guardar() {
        // creem usuari i el posem a la BBDD
        // hem de rebre les dades del formulari amb request->validate
        // dump(request()->all());

        $valors=request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username', // es podria posar ['required','max:255','min:3', Rule::unique('users','username')]
            'password' => 'required|max:255|min:7', // es podria posar ['required','max:255','min:7']
            'email' => 'required|email|max:255|unique:users,email' // a més de de tenir forma fdfd@fdfd.xxx
        ]);

        // farem el hash del password amb un getPasswordAttribute a app/Models/User.php

        User::create($valors);
        return redirect('/blog');
    }
}
