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
      
    @foreach($dadosFilme as $dadosFilmes)
        <tr>
        <td scope="row">{{$dadosFilmes->id}}</td>
        <td>{{$dadosFilmes->nomefil}}</td>
        <td>{{$dadosFilmes->atoresfil}}</td>      
        <td><a href="{{route('mostrar-filme', $dadosFilmes->id)}}">Alterar</a></td>
        <td>
            <form method="post" action="{{route('apagar-filme', $dadosFilmes->id)}}">
            @method('delete')
            @csrf
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"> Excluir </button>
            <form>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content bg-dark">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Atenção</h1>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      Tem certeza que deseja excluir?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                  </div>
                </div>
              </div>
            </div>
        </tr>
    </tbody>
    @endforeach
</div>




@endsection