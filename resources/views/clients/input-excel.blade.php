<div class="modal fade" id="inputExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">IMPORTAR EXCEL CON CLIENTES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{url('import-excel')}}" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <label for="">Fichero Origen:</label>
            <input type="file" name="excel">
            <br><br>
          </div>
          <div class="form-group">
            <input type="submit" value="Subir Fichero" class="btn btn-block btn-lg btn-primary" onclick="comprueba_extension(this.form, this.form.excel.value)">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>