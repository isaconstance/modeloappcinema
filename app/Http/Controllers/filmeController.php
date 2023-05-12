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
        $dadosfilmes= $request->validate([
            'nomefil' => 'string|required',
            'atoresfil' => 'string|required',
            'datalancamentofil' => 'string|required',
            'sinopsefil' => 'string|required',
            'capafil' => 'file|required'
        ]);
        //dd($dadosfilmes);

        $file = $dadosfilmes['capafil'];
        $path = $file->store('capa', 'public');
        $dadosfilmes['capafil'] = $path;

        Filme::create($dadosfilmes);
        return Redirect::route('home');

    }
    
    public function MostrarGerenciadorFilme(Request $request){
        $dadosfilmes = Filme::all();
        //dd($dadosFilmes);
        
        $dadosfilmes = Filme::query();
        $dadosfilmes->when($request->nomefil,function($query, $nomefilme){
          $query->where('nomefil', 'like', '%'.$nomefilme.'%');
        });
  
        $dadosfilmes = $dadosfilmes->get();
  
        return view('gerenciadorFilme',['dadosfilme'=>$dadosfilmes]);
        
      }

      public function ApagarFilme(Filme $registroFilme){
        $registroFilme->delete();

        return Redirect::route('gerenciar-filme');
    }

    public function MostrarRegistrosFilme(Filme $registros){
        return view('xxxx',['registrosFilmes'=>$registroFilme]);
    }

    public function AlterarBancoFilme(Filme $registroFilme, Request $request){
        $dadosfilmes = $request->validate([
            'nomefil' => 'string|required',
            'atoresfil' => 'string|required',
            'datalancamentofil' => 'string|required',
            'sinopsefil' => 'string|required',
            'capafil' => 'file|required'
        ]);

        $registroFilme->fill($dadosfilmes);
        $registroFilme->save();

        return Redirect::route('gerenciar-filme');
    }
}
