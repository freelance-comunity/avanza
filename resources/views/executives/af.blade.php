<div class="modal fade" id="af" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DETALLES DE ASIGNACIÓN DE EFECTIVO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="table-inverse">
        <div class="table-responsive">
         <table class="table" id="afs">
          <thead class="thead-inverse">
            <th>Importe</th>
            <th>Concepto</th>
            <th>Fecha</th>
          </thead>
          <tbody>
            @foreach ($af as $af)
            <tr>
              <td>${{ number_format($af->ammount,2) }}</td>
              <td>{{ $af->concept }}</td>
              <td>{{ $af->created_at->format('l j F Y  H:i:s') }}</td>
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
