<div class="modal fade" id="g" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DETALLES DE GASTOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="table-inverse">
         <div class="table-responsive">
           <table class="table" id="gs">
            <thead class="thead-inverse">
              <th>Importe</th>
              <th>Concepto</th>
              <th>Descripción</th>
              <th>Tipo de Gasto</th>
              <th>Comprobante</th>
              <th>Fecha</th>
            </thead>
            <tbody>
              @foreach ($g as $g)
              <tr>
                <td>${{ number_format($g->ammount,2) }}</td>
                <td>{{ $g->concept }}</td>
                <td>{{ $g->description}}</td>
                <td>{{ $g->type }}</td>
                <td>
                  <img src="{{ asset('uploads/voucher/') }}{{ $g->voucher }}" style="width: 50px; height: 50px; float: left; border-radius: 10%; margin-right: 25px;">
                </td>
                <td>{{ $g->created_at }}</td>
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
{{-- IMG CLICK --}}
<script>
  $(function() {
    $('img').on('click', function() {
      $('.enlargeImageModalSource').attr('src', $(this).attr('src'));
      $('#enlargeImageModal').modal('show');
      $('#g').modal('hide');
    });
  });
</script>
