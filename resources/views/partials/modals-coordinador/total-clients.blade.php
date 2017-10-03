<div class="modal fade" id="tc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DETALLES CLIENTES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="table-inverse">
         <div class="table-responsive">
           <table class="table" id="rcs">
            <thead class="thead-inverse">
              <th>Folio</th>
              <th>Nombre</th>
              <th>Ape. Paterno</th>
              <th>Ape. Materno</th>
              <th>Teléfono</th>
              <th>Fecha de alta</th>
            </thead>
            <tbody>
              @foreach ($clients as $client)
              <tr>
                <td>{{ $client->folio }}</td>
                <td>{{ $client->firts_name }}</td>
                <td>{{ $client->last_name }}</td>
                <td>{{ $client->mothers_last_name }}</td>
                <td>{{ $client->phone }}</td>
                <td>{{ $client->created_at }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
</div>

