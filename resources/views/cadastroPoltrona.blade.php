@extends('padrao')

@section('content')
      <form>
      <div class="mb-3 form-check">
        <label for="filmeInput" class="form-label">Filme:</label>
        <input type="text" class="form-control" id="filmeInput" aria-describedby="emailHelp">
     </div>
     <div class="mb-3 form-check">
        <label for="qtdPoltronaInput" class="form-label">Qtd de Poltrona:</label>
        <input type="number" class="form-control" id="qtdPoltronaInput" aria-describedby="emailHelp">
     </div>
     <div class="mb-3 form-check">
        <label for="salaInput" class="form-label">Sala:</label>
        <input type="text" class="form-control" id="salaInput" aria-describedby="emailHelp">
     </div>
     <div class="mb-3 form-check">
        <label for="sessaoInput" class="form-label">Sessão:</label>
        <input type="text" class="form-control" id="sessaoInput" aria-describedby="emailHelp">
     </div>
                
    <button type="submit" class="btn btn-primary">Salvar</button>
     </form>
     
@endsection