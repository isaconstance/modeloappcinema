<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Models\Filme;

class filmeController extends Controller
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
        return Redirect::route('home');

    }
    
    public function MostrarGerenciadorFilme(Request $request){
        $dadosFilmes = Filme::all();
        //dd($dadosFilmes);
        
        $dadosFilmes = Filme::query();
        $dadosFilmes->when($request->nome,function($query, $nomefilme){
          $query->where('nomefil', 'like', '%'.$nomefilme.'%');
        });
  
        $dadosFilmes = $dadosFilmes->get();
  
        return view('gerenciadorFilme',['dadosFilme'=>$dadosFilmes]);
        
      }

      public function ApagarBancoFilme(Filme $registrosFilmes){
        $registrosFilmes->delete();

        return Redirect::route('gerenciar-Filme');
    }

    public function MostrarRegistrosFilme(Filme $registrosFilmes){
        return view('xxxx',['registrosFilmes'=>$registrosFilmes]);
    }

    public function AlterarBancoFilme(Filme $registrosFilmes, Request $request){
        $dadosFilmes = $request->validate([
            'nomefil' => 'string|required',
            'atoresfil' => 'string|required',
            'datalancamentofil' => 'string|required',
            'sinopsefil' => 'string|required',
            'capafil' => 'file|required'
        ]);

        $registrosFilmes->fill($dadosFilmes);
        $registrosFilmes->save();

        return Redirect::route('gerenciar-Filme');
    }
}
