@extends('padrao')

@section('content')

<div class="container">
    <form method="get" action="{{route('gerenciar-poltrona')}}">
    <div class="mt-3 row">
        <label for="inputPesquisar" class="col-sm-2 col-form-label">Pesquisar:</label>
        
        <div class="col-sm-8">
            <input type="text" class="form-control" name="filmepoltrona" id="inputPesquisar" placeholder="Digite o nome da poltrona">
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
        <th scope="col">Filme</th>
        <th scope="col">Qtd poltrona</th>
        <th scope="col">Tipo</th>
        <th scope="col">Alterar</th>
        <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dadosPoltrona as $dadosPoltronas)
        <tr>
        <th scope="row">{{$dadosPoltronas->id}}</th>
        <td>{{$dadosPoltronas->filmepoltrona}}</td>
        <td>{{$dadosPoltronas->qtdpoltrona}}</td>
        <td>{{$dadosPoltronas->tipopoltrona}}</td>
        <td>  
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalAlterarPoltrona-{{$dadosPoltronas->id}}">
                    Alterar
            </button>
    @include('modal.modalPoltronaAlterar')
        </td>
        <td>
        <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeletePoltrona-{{$dadosPoltronas->id}}">
            Excluir
            </button>
    @include('modal.modalPoltronaDeletar')
        </td>  
        </tr>
    @endforeach
    </tbody>
    </table>
    </div>
@endsection