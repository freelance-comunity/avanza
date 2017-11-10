@php
$user_allocation = Auth::user();
$region_allocation = $user_allocation->region;
$collection = App\Role::all();
$role = $collection->where('name', 'ejecutivo-de-credito')->first();
//$users = $role->users;
$filtered = App\User::where('id', '!=', Auth::id())->get();
$users = $filtered->where('region_id', $region_allocation->id);
@endphp

<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Solicitud de Crédito Migrados</h3>
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
    <div class="form-group col-sm-6 col-lg-4">
      <label>Frecuencia:</label>
      <select name="periodicity" id="status" onChange="mostrar(this.value);" class="form-control input-lg">
        <option value="" class="selected">ELIGE</option>
        <option value="DIARIO25">CREDIDIARIO25</option>
        <option value="DIARIO4">CREDIDIARIO4</option>
        <option value="SEMANAL">CREDISEMANA</option>
        <option value="TRADICIONAL">DIARIO</option>
      </select>
    </div>
  </div>

  <script>
    function mostrar(id) {
      if (id == "CREDIDIARIO25") {
        $("#CREDIDIARIO25").show();
        $("#CREDIDIARIO4").hide(1500);
        $("#CREDISEMANA").hide(1500);
        $("#DIARIO").hide(1500);
      }
      if (id == "CREDIDIARIO4") {
        $("#CREDIDIARIO25").hide(1500);
        $("#CREDIDIARIO4").show();
        $("#CREDISEMANA").hide(1500);
        $("#DIARIO").hide(1500);
      }
      if (id == "CREDISEMANA") {
        $("#CREDIDIARIO25").hide(1500);
        $("#CREDIDIARIO4").hide(1500);
        $("#CREDISEMANA").show();
        $("#DIARIO").hide(1500);
      }
      if (id == "DIARIO") {
        $("#CREDIDIARIO25").hide(1500);
        $("#CREDIDIARIO4").hide(1500);
        $("#CREDISEMANA").hide(1500);
        $("#DIARIO").show();
      }
    }
  </script>

  <div class="form-group col-sm-6 col-lg-12">

    <div class="form-group col-sm-6 col-lg-12">
      {!! Form::label('dues', 'No. Cuotas:') !!}
      {!! Form::text('dues',null, [
        'class' => 'form-control input-lg', 
        'data-parsley-trigger ' => 'input focusin',
        ]) !!}
      </div>



  {{-- <div id="CREDIDIARIO25" style="display: none;">
    <div class="form-group col-sm-6 col-lg-12">
      {!! Form::label('dues', 'No. Cuotas:') !!}
      {!! Form::text('dues',null, [
        'class' => 'form-control input-lg', 
        'data-parsley-trigger ' => 'input focusin',

        ]) !!}
      </div>
    </div>
    <div id="CREDIDIARIO4" style="display: none;">
      <div class="form-group col-sm-6 col-lg-12">
        {!! Form::label('dues', 'No. Cuotas:') !!}
        {!! Form::text('dues',4, [
          'class' => 'form-control input-lg', 
          'data-parsley-trigger ' => 'input focusin','readonly',
          ]) !!}
        </div>
      </div>
      <div id="CREDISEMANA" style="display: none;">
        <div class="form-group col-sm-6 col-lg-12">
          {!! Form::label('dues', 'No. Cuotas:') !!}
          {!! Form::text('dues',1, [
            'class' => 'form-control input-lg', 
            'data-parsley-trigger ' => 'input focusin','readonly',

            ]) !!}
          </div>
        </div>
        <div id="DIARIO" style="display: none;">
          <div class="form-group col-sm-6 col-lg-12">
            {!! Form::label('dues', 'No. Cuotas:') !!}
            {!! Form::text('dues',null, [
              'class' => 'form-control input-lg', 
              'data-parsley-trigger ' => 'input focusin',

              ]) !!}
            </div>
          </div> --}}
        </div>

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
                <option selected="">Elige Promotor</option>
                @foreach ($users as $user)
                @if ($user->hasRole(['ejecutivo-de-credito']))
                <option value=" {{ $user->id}}">
                  {{ $user->name }} {{ $user->father_last_name }} {{ $user->mother_last_name }}
                </option>
                @endif   
                @endforeach
              </select>
            </div>
            

            <input type="hidden" name="user_id" value="">
            <script>
              $(document).ready(function(){
                $("select[name=adviser]").change(function(){
                  $('input[name=user_id]').val($(this).val());
                });
              });
            </script>
             {{-- <select style="visibility:hidden" name="xxx"  id="" class="form-control input-lg">
                <option selected="">Elige Promotor</option>
                @foreach ($users as $user)
                @if ($user->hasRole(['ejecutivo-de-credito']))
                <option value=" {{ $user->id }}">
                  {{ $user->name }} {{ $user->father_last_name }} {{ $user->mother_last_name }}
                </option>
                @endif   
                @endforeach
              </select> --}}

          </div>
          <input type="hidden" name="firts_name" value="{{$client->firts_name}}">
          <input type="hidden" name="last_name" value="{{$client->last_name}}">
          <input type="hidden" name="mothers_last_name" value="{{$client->mothers_last_name}}">
          <input type="hidden" name="curp" value="{{$client->curp}}">
          <input type="hidden" name="ine" value="{{$client->ine}}">
          <input type="hidden" name="client_id" value="{{ $client->id}}">
          <input type="hidden" name="branch" value="{{ $client->branch->name}}">
          <input type="hidden" name="branch_id" value="{{ $client->branch->id }}">
          <input type="hidden" name="region_id" value="{{ $client->branch->region->id }}">
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
              {{-- <div class="form-group col-sm-6 col-lg-4">
                <label>  &nbsp; </label>
                <input type="button" class="btn-lg btn-block btn bg-navy" value="SIMULAR TABLA DE PAGOS" onclick="capturar()">
              </div> --}}
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



                <div class="box-body" >
                 <div class="col-md-4">
                  <div class="btn-group">
                   {!! Form::submit('Guardar', ['class' => 'uppercase btn btn-lg btn-block btn-primary', 'id' => 'save']) !!}
                 </div>
               </div> 
             </div>
             <div class="form-group col-sm-12 col-lg-4 ">
               <div class="row">

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