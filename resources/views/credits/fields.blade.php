 <div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Solicitud de Crédito</h3>
  </div>  

  <div class="box-body">

   <input type="hidden" name="adviser" value="{{ Auth::user()->name }} {{ Auth::user()->father_last_name }} {{ Auth::user()->mother_last_name }}">
   <div class="form-group col-sm-6 col-lg-12">
     <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('date', 'Fecha:') !!}
      <input type="date" name="date" class="form-control input-lg formulario" id="date" required="required" data-parsley-trigger="input focusin">
    </div>
    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('ammount', 'Monto Crédito:') !!}
      <input type="number" name="ammount" placeholder="ESCRIBA EL MONTO" id="ammount" class="form-control formulario input-lg" data-parsley-trigger="input focusin" required="required">
    </div>
    @if ($product->name == 'DIARIO')
    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('dues', 'No. Cuotas:') !!}
      {!! Form::select('dues', ['25'=>'25','30'=>'30', '52'=>'52','60'=>'60'],null, [
        'style' => 'text-transform:uppercase',
        'class' => 'form-control input-lg formulario', 
        'required'=>'required',
        'id' => 'dues',
        'data-parsley-trigger ' => 'input focusin',
        'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
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



      <input type="hidden" name="interest_rate" value="{{$product->interest_of_cup}}">

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
              'required'=>'required',
              'data-parsley-trigger ' => 'input focusin',
              'readonly'
              ]) !!}
            </div>
          </div>
          <div class="form-group col-sm-12 col-lg-12">
            <div class="form-group col-sm-12 col-lg-12">
              <div id="signature-pad" class="m-signature-pad">
                <div class="m-signature-pad--body">
                  <canvas style="border: 1px solid black; height: 200px;"></canvas>
                </div>
                <div class="m-signature-pad--footer">
                  <button type="button" class="button clear" data-action="clear">Limpiar</button>
                  <button type="button" class="button save" data-action="save">Usar</button>
                </div>
              </div>

            </div>
          </div>
          <input type="hidden" name="type_product" value="{{$product->id}}">
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

          <div class="box-body" >
           <div class="col-md-4">
            <div class="btn-group">
              {!! Form::submit('Guardar', ['class' => 'uppercase btn btn-primary', 'id' => 'save']) !!}
            </div>
          </div> 
        </div>
        <input type="button" class="btn bg-navy" value="Tabla de Amortizacion" onclick="capturar()">
        <div id="resultado demo">
          <p id="demo"></p>
        </div>
        
      </div> 
    </div>

    <script>
      function capturar()
      {

        // obtenemos e valor por el numero de elemento
        var porElementos=document.forms["form1"].elements[0].value;
        // Obtenemos el valor por el id
        var porId=document.getElementById("date").value;
        var ammount=document.getElementById("ammount").value;
        var dues=document.getElementById("dues").value;
        
        // Obtenemos el valor por el Nombre

        var porTagName=document.getElementsByTagName("input")[0].value;
        // Obtenemos el valor por el nombre de la clase
        var porClassName=document.getElementsByClassName("formulario")[0].value;
        var text="";
        var i;

        for (i = 0; i < dues; i++) {
          text += dues[i] + "<br>";
        }
        document.getElementById("demo").innerHTML = text;

        document.getElementById("resultado").innerHTML=" \
        Por elementos: "+porElementos+" \
        <br>Por ID: "+porId+" \
        <br>Por ID: "+ammount+" \
        <br>Por ID: "+dues+" \
        <br>Por ClassName: "+porClassName;
      }
    </script>
    <script>
      success: function(data)
      {
        if (data.respuesta == exito){
          var filas = data.inventario.length;

    for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
      var nuevafila= "<tr><td>" +
      data.inventario[i].codigo + "</td><td>" +
      data.inventario[i].nombre + "</td><td>" +
      data.inventario[i].valor + "</td><td>" +
      data.inventario[i].cantidad + "</td><td>" +
      data.inventario[i].categoria + "</td></tr>"

      $("#tabla_resultados").append(nuevafila)
    }
  }
}
</script>
<script>
  $(document).ready(function(){
    $("#hide").click(function(){
      $("table").hide();
    });
    $("#show").click(function(){
      $("table").show();
    });
  });
</script>
@include('credits.signature')

