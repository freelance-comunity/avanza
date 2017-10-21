@extends('layouts.app')
@section('main-content')




{!! Form::open(['url' => 'renovation','data-parsley-validate' => '']) !!} 


@php
$user_allocation = Auth::user();
$region_allocation = $user_allocation->region;
$collection = App\Role::all();
$role = $collection->where('name', 'ejecutivo-de-credito')->first();
$filtered = App\User::all();
$users = $filtered->where('region_id', $region_allocation->id);
@endphp

<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Solicitud de Crédito</h3>
  </div>  

  <div class="box-body">

    <div class="form-group col-sm-6 col-lg-12">
     <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('date', 'Fecha:') !!}
      <input type="date" name="date" class="form-control input-lg formulario" id="date" required="required" data-parsley-trigger="input focusin">
    </div>
    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('ammount', 'Monto Crédito:') !!}
      <input type="number" name="ammount" placeholder="ESCRIBA EL MONTO" id="ammount" class="form-control formulario input-lg" data-parsley-trigger="input focusin" required="required">
    </div>
    @if ($product->name == 'CREDIDIARIO25')
    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('dues', 'No. Cuotas:') !!}
      {!! Form::select('dues', ['25'=>'25'],null, [
        'style' => 'text-transform:uppercase',
        'class' => 'form-control input-lg formulario', 
        'required'=>'required',
        'id' => 'dues',
        'data-parsley-trigger ' => 'input focusin',
        'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
      </div>
      @elseif ($product->name == 'CREDIDIARIO4')
      <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('dues', 'No. Cuotas:') !!}
        {!! Form::select('dues', ['4'=>'4'],null, [
          'style' => 'text-transform:uppercase',
          'class' => 'form-control input-lg formulario', 
          'required'=>'required',
          'id' => 'dues',
          'data-parsley-trigger ' => 'input focusin',
          'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>
        
        @elseif ($product->name == 'DIARIO')
        <div class="form-group col-sm-6 col-lg-4">
          {!! Form::label('dues', 'No. Cuotas:') !!}
          {!! Form::select('dues', ['25'=>'25', '30'=>'30','52'=>'52','60'=>'60'],null, [
            'style' => 'text-transform:uppercase',
            'class' => 'form-control input-lg formulario', 
            'required'=>'required',
            'id' => 'dues',
            'data-parsley-trigger ' => 'input focusin',
            'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
          </div>
          @elseif ($product->name == 'REESTRUCTURACIÓN')
          <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('dues', 'No. Cuotas:') !!}
            {!! Form::text('dues',null, [
              'class' => 'form-control input-lg', 
              'data-parsley-trigger ' => 'input focusin',

              ]) !!}
            </div>
            @else
            <div class="form-group col-sm-6 col-lg-4">
              {!! Form::label('dues', 'No. Cuotas:') !!}
              {!! Form::select('dues', ['1'=>'1'],null, [
                'style' => 'text-transform:uppercase',
                'class' => 'form-control input-lg', 
                'required'=>'required',
                'data-parsley-trigger ' => 'input focusin',
                'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
              </div>
              @endif
            </div>
            <input type="hidden" name="branch" value="{{ $client->branch->name}}">
            <input type="hidden" name="branch_id" value="{{ $client->branch->id }}">
            <input type="hidden" name="region_id" value="{{ $client->branch->region->id }}">
            @if ($product->name == 'REESTRUCTURACIÓN')
            <div class="form-group col-sm-6 col-lg-12">
              <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('interest_rate', 'Tasa:') !!}
                {!! Form::text('interest_rate',null, [
                  'class' => 'form-control input-lg', 
                  'data-parsley-trigger ' => 'input focusin',
                  ]) !!}
                </div>
                <div class="form-group col-sm-6 col-lg-8">
                  {!! Form::label('adviser', 'Nombre del Ejecutivo:') !!}
                  <select name="adviser"  id="" class="form-control input-lg">
                    @foreach ($users as $user)
                    <option   value="{{ $user->id }}">
                      {{ $user->name }} {{ $user->father_last_name }} {{ $user->mother_last_name }}
                    </option>
                    @endforeach
                  </select>
                </div>
              </div>
              {{--  <input type="hidden" name="user_id" value="1"> --}}
              @else
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              <input type="hidden" name="adviser" value="{{ Auth::user()->name }} {{ Auth::user()->father_last_name }} {{ Auth::user()->mother_last_name }}">
              <input type="hidden" name="interest_rate" value="{{$product->interest_of_cup}}">
              @endif
              <input type="hidden" name="periodicity" value="{{$product->name}}">
              <input type="hidden" name="firts_name" value="{{$client->firts_name}}">
              <input type="hidden" name="last_name" value="{{$client->last_name}}">
              <input type="hidden" name="mothers_last_name" value="{{$client->mothers_last_name}}">
              <input type="hidden" name="curp" value="{{$client->curp}}">
              <input type="hidden" name="ine" value="{{$client->ine}}">
              <input type="hidden" name="client_id" value="{{ $client->id}}">
              <div class="form-group col-sm-6 col-lg-12">
                <div class="form-group col-sm-6 col-lg-4">
                  {!! Form::label('collection_period', 'Horario Sugerido de Cobro:') !!}
                  {!! Form::select('collection_period',['MAÑANA'=>'MAÑANA','MEDIO DÍA'=>'MEDIO DIA','TARDE'=>'TARDE'],null, [
                    'style' => 'text-transform:uppercase',
                    'class' => 'form-control input-lg', 
                    'required'=>'required',
                    'data-parsley-trigger ' => 'input focusin',
                    'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                  </div>
                  <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('firm', 'Firma:') !!}
                    {!! Form::text('firm',null, [
                      'class' => 'form-control input-lg', 
                      'id'    => 'signature',
                      'data-parsley-trigger ' => 'input focusin',
                      'readonly'
                      ]) !!}
                    </div>
                    <div class="form-group col-sm-6 col-lg-4">
                      <label>  &nbsp; </label>
                      <input type="button" class="btn-lg btn-block btn bg-navy" value="SIMULAR TABLA DE PAGOS" onclick="capturar()">
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-lg-12">
                    <div class="form-group col-sm-12 col-lg-12">
                      <div id="signature-pad" class="m-signature-pad">
                        <div class="m-signature-pad--body">
                          <canvas style="border: 1px solid black; height: 200px;"></canvas>
                        </div>
                        <div class="m-signature-pad--footer">
                          <button type="button" class="btn btn-lg btn-info clear" data-action="clear">Limpiar</button>
                          <button type="button" class="btn btn-lg btn-success save" data-action="save">Usar</button>
                        </div>
                      </div>

                    </div>
                  </div>
              {{-- <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('firm_ine', 'Imagen:') !!}
                {!! Form::file('firm_ine', [
                  'data-parsley-trigger ' => 'input focusin',
                  ]) !!}
                </div> --}}

                <input type="hidden" name="type_product" value="{{$product->id}}">

                <div class="form-group col-sm-12 col-lg-4 ">

                   <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::submit('GUARDAR', ['class' => 'btn btn-lg  btn-success']) !!}
                  </div>

        
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="tabladepagos" tabindex="-1" role="dialog"  aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title">SIMULACIÓN DE TABLA DE PAGOS</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="table-responsive">

                      <table id="resultado" class="thead-inverse table " >
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>

                    </div>
                  </div>

                </div>
              </div>
            </div>


            <script>
              function capturar()
              { 
                var table=$("#resultado");
                var date =document.getElementById("date").value;
                var ammount= document.getElementById("ammount").value;
                var dues =document.getElementById("dues").value;
                table.find('tbody').html('');

                if(date == "" || ammount == "")
                {
                  alert('Ingresa la fecha y el monto');
                }
                else{
                  var interes  = ({{$product->interest_of_cup}} / 100);
                  var tasa = interes * ammount;
                  var total = parseFloat(tasa) + parseFloat(ammount);
                  var newamount = total / dues;
                  for (var i = 1; i <= dues; i++) {
                   if(dues == 4 || dues == 1){
                    date = moment(date).add(6,'d');
                  }
                  date= moment(date).add(1,'d');

                  if(moment(date).format("dddd") == "Sunday"){
                    date= moment(date).add(1,'d');
                  }
                  var trhtml= '<tr>';
                  trhtml += '<td>' + i +'</td>';
                  trhtml += '<td>' + moment(date).format('DD-MM-YYYY')+'</td>';
                  trhtml += '<td>' + '$' + Math.ceil(newamount) + '</td>';
                  trhtml += '</tr>';
                  table.find('tbody').append(trhtml);
                }
                $('#tabladepagos').modal('show');
              }
            }

          </script>


          @include('credits.signature')


          {!! Form::close() !!}
          @endsection
