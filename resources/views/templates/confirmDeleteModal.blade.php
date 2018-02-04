<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><b>Comfirmación de eliminación</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          {{ $slot }}
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" href="{{ $getRoute }}">Eliminar</a>
        <button type="button" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
