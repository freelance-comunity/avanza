<div class="modal fade" id="c" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DETALLES DE COLOCACIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="table-inverse">
        <div class="table-responsive">
         <table class="table" id="cs">
          <thead class="thead-inverse">
            <th>Importe</th>
            <th>Concepto</th>
            <th>Comprobante</th>
            <th>Fecha</th>
          </thead>
          <tbody>
            @foreach ($c as $c)
            <tr>
              <td>${{ number_format($c->ammount,2) }}</td>
              <td>{{ $c->concept }}</td>
              <td>{{ $c->voucher }}</td>
              <td>{{ $c->created_at }}</td>
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
