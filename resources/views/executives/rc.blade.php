<div class="modal fade" id="rc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DETALLES DE RECUPERACIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="table-inverse">
         <div class="table-responsive">
           <table class="table" id="rcs">
            <thead class="thead-inverse">
              <th>Importe</th>
              <th>Concepto</th>
              <th>Fecha</th>
              <th>Folio</th>
              <th>Cliente</th>
              {{-- <th>Acción</th> --}}
            </thead>
            <tbody>
              @foreach ($rc as $rc)
              <tr>
                <td>${{ number_format($rc->ammount,2) }}</td>
                <td>{{ $rc->concept }}</td>
                <td>{{ $rc->created_at }}</td>
                <td><a href="{!! route('credits.show', [$rc->debt->credit->id]) !!}">{{$rc->debt->credit->folio}}</a></td>
                <td>{{$rc->debt->credit->firts_name}} {{$rc->debt->credit->last_name}} {{$rc->debt->credit->mothers_last_name}} </td>
               {{--  <td><a href="{!! route('credits.show', [$rc->debt->credit->id]) !!}"><i class="fa fa-eye fa-2x" data-toggle="tooltip" title="Ver Detalles" ></i></a></td> --}}
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
