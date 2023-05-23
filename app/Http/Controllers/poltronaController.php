<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Poltrona;

class cadastroPoltrona extends Controller
{
    public function buscaCadastroPoltrona(){
        return View('cadastroPoltrona');
    }

    public function cadastrarPoltrona(Request $request){
        $dadosFilme= $request->validate([
            'nomepoltrona' => 'string|required',
            'atoresfil' => 'string|required',
            'datalancamentofil' => 'string|required',
            'sinopsefil' => 'string|required',
            'capafil' => 'file|required'
        ]);
        //dd($dadosFilme);

        $file = $dadosFilme['capafil'];
        $path = $file->store('capa', 'public');
        $dadosFilme['capafil'] = $path;

        Filme::create($dadosFilme);
        return Redirect::route('home');
    }
}
