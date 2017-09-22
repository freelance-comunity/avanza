<div class="modal fade" id="payment_{{ $payment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">PAGO #<strong>{{ $payment->number }}</strong> CUOTA: <strong>${{ number_format($payment->balance,2) }}</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      {!! Form::open(['url' => 'process','data-parsley-validate' => '']) !!}  
        <p>
          {!! Form::label('payment', 'Monto:') !!}
            <input type="number" name="payment" id=" payment example" class="form-control input-lg" placeholder="ESCRIBE MONTO" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="5">
            <input type="hidden"  name="payment_id" value="{{ $payment->id }}">
          </p>
          <p>
            {!! Form::submit('PAGAR', ['class' => 'btn btn-lg btn-block btn-success', 'id'=>'cl']) !!}
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

