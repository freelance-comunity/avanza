<div class="modal fade" id="cut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REALIZAR CORTE DE CAJA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => 'cut','' => '','onsubmit'=>'return enviado()']) !!}  
        <p>
          <div class="form-group col-sm-6 col-lg-12">
            {!! Form::label('amount', 'INGRESA LA CANTIDAD:') !!}
            <input type="number" name="amount" class="form-control input-lg" required  placeholder="ESCRIBE MONTO"><br>
          </div>
          
          <input type="hidden"  name="user_id" value="{{ $user->id }}">
        </p>
        <p>
          {!! Form::submit('GUARDAR', ['class' => 'btn btn-lg btn-block bg-navy', 'id' => 'c']) !!}
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
  $(document).ready(function(){
   $( "#c" ).click(function() {
     if($("#mil").val() === ""){
       alert("Rellene el campo Mil pesos");
     }else if($("#quinientos").val() === ""){
       alert("Rellene el campo Quinientos pesos");
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

 
