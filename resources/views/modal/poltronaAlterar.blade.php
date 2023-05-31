
<!-- Modal -->
<div class="modal fade" id="modalAlterarPoltrona-{{$dadosPoltronas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Alterar Poltrona</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body text-light">
            
        
        <form method="post" action="{{route('alterar-banco-poltrona', $dadosPoltronas->id)}}">
        @method('put')
        @csrf
            <div class="mb-3 form-check">
                <label for="filmeInput" class="form-label">Filme:</label>
                <input type="text" class="form-control" name="filmepoltrona" value="{{$dadosPoltronas->filmepoltrona}}" id="filmeInput" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 form-check">
                <label for="qtdPoltronaInput" class="form-label">Qtd de Poltrona:</label>
                <input type="number" class="form-control" name="qtdpoltrona" value="{{$dadosPoltronas->qtdpoltrona}}" id="qtdPoltronaInput" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 form-check">
    <label for="tipoPoltrona" class="form-label">Tipo de Poltrona:</label>
    <select class="form-select" name="tipopoltrona" id="tipoPoltrona">
        <option value="">Selecione o tipo de poltrona</option>
        <option value="Normal" {{ $dadosPoltronas->tipopoltrona == 'Normal' ? 'selected' : '' }}>Normal</option>
        <option value="VIP" {{ $dadosPoltronas->tipopoltrona == 'VIP' ? 'selected' : '' }}>VIP</option>
        <option value="Executiva" {{ $dadosPoltronas->tipopoltrona == 'Executiva' ? 'selected' : '' }}>Executiva</option>
    </select>
</div>

<div class="mb-3 form-check">
    <label for="sessaoPoltrona" class="form-label">Sessão:</label>
    <select class="form-select" name="sessaopoltrona" id="sessaoPoltrona">
        <option value="">Selecione a sessão da poltrona</option>
        <option value="Manhã" {{ $dadosPoltronas->sessaopoltrona == 'Manhã' ? 'selected' : '' }}>Manhã</option>
        <option value="Tarde" {{ $dadosPoltronas->sessaopoltrona == 'Tarde' ? 'selected' : '' }}>Tarde</option>
        <option value="Noite" {{ $dadosPoltronas->sessaopoltrona == 'Noite' ? 'selected' : '' }}>Noite</option>
    </select>
</div>


            
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>