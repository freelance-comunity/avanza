<div class="box box-danger">
    <div class="box-header with-border">
        <div>
        <h3> Datos del Aval</h3>
      </div>
      <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('name_aval', 'Nombre(s):') !!}
                {!! Form::text('name_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NOMBRE DEL AVAL', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('last_name_aval', 'Apellido Paterno:') !!}
                {!! Form::text('last_name_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE APELLIDO PATERNO DEL AVAL', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('mothers_name_aval', 'Apellido Materno:') !!}
                {!! Form::text('mothers_name_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE APELLIDO MATERNO DEL AVAL', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('birthdate_aval', 'Fecha de nacimiento:') !!}
                <input type="date" value="{{$clientAval->birthdate_aval}}" name="birthdate_aval" data-parsley-trigger="input focusin" class="form-control input-lg" required="required">
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('curp_aval', 'CURP:') !!}
                {!! Form::text('curp_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE CURP DEL AVAL', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('phone_aval', 'Teléfono:') !!}
                {!! Form::text('phone_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE TELÉFONO DEL AVAL', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits', 'data-parsley-maxlength' => '10', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('civil_status_aval', 'Estado Civil:') !!}
                {!! Form::select('civil_status_aval',['SOLTERO(A)' => 'SOLTERO(A)', 'CASADO(A)' => 'CASADO(A)','VIUDO(A)'=>'VIUDO(A)','DIVORCIADO(A)'=>'DIVORCIADO(A)'], null, ['class' => 'form-control input-lg', 'required' => 'required','data-parsley-trigger ' => 'input focusin',]) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('scholarship_aval', 'Grado Escolar:') !!}
                {!! Form::select('scholarship_aval',['NINGUNA' => 'NINGUNA', 'SABE LEER' => 'SABE LEER', 'PRIMARIA' => 'PRIMARIA', 'SECUNDARIA' => 'SECUNDARIA', 'BACHILLERATO' => 'BACHILLERATO', 'LICENCIATURA' => 'LICENCIATURA', 'POSGRADO' => 'POSGRADO'], null, ['class' => 'form-control input-lg', 'required' => 'required','data-parsley-trigger ' => 'input focusin',]) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('street_aval', 'Calle:') !!}
                {!! Form::text('street_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('number_aval', 'Número de casa:') !!}
                {!! Form::text('number_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('colony_aval', 'Colonia:') !!}
                {!! Form::text('colony_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required', 'data-parsley-trigger ' => 'input focusin','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('municipality_aval', 'Municipio:') !!}
                {!! Form::text('municipality_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE MUNICIPIO', 'required' => 'required','data-parsley-trigger ' => 'input focusin', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('state_aval', 'Estado:') !!}
                {!! Form::select('state_aval',['placeholder'=>'SELECCIONE UN ESTADO','AGUASCALIENTES' => 'AGUASCALIENTES', 'BAJA CALIFORNIA' => 'BAJA CALIFORNIA', 'BAJA CALIFORNIA SUR' => 'BAJA CALIFORNIA SUR','CAMPECHE' => 'CAMPECHE','COAHUILA' => 'COAHUILA','COLIMA' => 'COLIMA','CHIAPAS' => 'CHIAPAS','CHIHUAHUA' => 'CHIHUAHUA','DISTRITO FEDERAL' => 'DISTRITO FEDERAL','DURANGO' => 'DURANGO','JALISCO' => 'JALISCO','MÉXICO' => 'MÉXICO','MICHOACÁN' => 'MICHOACÁN','MORELOS' => 'MORELOS','NAYARIT' => 'NAYARIT','NUEVO LEÓN' => 'NUEVO LEÓN','OAXACA' => 'OAXACA','PUEBLA' => 'PUEBLA','QUERÉTARO' => 'QUERÉTARO','QUINTANA ROO'=>'QUINTANA ROO','SAN LUIS POTOSÍ'=> 'SAN LUIS POTOSÍ','SINALOA'=>'SINALOA','SONORA','SONORA','TABASCO'=>'TABASCO','TAMAULIPAS'=>'TAMAULIPAS','TLAXCALA'=>'TLAXCALA','VERACRUZ'=>'VERACRUZ','YUCATÁN'=>'YUCATÁN','ZACATECAS'=>'ZACATECAS'], null, ['class' => 'form-control input-lg', 'required' => 'required','data-parsley-trigger ' => 'input focusin']) !!}
            </div>     
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('postal_code_aval', 'Código Postal:') !!}
                {!! Form::text('postal_code_aval', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required','data-parsley-trigger ' => 'input focusin','data-parsley-type' => 'digits','data-parsley-maxlength' => '5', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
            </div>


      <button class="btn btn-success btn-lg pull-right" type="submit">Guardar</button>

  </div>    
</div>

