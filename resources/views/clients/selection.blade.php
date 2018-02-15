<div class="modal fade" id="selection">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><strong>AUTORIZACIÓN DEL CLIENTE</strong></h4>
        </div>
        <form name="sumar">
          <div class="modal-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-8 control-label">¿EL SOLICITANTE ES MAYOR DE 18 AÑOS Y MENOR DE 71 AÑOS?:</label>
              <div class="col-sm-4">
                <select class="form-control" name="a" onchange="operacion()" > 
                  <option value="" class="selected">Selecciona</option>
                  <option value="10" class="Si">Si</option>
                  <option value="0">No</option>
                </select> 
              </div>
            </div>

            <br>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-8 control-label">¿EL SOLICITANTE ES DEL SEXO FEMENINO?:</label>
              <div class="col-sm-4">
                <select class="form-control" name="b" onchange="operacion()"> 
                  <option value="" class="selected">Selecciona</option>
                  <option value="10" class="Si">Si</option>
                  <option value="5">No</option>
                </select> 
              </div>
            </div>
            <br>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-8 control-label">¿ANTIGÜEDAD DEL NEGOCIO MAYOR A 6 MESES?:</label>
              <div class="col-sm-4">
                <select class="form-control" name="c" onchange="operacion()"> 
                  <option value="" class="selected">Selecciona</option>
                  <option value="10" class="Si">Si</option>
                  <option value="5">No</option>
                </select> 
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-8 control-label">¿EN DONDE VIVE TIENE UNA ANTIGÜEDAD MAYOR A 1 AÑO?:</label>
              <div class="col-sm-4">
                <select class="form-control" name="d" onchange="operacion()"> 
                  <option value="" class="selected">Selecciona</option>
                  <option value="10" class="Si">Si</option>
                  <option value="5">No</option>
                </select> 
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-8 control-label">¿EL CRÉDITO LO UTILIZARÁ PARA EL NEGOCIO?:</label>
              <div class="col-sm-4">
                <select class="form-control" name="e" onchange="operacion()"> 
                  <option value="" class="selected">Selecciona</option>
                  <option value="10" class="Si">Si</option>
                  <option value="5">No</option>
                </select> 
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-8 control-label">¿YA HA UTILIZADO Y PAGADO CRÉDITOS ANTES?:</label>
              <div class="col-sm-4">
                <select class="form-control" name="f" onchange="operacion()"> 
                  <option value="" class="selected">Selecciona</option>
                  <option value="10" class="Si">Si</option>
                  <option value="5">No</option>
                </select> 
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-8 control-label">¿ES CLIENTE NUEVO EN CREDIEFECTIVO?:</label>
              <div class="col-sm-4">
                <select class="form-control" name="g" onchange="operacion()"> 
                  <option value="" class="selected">Selecciona</option>
                  <option value="10" class="Si">Si</option>
                  <option value="5">No</option>
                </select> 
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-8 control-label">¿EL MONTO SOLICITADO ES MAYOR DE $500.00?:</label>
              <div class="col-sm-4">
                <select class="form-control" name="h" onchange="operacion()"> 
                  <option value="" class="selected">Selecciona</option>
                  <option value="10" class="Si">Si</option>
                  <option value="5">No</option>
                </select> 
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-8 control-label">¿DEJARÁ UNA GARANTÍA PRENDARIA?:</label>
              <div class="col-sm-4">
                <select class="form-control" name="i" onchange="operacion()"> 
                  <option value="" class="selected">Selecciona</option>
                  <option value="10" class="Si">Si</option>
                  <option value="5">No</option>
                </select> 
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-8 control-label">¿FIRMARÁ UN AVAL?:</label>
              <div class="col-sm-4">
                <select class="form-control" name="j" onchange="operacion()"> 
                  <option value="" class="selected">Selecciona</option>
                  <option value="10" class="Si">Si</option>
                  <option value="5">No</option>
                </select> 
              </div>
            </div>
            <br>
            <input type="hidden" name="total">
          </div>

         {{--  <div class="form-group">
            <div class="col-sm-12">
              <a class="btn btn-primary pull-right" id="" style="margin-top: 25px" href="{!! route('clients.create') !!}">SIGUIENTE</a>
              
            </div>
          </div> --}}
        </form>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <script type="text/javascript">
    function operacion() {
      caja = document.forms["sumar"].elements;
      var numero1 = Number(caja["a"].value);
      var numero2 = Number(caja["b"].value);
      var numero3 = Number(caja["c"].value);
      var numero4 = Number(caja["d"].value);
      var numero5 = Number(caja["e"].value);
      var numero6 = Number(caja["f"].value);
      var numero7 = Number(caja["g"].value);
      var numero8 = Number(caja["h"].value);
      var numero9 = Number(caja["i"].value);
      var numero10 = Number(caja["j"].value);
      var resultado = numero1 + numero2 + numero3 + numero4 + numero5  + numero6 + numero7 + numero8 + numero9 + numero10;

      if (numero1 == 0) {
        alert('CLIENTE RECHAZADO');
        $("#brancher").hide();
        $(function() {
          $('#selection').modal('hide')
        });

      }
      else if(resultado >= 70){
        alert('CLIENTE AUTORIZADO');
        $("#brancher").show();
      }
      else{ 
        $("#brancher").hide();
      }
      caja["total"].value = resultado;

    }
  </script>
