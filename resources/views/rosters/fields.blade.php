@php
$user_allocation = Auth::user();
$region_allocation = $user_allocation->region;

$filtered = App\User::all();
            //$filtered = User::all();
$users = $filtered->where('region_id', $region_allocation->id);
@endphp

<script>
    function calcular()
    {
        percepciones = eval(document.getElementById('percepciones').value);
        deducciones = eval(document.getElementById('deducciones').value);
        neto = percepciones - deducciones;
        document.getElementById('neto').value=neto;
    }
</script>
<div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title">Sueldos</h3>
  </div>  

  <div class="box-body">

    <div class="form-group col-sm-6 col-lg-6">
        {!! Form::label('date', 'Fecha:') !!}
        <input type="date" name="date" class="form-control input-lg" value="{{ \Carbon\Carbon::now()->toDateString() }}">
    </div>

    <div class="form-group col-sm-6 col-lg-6">
        {!! Form::label('coordinating_name', 'Nombre Coordinador:') !!}
        <input type="text" name="coordinating_name" class="form-control input-lg" value="{{ Auth::user()->name }} {{ Auth::user()->father_last_name }} {{ Auth::user()->mother_last_name }}" readonly="">
    </div>

    <div class="form-group col-sm-6 col-lg-6">
        {!! Form::label('coordination', 'Coordinación:') !!}
        <input type="text" name="coordination" class="form-control input-lg" value="{{ Auth::user()->region['name'] }}" readonly="">
    </div>

    <div class="form-group col-sm-6 col-lg-6">
        {!! Form::label('branch_office', 'Sucursal:') !!}
        <input type="text" name="branch_office" class="form-control input-lg" value="{{ Auth::user()->branch['name'] }}" readonly="">
    </div>

    <div class="form-group col-sm-6 col-lg-6">
        {!! Form::label('name_employee', 'Nombre Empleado:') !!}
        <select name="name_employee" id="" class="form-control input-lg">
            @foreach ($users as $user)
            <option value="{{ $user->id }}">
                {{ $user->name }} {{ $user->father_last_name }} {{ $user->mother_last_name }}
            </option>
            @endforeach
        </select>
    </div>

    {{-- <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('number_employee', 'Número Empleado:') !!}
        {!! Form::text('number_employee', null, ['class' => 'form-control input-lg']) !!}
    </div> --}}

    {{-- <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('position', 'Puesto:') !!}
        {!! Form::text('position', null, ['class' => 'form-control input-lg']) !!}
    </div> --}}

    <div class="form-group col-sm-6 col-lg-6">
        {!! Form::label('payment_scheme', 'Esquema de Pago:') !!}
        {!! Form::select('payment_scheme',['SEMANAL'=>'SEMANAL','QUINCENAL'=>'QUINCENAL'], null, ['class' => 'form-control input-lg']) !!}
    </div>

    <div class="form-group col-sm-6 col-lg-6">
        {!! Form::label('payment_period', 'Periodo de Pago:') !!}
        {!! Form::text('payment_period', null, ['class' => 'form-control input-lg']) !!}
    </div>

    <div class="form-group col-sm-6 col-lg-6">
        {!! Form::label('perceptions', 'Percepciones:') !!}
       {{--  <div class="input-group"> --}}
            {{-- <span class="input-group-addon"><i class="fa fa-money"></i></span> --}}
            <input type="text" name="perceptions" class="form-control input-lg" id="percepciones" onkeyup="calcular()">
        {{-- </div> --}}
    </div>

    <div class="form-group col-sm-6 col-lg-6">
        {!! Form::label('deductions', 'Deducciones:') !!}
        {{-- <div class="input-group"> --}}
            {{-- <span class="input-group-addon"><i class="fa fa-money"></i></span> --}}
            <input type="text" name="deductions" value="0" class="form-control input-lg" id="deducciones" onkeyup="calcular()">
        {{-- </div> --}}
    </div>

    <div class="form-group col-sm-6 col-lg-6">
        {!! Form::label('grandchild_pay', 'Neto a Pagar:') !!}
       {{--  <div class="input-group"> --}}
            {{-- <span class="input-group-addon"><i class="fa fa-money"></i></span> --}}
            <input type="text" name="grandchild_pay" id="neto" class="form-control input-lg" readonly="">
        {{-- </div> --}}
    </div>

  {{--   <div class="form-group col-sm-6 col-lg-6">
        {!! Form::label('coordinating_firm', 'Firma Coordinador:') !!}
        {!! Form::text('coordinating_firm', null, ['class' => 'form-control input-lg','id' => 'signature', 'readonly']) !!}
    </div>

    <div class="form-group col-sm-6 col-lg-6">
        {!! Form::label('employee_firm', 'Firma Empleado:') !!}
        {!! Form::text('employee_firm', null, ['class' => 'form-control input-lg','id' => 'signature2','readonly']) !!}
    </div> --}}
    {{-- Firma coordinador --}}
  {{--   <div class="form-group col-sm-6 col-lg-6">
        <div class="form-group col-sm-12 col-lg-12">
          <div id="signature-pad" class="m-signature-pad">
            <div class="m-signature-pad--body">
              <canvas style="border: 1px solid black; height: 200px;"></canvas>
          </div>
          <div class="m-signature-pad--footer">
              <button type="button" class="btn btn-lg btn-info clear"  data-action="clear">Limpiar</button>
              <button type="button" class="btn btn-lg btn-success save" data-action="save">Usar</button>
          </div>
      </div>

  </div>
</div> --}}
{{-- End --}}

{{-- Firma empleado --}}
{{-- <div class="form-group col-sm-6 col-lg-6">
    <div class="form-group col-sm-12 col-lg-12">
      <div id="signature-pad2" class="m-signature-pad">
        <div class="m-signature-pad--body">
          <canvas style="border: 1px solid black; height: 200px;"></canvas>
      </div>
      <div class="m-signature-pad--footer">
          <button type="button" class="btn btn-lg btn-info clear" data-action="clear2">Limpiar</button>
          <button type="button" class="btn btn-lg btn-success save" data-action="save2">Usar</button>
      </div>
  </div>

</div>
</div> --}}

{{-- End --}}





<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
</div>

@include('rosters.signature1')
@include('rosters.signature2')
