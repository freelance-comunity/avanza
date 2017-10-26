<div class="modal fade" id="processPayments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <h3 class="modal-title" id="exampleModalLabel">PAGO #<strong>{{ $payment->number }}</strong> CUOTA: <strong>${{ number_format($payment->balance,2) }}</strong></h3> --}}
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        {!! Form::open(['url' => 'processPayments','data-parsley-validate' => '','onsubmit'=>'return enviado()']) !!}  
        <p>
          {!! Form::label('payment', 'Monto:') !!}
          <input type="text" name="payment" class="form-control input-lg">
          <input type="hidden"  name="credit" value="{{ $credit->id }}">
        </p>
        <p>
          <input type="submit" value="PAGAR" class="btn btn-lg btn-block btn-success" id="cl" onclick="return confirm('¿Estás seguro de procesar este pago?')">
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
  function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [8,37,39,46];

    tecla_especial = false
    for(var i in especiales){
     if(key == especiales[i]){
       tecla_especial = true;
       break;
     } 
   }

   if(letras.indexOf(tecla)==-1 && !tecla_especial)
    return false;
}
</script>
<script>
  $(document).ready(function(){
   $( "#cl" ).click(function() {
     if($("#example").val() === ""){
       alert("Rellene todos los campos");
     }else{
       alert('Pago Guardado');
       break;
     }

   });
 });
</script>
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

