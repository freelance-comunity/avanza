<div class="modal fade" id="record_expense" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR GASTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => 'recordExpense','data-parsley-validate' => '',  'files' => 'true','onsubmit'=>'return enviado()']) !!}
        <p>
          {!! Form::label('ammount', 'Monto:') !!}
          <input type="number" name="ammount" class="form-control input-lg" placeholder="ESCRIBE MONTO" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="5">
          <input type="hidden"  name="user_id" value="{{ $user->id }}">
        </p>
        <p>
          {!! Form::label('type', 'Tipo de Gasto:') !!}
          <select name="type" class="form-control input-lg">
            <option>Artículos de Limpieza</option>
            <option>Combustible</option>
            <option>Energía Eléctrica (luz)</option>
            <option>Fotocopias</option>
            <option>Papeleria y Articulos de Oficina</option>
            <option>Pasajes</option>
            <option>Recarga Celular</option>
            <option>Renta de Inmuebles</option>
            <option>Renta Internet y Telefonía Fija</option>
            <option>Servicio Agua Oficinas</option>
            <option>Toner y Cartuchos Impresora</option>
            <option>Viáticos</option>
          </select>
        </p>
        <p>
          {!! Form::label('concept', 'Descripción:') !!}
          <input type="text" name="description" class="form-control input-lg" placeholder="ESCRIBE DESCRIPCIÓN" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="5">
        </p>
        <input type="hidden" name="employee" value="{{Auth::user()->name}} {{Auth::user()->father_last_name}} {{Auth::user()->mother_last_name}}">
       {{--  <p>
          {!! Form::label('voucher', 'Coprobante:') !!}
          <input type="file" name="voucher" class="form-control input-lg">
        </p> --}}
        <p>
          {!! Form::submit('ASIGNAR', ['class' => 'btn btn-lg btn-block bg-navy']) !!}
        </p>
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>

  var cuenta=0;
  function enviado() {
    if (cuenta == 0)
    {
      cuenta++;
      return true;
    }
    else
    {
      alert("El formulario ya está siendo enviado, por favor aguarde un instante.");
      return false;
    }
  }

</script>
