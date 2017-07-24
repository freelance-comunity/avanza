<div class="box box-danger">
    <div class="box-header with-border">
    <div>
     <h3> Ubicación </h3>
     </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('street', 'Calle:') !!}
                {!! Form::text('street', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL NOMBRE DE LA CALLE','required'=>'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('number', 'Número de Casa:') !!}
                {!! Form::text('number', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL NÚMERO DE LA CASA','required'=>'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('colony', 'Colonia:') !!}
                {!! Form::text('colony', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('municipality', 'Municipio:') !!}
                {!! Form::text('municipality', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE MUNICIPIO', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('state', 'Estado:') !!}
                {!! Form::select('state',['placeholder'=>'SELECCIONE UN ESTADO','AGUASCALIENTES' => 'AGUASCALIENTES', 'BAJA CALIFORNIA' => 'BAJA CALIFORNIA', 'BAJA CALIFORNIA SUR' => 'BAJA CALIFORNIA SUR','CAMPECHE' => 'CAMPECHE','COAHUILA' => 'COAHUILA','COLIMA' => 'COLIMA','CHIAPAS' => 'CHIAPAS','CHIHUAHUA' => 'CHIHUAHUA','DISTRITO FEDERAL' => 'DISTRITO FEDERAL','DURANGO' => 'DURANGO','JALISCO' => 'JALISCO','MÉXICO' => 'MÉXICO','MICHOACÁN' => 'MICHOACÁN','MORELOS' => 'MORELOS','NAYARIT' => 'NAYARIT','NUEVO LEÓN' => 'NUEVO LEÓN','OAXACA' => 'OAXACA','PUEBLA' => 'PUEBLA','QUERÉTARO' => 'QUERÉTARO','QUINTANA ROO'=>'QUINTANA ROO','SAN LUIS POTOSÍ'=> 'SAN LUIS POTOSÍ','SINALOA'=>'SINALOA','SONORA','SONORA','TABASCO'=>'TABASCO','TAMAULIPAS'=>'TAMAULIPAS','TLAXCALA'=>'TLAXCALA','VERACRUZ'=>'VERACRUZ','YUCATÁN'=>'YUCATÁN','ZACATECAS'=>'ZACATECAS'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('postal_code', 'Código Postal:') !!}
                {!! Form::text('postal_code', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE CÓDIGO POSTAL', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('references', 'Referencias:') !!}
                {!! Form::text('references', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE REFERENCIA DEL DOMICILIO', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>   
              <div class="col-md-12">
                <div class="gllpLatlonPicker">
                  <label for="exampleInputEmail1">DIRECCIÓN DEL CLIENTE</label>
                  <div class="input-group">
                   <input type="text" class="gllpSearchField col-lg-8  input-lg form-control" placeholder="ESCRIBE LA DIRECCIÓN DEL CLIENTE, EJ: AV. CENTRAL OTE. 214 SAN MARCOS, TUXTLA GUTIÉRREZ, CHIS.">
                   <div class="input-group-btn">
                     <input type="button" class="gllpSearchButton btn bg-navy input-lg" value="Buscar">
                 </div>
             </div>
             <br/><br/>
             <div class="gllpMap">Google Maps</div>
             <br/>
             <input type="hidden" name="latitude" class="gllpLatitude" value="{{$clientLocation->latitude}}"/>
             <input type="hidden" name="lenght" class="gllpLongitude" value="{{$clientLocation->lenght}}"/>
             <input type="hidden" class="gllpZoom" value="12"/>
         </div>
     </div>


            <button class="btn btn-success btn-lg pull-right" type="submit">Guardar</button>

</div>    
</div>

