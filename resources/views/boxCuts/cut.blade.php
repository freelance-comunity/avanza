<div class="modal fade" id="cut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REALIZAR CORTE DE CAJA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => 'cut','' => '']) !!}  
        <p>
          <div class="form-group col-sm-6 col-lg-6">
            {!! Form::label('bills_1000', 'Billetes de 1000 pesos :') !!}
            <input type="number" name="bills_1000" class="form-control input-lg" required  placeholder="ESCRIBE MONTO"><br>
          </div>
          <div class="form-group col-sm-6 col-lg-6">
          {!! Form::label('bills_500', 'Billetes de 500 pesos:') !!}
          <input type="number" name="bills_500"  class="form-control input-lg" required="required"  placeholder="ESCRIBE MONTO" ><br>
          </div>
          <div class="form-group col-sm-6 col-lg-6">
          {!! Form::label('bills_200', 'Billetes de 200 pesos:') !!}
          <input type="number" name="bills_200" id="" class="form-control input-lg" required="required"  placeholder="ESCRIBE MONTO" ><br>
          </div>
          <div class="form-group col-sm-6 col-lg-6">
          {!! Form::label('bills_100', 'Billetes de 100 pesos:') !!}
          <input type="number" name="bills_100" id="" class="form-control input-lg" required="required"  placeholder="ESCRIBE MONTO" ><br>
          </div>
          <div class="form-group col-sm-6 col-lg-6">
          {!! Form::label('bills_50', 'Billetes de 50 pesos:') !!}
          <input type="number" name="bills_50" id="" class="form-control input-lg" required="required"  placeholder="ESCRIBE MONTO"  ><br>
          </div>
          <div class="form-group col-sm-6 col-lg-6">
          {!! Form::label('bills_20', 'Billetes de 20 pesos:') !!}
          <input type="number" name="bills_20" id="" class="form-control input-lg" required="required"  placeholder="ESCRIBE MONTO" ><br>
          </div>
          <div class="form-group col-sm-6 col-lg-6">
          {!! Form::label('coin_10', 'Monedas de 10 pesos:') !!}
          <input type="number" name="coin_10" id="" class="form-control input-lg" required="required"  placeholder="ESCRIBE MONTO"  ><br>
          </div>
          <div class="form-group col-sm-6 col-lg-6">
          {!! Form::label('coin_5', 'Monedas de 5 pesos:') !!}
          <input type="number" name="coin_5" id="" class="form-control input-lg" required="required"  placeholder="ESCRIBE MONTO"  ><br>
          </div>
          <div class="form-group col-sm-6 col-lg-6">
          {!! Form::label('coin_2', 'Monedas de 2 pesos:') !!}
          <input type="number" name="coin_2" id="" class="form-control input-lg" required="required"  placeholder="ESCRIBE MONTO"  ><br>
          </div>
          <div class="form-group col-sm-6 col-lg-6">
          {!! Form::label('coin_1', 'Monedas de 1 peso:') !!}
          <input type="number" name="coin_1" id="" class="form-control input-lg" required="required"  placeholder="ESCRIBE MONTO"  ><br>
          </div>
          <div class="form-group col-sm-6 col-lg-6">
          {!! Form::label('cents_50', 'Monedas de 50 centavos:') !!}
          <input type="number" name="cents_50" id="" class="form-control input-lg" required="required"  placeholder="ESCRIBE MONTO"  >
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
 
