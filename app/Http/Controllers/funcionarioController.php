<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Funcionario;

class funcionarioController extends Controller
{
    public function buscaCadastroFuncionario(){
        return View('cadastroFuncionario');
    }

    public function cadastrarFuncionario(Request $request){
        $dadosfuncionarios = $request->validate(
          [
            'emailfun'=> 'string|required',
            'nomefun'=> 'string|required',
            'senhafun'=> 'string|required',
            'whatsappfun'=> 'string|required',
            'cpffun'=> 'string|required'
          ]
        );
        Funcionario::create($dadosfuncionarios);
        return Redirect::route('home');
    }

    /*public function buscarFuncionario(){
      return view('gerenciadorFuncionario');
    }*/

    public function MostrarGerenciadorFuncionario(Request $request){
      $dadosfuncionarios = Funcionario::all();
      //dd($dadosfuncionarios);
      
      $dadosfuncionarios = Funcionario::query();
      $dadosfuncionarios->when($request->nomefun,function($query, $nomefuncionario){
        $query->where('nomefun', 'like', '%'.$nomefuncionario.'%');
      });

      $dadosfuncionarios = $dadosfuncionarios->get();

      return view('gerenciadorFuncionario',['dadosfuncionario'=>$dadosfuncionarios]);
      

    }

    public function ApagarFuncionario(Funcionario $registroFuncionario){
      $registroFuncionario->delete();

      return Redirect::route('gerenciar-funcionario');
    }

    public function MostrarRegistrosFuncionario(Funcionario $registros){
      return view('xxxx',['regitrosFuncionarios'=>$registroFuncionario]);
    }

    public function AlterarBancoFuncionario(Funcionario $registroFuncionario, Request $request){
      
      $dadosfuncionarios = $request->validate([
        'emailfun'=> 'string|required',
        'nomefun'=> 'string|required',
        'senhafun'=> 'string|required',
        'whatsappfun'=> 'string|required',
        'cpffun'=> 'string|required'
      ]);
    
      $registroFuncionario->fill($dadosfuncionarios);
      $registroFuncionario->save();

      return Redirect::route('gerenciar-funcionario');
    }
}
