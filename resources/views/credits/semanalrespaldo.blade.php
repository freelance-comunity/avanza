@php
$user_allocation = Auth::user();
$region_allocation = $user_allocation->region;
$collection = App\Role::all();
$role = $collection->where('name', 'ejecutivo-de-credito')->first();
$filtered = App\User::where('id', '!=', Auth::id())->get();
$users = $filtered->where('region_id', $region_allocation->id);
@endphp

<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Solicitud de Crédito con fecha <strong>{{ Carbon\Carbon::now()->toDateString() }}</strong> </h3>
  </div>

  <div class="box-body">

    <div class="form-group col-sm-6 col-lg-12">

      <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('ammount', 'Monto Crédito:') !!}
        <input type="number" name="ammount" placeholder="ESCRIBA EL MONTO" id="ammount" class="form-control formulario input-lg" data-parsley-trigger="input focusin" required="required">
        <input type="hidden" value="{{ Carbon\Carbon::now()->toDateString() }}" name="date" class="form-control input-lg formulario" id="date" required="required" data-parsley-trigger="input focusin" readonly>
      </div>
      <input type="hidden" name="dues" value="1">
      <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('firm', 'Foto del Pagare:') !!}
        {!! Form::file('firm', [
          'data-parsley-trigger ' => 'input focusin',
          'required'=>'required'
          ]) !!}
        </div>
      </div>
      <input type="hidden" name="branch" value="{{ $client->branch->name}}">
      <input type="hidden" name="branch_id" value="{{ $client->branch->id }}">
      <input type="hidden" name="region_id" value="{{ $client->branch->region->id }}">
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      <input type="hidden" name="adviser" value="{{ Auth::user()->name }} {{ Auth::user()->father_last_name }} {{ Auth::user()->mother_last_name }}">
      <input type="hidden" name="interest_rate" value="{{$product->interest_of_cup}}">
      <input type="hidden" name="periodicity" value="{{$product->name}}">
      <input type="hidden" name="firts_name" value="{{$client->firts_name}}">
      <input type="hidden" name="last_name" value="{{$client->last_name}}">
      <input type="hidden" name="mothers_last_name" value="{{$client->mothers_last_name}}">
      <input type="hidden" name="client_id" value="{{ $client->id}}">
      <div class="form-group col-sm-6 col-lg-12">
      </div>

    </div>

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
