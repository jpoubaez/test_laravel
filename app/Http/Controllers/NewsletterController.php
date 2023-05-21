<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter) // si ho faig servir, a la crida del controlador no cal dir la funció que vull
    {
        request()->validate(['email' => 'required|email']);

        try {
            $newsletter->subscriure(request('email'));
        }
        catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'Aquesta adreça és incorrecta i no es pot afegir a la newsletter!'
            ]);
        }
        return redirect()->route('blog')->with('exitos','Ara formes part de la nostra newsletter!');

    }
}
