<!-- Modal -->
<div class="modal fade" id="cotizador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">COTIZADOR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group col-sm-6 col-lg-4">
          {!! Form::label('capital', 'Capital:') !!}
          {!! Form::text('capital', null, ['class' => 'form-control', 'id' => 'monto', 'value' => '0', 'onkeyup' => 'calcular()']) !!}
        </div>


        <div class="form-group col-sm-6 col-lg-4">
          {!! Form::label('interes', 'Tasa Mensual:') !!}
          {!! Form::select('interes',['0.15'=> '15%', '0.60' =>'60%'],null, ['class' => 'form-control', 'id' => 'interés', 'value' => '15', 'onkeyup' => 'calcular()']) !!}
        </div>


        <div class="form-group col-sm-6 col-lg-4">
          {!! Form::label('gross_profit', 'Interés:') !!}
          {!! Form::text('gross_profit', null, ['class' => 'form-control', 'id' => 'utilidad_bruta', 'readonly' => 'readonly']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
          {!! Form::label('Modalidad', 'Modalidad:') !!}         
          {!! Form::select('Modalidad',['30'=>'Mensual', '1'=>'Semanal'] ,null, ['class' => 'form-control', 'id' => 'modalidad']) !!}
        </div>
        <div class="form-group col-sm-6 col-lg-4">
          {!! Form::label('montly_net_income', 'TOTAL:') !!}  
          {!! Form::text('montly_net_income', null, ['class' => 'form-control', 'id' => 'utilidad_neta_mensual', 'readonly' => 'readonly']) !!}   
        </div>  
      </div>
      <div class="modal-footer">    
      </div>
    </div>
  </div>
</div>

  <script>
          function calcular()
          {
            monto = eval(document.getElementById('monto').value);
            interés = eval(document.getElementById('interés').value);
            utilidad = monto * interés;

            document.getElementById('utilidad_bruta').value=utilidad;
            modalidad = eval(document.getElementById('modalidad').value);

            utilidad_neta = monto + utilidad;
            total= utilidad_neta/modalidad;

            document.getElementById('utilidad_neta_mensual').value=Math.ceil(total);
          }
        </script>