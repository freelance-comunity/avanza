<div class="box box-danger">
  <div class="box-header with-border">
    <div>
      <h3> Datos del Negocio</h3>
    </div>
    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('street_company', 'Calle:') !!}
      {!! Form::text('street_company',  null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL NOMBRE DE LA CALLE', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
    </div>
    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('number_company', 'Número de Casa:') !!}
      {!! Form::text('number_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE EL NÚMERO DE LA CASA', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
    </div>  
    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('colony_company', 'Colonia:') !!}
      {!! Form::text('colony_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
    </div>
    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('municipality_company', 'Municipio:') !!}
      {!! Form::text('municipality_company',null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE MUNICIPIO', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();','data-parsley-trigger ' => 'input focusin',]) !!}
    </div>
    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('state_company', 'Estado:') !!}
      {!! Form::select('state_company',['placeholder'=>'SELECCIONE UN ESTADO','AGUASCALIENTES' => 'AGUASCALIENTES', 'BAJA CALIFORNIA' => 'BAJA CALIFORNIA', 'BAJA CALIFORNIA SUR' => 'BAJA CALIFORNIA SUR','CAMPECHE' => 'CAMPECHE','COAHUILA' => 'COAHUILA','COLIMA' => 'COLIMA','CHIAPAS' => 'CHIAPAS','CHIHUAHUA' => 'CHIHUAHUA','DISTRITO FEDERAL' => 'DISTRITO FEDERAL','DURANGO' => 'DURANGO','JALISCO' => 'JALISCO','MÉXICO' => 'MÉXICO','MICHOACÁN' => 'MICHOACÁN','MORELOS' => 'MORELOS','NAYARIT' => 'NAYARIT','NUEVO LEÓN' => 'NUEVO LEÓN','OAXACA' => 'OAXACA','PUEBLA' => 'PUEBLA','QUERÉTARO' => 'QUERÉTARO','QUINTANA ROO'=>'QUINTANA ROO','SAN LUIS POTOSÍ'=> 'SAN LUIS POTOSÍ','SINALOA'=>'SINALOA','SONORA','SONORA','TABASCO'=>'TABASCO','TAMAULIPAS'=>'TAMAULIPAS','TLAXCALA'=>'TLAXCALA','VERACRUZ'=>'VERACRUZ','YUCATÁN'=>'YUCATÁN','ZACATECAS'=>'ZACATECAS'], null, ['class' => 'form-control input-lg', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin']) !!}
    </div>
    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('postal_code_company', 'Código Postal:') !!}
      {!! Form::text('postal_code_company',null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE CÓDIGO POSTAL', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','data-parsley-maxlength' => '5','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
    </div>
    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('phone_company', 'Teléfono del Negocio:') !!}
      {!! Form::text('phone_company',  null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NÚMERO DEL TELÉFONO', 'required' => 'required','data-parsley-trigger ' => 'input focusin', 'data-parsley-type' => 'digits', 'data-parsley-maxlength' => '10','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
    </div>

    <div class="form-group col-sm-6 col-lg-4">
      {!! Form::label('name_company', 'Nombre del Negocio:') !!}
      {!! Form::text('name_company', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NOMBRE DEL NEGOCIO', 'required' => 'required','data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
    </div>
    
<div class="col-md-12">
  <div class="gllpLatlonPicker">
    <label for="exampleInputEmail1">DIRECCIÓN DEL NEGOCIO</label>
    <div class="input-group">
     <input type="text" class="gllpSearchField col-lg-8  input-lg form-control" placeholder="ESCRIBE LA DIRECCIÓN DEL NEGOCIO, EJ: AV. CENTRAL OTE. 214 SAN MARCOS, TUXTLA GUTIÉRREZ, CHIS.">
     <div class="input-group-btn">
       <input type="button" class="gllpSearchButton btn bg-navy input-lg" value="Buscar">
     </div>
   </div>
   <br/><br/>
   <div class="gllpMap">Google Maps</div>
   <br/>
   <input type="hidden" name="latitude_company" class="gllpLatitude" value="{{$clientCompany->latitude_company}}"/>
   <input type="hidden" name="length_company" class="gllpLongitude" value="{{$clientCompany->length_company}}"/>
   <input type="hidden" class="gllpZoom" value="12"/>
 </div>
</div>


<div class="box-body" >
 <div class="col-md-4">
  <div class="btn-group">
    {!! Form::submit('Guardar', ['class' => 'uppercase btn btn-primary', 'id' => 'save']) !!}
  </div>
</div> 
</div>

</div>    
</div>

