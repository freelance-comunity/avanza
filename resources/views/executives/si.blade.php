<div class="modal fade" id="si" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DETALLES DE SALDO INICIAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="table-inverse">
        <table class="table" id="saldoI">
          <thead>
            <th>Importe</th>
            <th>Concepto</th>
            <th>Fecha</th>
          </thead>
          <tbody>
            @foreach ($si as $si)
            <tr>
              <td>${{ number_format($si->ammount,2) }}</td>
              <td>{{ $si->concept }}</td>
              <td>{{ $si->created_at }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
</div>
