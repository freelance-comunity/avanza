<div class="modal fade" id="ra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DETALLES DE RECUPERACIÓN ACCESS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="table-inverse">
         <div class="table-responsive">
           <table class="table" id="rec_access">
            <thead class="thead-inverse">
              <th>Importe</th>
              <th>Concepto</th>
              {{-- <th>Comprobante</th> --}}
              <th>Fecha</th>
            </thead>
            <tbody>
              @foreach ($ra as $ra)
              <tr>
                <td>${{ number_format($ra->ammount,2) }}</td>
                <td>{{ $ra->concept }}</td>
               {{--  <td>
                  <img src="{{ asset('uploads/voucher/') }}{{ $ra->voucher }}" style="width: 50px; height: 50px; float: left; border-radius: 10%; margin-right: 25px;">
                </td> --}}
                <td>{{ $ra->created_at }}</td>
                <td></td>
                
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
      $('#ra').modal('hide');
    });
  });
</script>
