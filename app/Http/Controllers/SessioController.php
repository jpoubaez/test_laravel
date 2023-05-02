<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessioController extends Controller
{
    public function destruir() {
        auth()->logout();

        return redirect('blog')->with('success','Adeu');
    }
}
