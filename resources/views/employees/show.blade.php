 <div class="modal fade" id="detail{{ $employee->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">DETALLES</h4>
        </div>
        <div class="modal-body">
          <center>
            <img src="{{ asset('/uploads/avatars') }}/{!! $employee->avatar !!}" width="140" height="140" border="0" class="img-circle" alt="">
            <h3 class="media-heading">{{ $employee->name }} {{ $employee->father_last_name }} <small>{{ $employee->place_of_birth }}</small></h3>
            <span><strong>IDENTIFICACIONES: </strong></span>
            <span class="label label-warning">INE:</span>
            <span class="label label-info">CURP:</span>
            <span class="label label-info">RFC:</span>
            <span class="label label-success">IMSS:</span>
          </center>
          <hr>
          <center>
            <p class="text-left"><strong>Bio: </strong><br>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.</p>
              <br>
            </center>
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