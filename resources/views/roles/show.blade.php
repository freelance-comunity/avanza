 <div class="modal fade" id="detail{{ $role->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">{{ $role->display_name }}</h4>
        </div>
        <div class="modal-body">
          <p>
            <label for="name">Nombre Rol:</label> {{ $role->name }}
          </p>
          <p>
            <label for="description">Descripción Rol:</label> {{ $role->description }}
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->