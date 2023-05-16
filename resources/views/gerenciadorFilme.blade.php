@extends('padrao')

@section('content')

<div class="container">
  <form method="get" action="{{route('gerenciar-filme')}}">
    <div class="mt-3 row">
        <label for="inputPesquisar" class="col-sm-2 col-form-label">Pesquisar:</label>
        
        <div class="col-sm-8">
            <input type="text" class="form-control" name="nomefilme" id="inputPesquisar" placeholder="Digite o nome do filme">
        </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-dark">Pesquisar</button>
            </div>
    </div>
  </form>
</div>
<div class="container my-3">
    <table class="table table-dark table-hover">
    <thead>
        <tr>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">Atores</th>
        <th scope="col">Alterar</th>
        <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
      
    @foreach($dadosfilme as $dadosfilmes)
        <tr>
        <td scope="row">{{$dadosfilmes->id}}</td>
        <td>{{$dadosfilmes->nomefil}}</td>
        <td>{{$dadosfilmes->atoresfil}}</td> 
        </td>      
    

      <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalAlterarFil-{{$dadosfilmes->id}}">
          Alterar
        </button>

@include('modal.filmesAlterar')

    
    </td>
      <td>

      <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteFil-{{$dadosfilmes->id}}">
          Excluir
        </button>

@include('modal.filmesDeletar')

      </td>  

    </tr>
   @endforeach
  </tbody>
</table>

</div>
@endsection