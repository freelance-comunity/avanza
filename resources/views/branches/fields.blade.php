<!-- Main content -->
 <section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- Form Element sizes -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Datos de la Sucursal</h3>
        </div>       
        <div class="box-body">
          <div class="col-md-4">
            <label for="exampleInputEmail1">Nombre de la Sucursal</label>
            {!! Form::text('name', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBA EL NOMBRE DE LA SUCURSAL','required'=>'required']) !!}
          </div>
          <div class="col-md-4">
            <label for="exampleInputEmail1">Teléfono</label>
            {!! Form::text('phone', null, ['class' => 'form-control input-lg','placeholder'=>'ESCRIBA SU NÚMERO DE TELÉFONO','required'=>'required']) !!}
          </div>       
        </div>
        <!-- /.box-body -->        
        <div class="box-body">
          <div class="col-md-12">
            <div class="gllpLatlonPicker">
              <label for="exampleInputEmail1">Dirección</label>
              {!! Form::text('address', null, ['class' => 'form-control input-lg gllpSearchField','placeholder'=>'ESCRIBA DIRECCIÓN DE LA SUCURSAL, EJ: AV. CENTRAL OTE. 214 SAN MARCOS, TUXTLA GUTIÉRREZ, CHIS.','required'=>'required']) !!}
              <input type="button" class="gllpSearchButton btn bg-orange" value="Buscar">
              <br/><br/>
              <div class="gllpMap">Google Maps</div>
              <br/>
              <input type="hidden" name="latitude" class="gllpLatitude" value="16.753239967660058"/>
              <input type="hidden" name="length" class="gllpLongitude" value="-93.11789682636714"/>
              <input type="hidden" class="gllpZoom" value="12"/>
            </div>
          </div>
        </div>

        <div class="box-body" >
         <div class="col-md-4">
          {!! Form::submit('GUARDAR', ['class' => 'btn btn-lg btn-primary','required'=>'required' ]) !!}
        </div> 
      </div>

    </div>
  </div>
  <!--/.col (left) -->

  <!-- /.row -->
</section>
