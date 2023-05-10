
<!-- Modal -->
<div class="modal fade" id="modalDeleteFun-{{$dadosfuncionarios->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Excluir funcionário</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-dark">
        Deseja excluir o(a) funcionário(a): {{$dadosfuncionarios->id}}? </br>
        Se continuar não tem volta chefe!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

        <form method="post" action="{{route('apagar-funcionario',$dadosfuncionarios->id)}}">
            @method('delete')
            @csrf
        <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>