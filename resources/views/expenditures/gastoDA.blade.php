@php
$user_allocation = Auth::user();
$region_allocation = $user_allocation->region;
$collection = App\Role::all();
$role = $collection->where('name', 'ejecutivo-de-credito')->first();
$filtered = App\User::all();
$users = $filtered->all();
@endphp
<div class="modal fade" id="gastoDA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ASIGNAR GASTO A</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => 'gastoDA','data-parsley-validate' => '',  'files' => 'true','onsubmit'=>'return enviado()']) !!}
        
        {!! Form::label('user_id', 'Nombre del Empleado:') !!}
        <select name="user_id"  id="" class="form-control input-lg">
          <option selected="">Asignar Persona</option>
          @foreach ($users as $user)

          <option value=" {{ $user->id  }}">
            {{ $user->name }} {{ $user->father_last_name }} {{ $user->mother_last_name }}
          </option>

          @endforeach
        </select>

      </p>
      <p>
        {!! Form::label('ammount', 'Monto:') !!}
        <input type="number" name="ammount" class="form-control input-lg" placeholder="ESCRIBE MONTO" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="5">
      </p>
      <p>
        {!! Form::label('type', 'Tipo de Gasto:') !!}
        <select name="type" class="form-control input-lg">
         <option>Accesorios Celulares</option>
         <option>Amortización Vehículos</option>
         <option>Artículos de Limpieza</option>
         <option>Bicicletas (Compra de)</option>
         <option>Cafetería</option>
         <option>Celulares (Compra de)</option>
         <option>Combustible</option>
         <option>Computadora y Accesorios (Compra de)</option>
         <option>Energía Eléctrica (Luz)</option>
         <option>Fotocopias</option>
         <option>Impresoras (Compra de)</option>
         <option>Letreros y Anuncios Oficinas</option>
         <option>Mantenimiento Vehículos</option>
         <option>Mantenimiento/Adecuaciones Oficinas</option>
         <option>Mobiliario y Equipo Oficinas</option>
         <option>Motos (Compra de)</option>
         <option>Papelería y Artículos de Oficina</option>
         <option>Pasajes</option>
         <option>Recargar Celular</option>
         <option>Renta de Inmuebles</option>
         <option>Renta Internet y Telefonía Fija</option>
         <option>Servicio Agua Oficinas</option>
         <option>Software (Compra de)</option>
         <option>Toner o Cartuchos de Impresora</option>
         <option>Viáticos</option>
       </select>
     </p>
     <p>
      {!! Form::label('concept', 'Descripción:') !!}
      <input type="text" name="description" class="form-control input-lg" placeholder="ESCRIBE DESCRIPCIÓN" required="required" data-parsley-trigger="input focusin" >
    </p>

   {{--  <p>
      {!! Form::label('voucher', 'Coprobante:') !!}
      <input type="file" name="voucher" class="form-control input-lg">
    </p> --}}
    <input type="hidden" name="employee" value="{{Auth::user()->name}} {{Auth::user()->father_last_name}} {{Auth::user()->mother_last_name}}">
    <p>
      <div class="form-group col-sm-6 col-lg-12">
        <p>
          {!! Form::submit('SIGUIENTE', ['class' => 'btn btn-lg btn-block bg-navy']) !!}
        </p>
      </div>

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
