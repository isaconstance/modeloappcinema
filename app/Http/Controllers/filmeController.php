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
        //dd($dadosFilme);

        $file = $dadosFilme['capafil'];
        $path = $file->store('capa', 'public');
        $dadosFilme['capafil'] = $path;

        Filme::create($dadosFilme);
        return Redirect::route('home');
    }
    
    public function MostrarGerenciadorFilme(Request $request){
        $dadosFilme = Filme::all();
        //dd($dadosFilme);
        
        $dadosFilme = Filme::query();
        $dadosFilme->when($request->nomefil,function($query, $nomeFilme){
          $query->where('nomefil', 'like', '%'.$nomeFilme.'%');
        });
  
        $dadosFilme = $dadosFilme->get();
  
        return view('gerenciadorFilme',['dadosFilme'=>$dadosFilme]);
        
      }

      public function ApagarFilme(Filme $registroFilme){
        $registroFilme->delete();

        return Redirect::route('gerenciar-filme');
    }

    public function MostrarRegistroFilme(Filme $registros){
        return view('xxxx',['registrosFilme'=>$registroFilme]);
    }

    public function AlterarBancoFilme(Filme $registroFilme, Request $request){

        $dadosFilme = $request->validate([
            'nomefil' => 'string|required',
            'atoresfil' => 'string|required',
            'datalancamentofil' => 'string|required',
            'sinopsefil' => 'string|required',
            'capafil' => 'file|required'
        ]);

        $registroFilme->fill($dadosFilme);
        $registroFilme->save();

        return Redirect::route('gerenciar-filme');
    }
}
