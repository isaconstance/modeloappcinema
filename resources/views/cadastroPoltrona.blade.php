@extends('padrao')

@section('content') 

    <form method="post" action="{{route('cadastro-poltrona')}}">
        @csrf
            <div class="mb-3 form-check">
                <label for="filmeInput" class="form-label">Filme:</label>
                <input type="text" class="form-control" name="filmepoltrona" id="filmeInput" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 form-check">
                <label for="qtdPoltronaInput" class="form-label">Qtd de Poltrona:</label>
                <input type="number" class="form-control" name="qtdpoltrona" id="qtdPoltronaInput" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 form-check">
    <label for="tipoPoltrona" class="form-label">Tipo de Poltrona:</label>
    <select class="form-select" name="tipopoltrona" id="tipoPoltrona">
        <option value="">Selecione o tipo de poltrona</option>
        <option value="Normal">Normal</option>
        <option value="VIP">VIP</option>
        <option value="Executiva">Executiva</option>
    </select>
</div>
<div class="mb-3 form-check">
    <label for="sessaoPoltrona" class="form-label">Sessão:</label>
    <select class="form-select" name="sessaopoltrona" id="sessaoPoltrona">
        <option value="">Selecione a sessão da poltrona</option>
        <option value="Manhã">Manhã</option>
        <option value="Tarde">Tarde</option>
        <option value="Noite">Noite</option>
    </select>
</div>

            
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
        
    
    

@endsection