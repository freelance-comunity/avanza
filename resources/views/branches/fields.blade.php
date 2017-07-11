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
        <form role="form">
          <div class="box-body">
            <div class="col-md-4">
              <label for="exampleInputEmail1">Nombre de la Sucursal</label>
              {!! Form::text('name', null, ['class' => 'form-control input-lg']) !!}
            </div>
            <div class="col-md-4">
              <label for="exampleInputEmail1">Teléfono</label>
              {!! Form::text('phone', null, ['class' => 'form-control input-lg']) !!}
            </div>
            <div class="col-md-4">
              <label for="exampleInputEmail1">Dirección</label>
              {!! Form::text('address', null, ['class' => 'form-control input-lg']) !!}
            </div>         
          </div>
          <!-- /.box-body -->

        </form>
        <form class="form-horizontal">
          <div class="box-body">
            <div class="gllpLatlonPicker">
             {!! Form::label('location', '* Introduce la Dirección de la Sucursal:') !!}
             <input type="text" class="gllpSearchField form-control input-lg" placeholder="Escribe la Direccion de la Sucursal">
             <input type="button" class="gllpSearchButton btn bg-orange" value="Buscar">
             <br/><br/>
             <div class="gllpMap">Google Maps</div>
             <br/>
             <input type="hidden" name="latitude" class="gllpLatitude" value="16.753239967660058"/>
             <input type="hidden" name="length" class="gllpLongitude" value="-93.11789682636714"/>
             <input type="hidden" class="gllpZoom" value="12"/>
           </div>
         </div>
       </form>    
       <div >
        {!! Form::submit('GUARDAR', ['class' => 'btn btn-primary']) !!}
      </div> 

    </div>
  </div>
  <!--/.col (left) -->

  <!-- /.row -->
</section>



