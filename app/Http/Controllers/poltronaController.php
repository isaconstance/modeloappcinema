<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Poltrona;

class poltronaController extends Controller
{
    public function buscaCadastroPoltrona(){
        return View('cadastroPoltrona');
    }

    public function cadastrarPoltrona(Request $request){
        $dadosPoltrona = $request->validate([
            'filmepoltrona' => 'string|required',
            'qtdpoltrona' => 'string|required',
            'tipopoltrona' => 'string|required',
            'sessaopoltrona' => 'string|required'
        ]);
        
        Poltrona::create($dadosPoltrona);
        return Redirect::route('cadastro-poltrona');
    }


public function MostrarGerenciadorPoltrona(Request $request) {

        
    $dadosPoltronas = collect();

    
 if ($request->filled('filmepoltrona')) {
    
     $dadosPoltronas = Poltrona::query()
         ->where('filmepoltrona', 'like', '%' . $request->filmepoltrona . '%')
         ->get();
 }

     return view('gerenciadorPoltrona', ['dadosPoltrona'=> $dadosPoltronas]);
    
 }

  public function ApagarPoltrona(Poltrona $registroPoltrona){
    $registroPoltrona->delete();

    return Redirect::route('gerenciar-poltrona');
  }

public function MostrarRegistroPoltrona(Poltrona $registroPoltrona){
    return view('xxxx',['registroPoltrona' => $registroPoltrona]);

}
public function AlterarBancoPoltrona(Poltrona $registroPoltrona, Request $request){
    $dadosPoltrona = $request->validate([
        'filmepoltrona' => 'string|required',
        'qtdpoltrona' => 'string|required',
        'tipopoltrona' => 'string|required',
        'sessaopoltrona' => 'string|required'
    ]);
    $registroPoltrona->fill($dadosPoltrona);
    $registroPoltrona->save();

    return Redirect::route('gerenciar-poltrona');
    }
}