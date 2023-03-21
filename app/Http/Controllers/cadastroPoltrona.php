<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cadastroPoltrona extends Controller
{
    public function buscaCadastroPoltrona(){
        return View('cadastroPoltrona');
    }
}
