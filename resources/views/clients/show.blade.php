 <div class="modal fade" id="detail{{ $client->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">DETALLES</h4>
        </div>
        <div class="modal-body">
          <center>
           @php
           $branch = $client->branch;
           @endphp
            <img src="{{ asset('/uploads/avatars') }}/{!! $client->avatar !!}" width="140" height="140" border="0" class="img-circle" alt="">
            <h3 class="media-heading">{{ $client->firts_name }} {{ $client->last_name }}{{$client->mothers_last_name}} <small>{{ $branch->name }}</small></h3>
            <span><strong>IDENTIFICACIONES: </strong></span>
            <span class="label label-warning">INE:</span>
            <span class="label label-info">CURP:</span>
            <span class="label label-info">RFC:</span>
            <span class="label label-success">IMSS:</span>
          </center>
          <hr>
          <center>
            <p class="text-left"><strong>Folio: </strong><br>
              {{$client->folio}}</p>
              <br>
            </center>
            <center>
            <p class="text-left"><strong>Fecha de nacimiento: </strong><br>
              {{$client->birthdate}}</p>
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