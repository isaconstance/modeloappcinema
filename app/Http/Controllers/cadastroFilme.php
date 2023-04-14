<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Models\Filme;

class cadastroFilme extends Controller
{
    //construimos o CRUD aqui

    public function buscaCadastroFilme(){
        return View('cadastroFilme');
    }

    public function cadastrarFilme(Request $request){
        $dadosFilme= $request->validate([
            'nomefil' => 'string|required',
            'atoresfil' => 'string|required',
            'datalancamentofil' => 'string|required',
            'sinopsefil' => 'string|required',
            'capafil' => 'file|required'
        ]);
        //dd($dadosfilmes);

        $file = $dadosFilme['capafil'];
        $path = $file->store('capa', 'public');
        $dadosFilme['capafil'] = $path;

        Filme::create($dadosFilme);
        //return Redirect::route('cadastro-filme');


    }
}
