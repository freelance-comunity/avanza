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
            {!! Form::text('name', null, [
              'style' => 'text-transform:uppercase',
              'class' => 'form-control input-lg', 
              'placeholder'=>'ESCRIBE EL NOMBRE DE LA SUCURSAL',
              'required'=>'required',
              'data-parsley-required-message' => 'Este campo es obligatorio',
              'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="col-md-4">
              <label for="exampleInputEmail1">Teléfono</label>
              {!! Form::text('phone', null, [
                'style' => 'text-transform:uppercase',
                'class' => 'form-control input-lg',
                'placeholder'=>'ESCRIBE SU NÚMERO DE TELÉFONO',
                'required'=>'required',
                'data-parsley-required-message' => 'Este campo es obligatorio',
                'data-trigger' => 'keyup',
                'data-parsley-type' => 'digits',
                'data-parsley-maxlength' => '10',
                'data-parsley-maxlength-message' => '
                Este valor es demasiado largo. Debe tener 10 caracteres o menos.',
                'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
              </div>       
            </div>
            <!-- /.box-body -->        
            <div class="box-body">
              <div class="col-md-10">
                <div class="gllpLatlonPicker">
                  <label for="exampleInputEmail1">Dirección</label>
                  <div class="input-group">
                    {!! Form::text('address', null, [
                      'style' => 'text-transform:uppercase',
                      'class' => 'form-control input-lg gllpSearchField',
                      'placeholder'=>'ESCRIBE LA DIRECCIÓN DE LA SUCURSAL, EJ: AV. CENTRAL OTE. 214 SAN MARCOS, TUXTLA GUTIÉRREZ, CHIS.',
                      'required'=>'required',
                      'data-parsley-required-message' => 'Este campo es obligatorio',
                      'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
                      <div class="input-group-btn">
                       <input type="button" class="gllpSearchButton btn bg-navy input-lg" value="Buscar">
                     </div>
                   </div>
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
