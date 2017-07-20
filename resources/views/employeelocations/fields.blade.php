<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">EDITAR DATOS DOMICILIARIOS</h3>
    </div>
    <div class="box-body">
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('country', 'País:') !!}
            {!! Form::select('country',['MÉXICO' => 'MÉXICO'] ,null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('state', 'Estado:') !!}
            {!! Form::select('state',['placeholder'=>'SELECCIONES UN ESTADO','AGUASCALIENTES' => 'AGUASCALIENTES', 'BAJA CALIFORNIA' => 'BAJA CALIFORNIA', 'BAJA CALIFORNIA SUR' => 'BAJA CALIFORNIA SUR','CAMPECHE' => 'CAMPECHE','COAHUILA' => 'COAHUILA','COLIMA' => 'COLIMA','CHIAPAS' => 'CHIAPAS','CHIHUAHUA' => 'CHIHUAHUA','DISTRITO FEDERAL' => 'DISTRITO FEDERAL','DURANGO' => 'DURANGO','JALISCO' => 'JALISCO','MÉXICO' => 'MÉXICO','MICHOACÁN' => 'MICHOACÁN','MORELOS' => 'MORELOS','NAYARIT' => 'NAYARIT','NUEVO LEÓN' => 'NUEVO LEÓN','OAXACA' => 'OAXACA','PUEBLA' => 'PUEBLA','QUERÉTARO' => 'QUERÉTARO','QUINTANA ROO'=>'QUINTANA ROO','SAN LUIS POTOSÍ'=> 'SAN LUIS POTOSÍ','SINALOA'=>'SINALOA','SONORA','SONORA','TABASCO'=>'TABASCO','TAMAULIPAS'=>'TAMAULIPAS','TLAXCALA'=>'TLAXCALA','VERACRUZ'=>'VERACRUZ','YUCATÁN'=>'YUCATÁN','ZACATECAS'=>'ZACATECAS'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('municipality', 'Municipio:') !!}
            {!! Form::text('municipality', null, ['style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE MUNICIPIO', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('colony', 'Colonia:') !!}
            {!! Form::text('colony', null, ['style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('type_of_road', 'Tipo Vialidad:') !!}
            {!! Form::select('type_of_road', ['AMPLIACIÓN' => 'AMPLIACIÓN', 'ANDADOR' => 'ANDADOR', 'AVENIDA' => 'AVENIDA', 'BOULEVARD' => 'BOULEVARD', 'CALLE' => 'CALLE', 'CALLEJÓN' => 'CALLEJÓN', 'CALZADA' => 'CALZADA', 'CERRADA' => 'CERRADA', 'CIRCUITO' => 'CIRCUITO', 'CIRCUNVALACIÓN' => 'CIRCUNVALACIÓN', 'CONTINUACIÓN' => 'CONTINUACIÓN', 'CORREDOR' => 'CORREDOR', 'DIAGONAL' => 'DIAGONAL', 'EJE VIAL' => 'EJE VIAL', 'PASAJE' => 'PASAJE', 'PEATONAL' => 'PEATONAL', 'PERIFÉRICO' => 'PERIFÉRICO', 'PRIVADA' => 'PRIVADA', 'PROLONGACIÓN' => 'PROLONGACIÓN', 'RETORNO' => 'RETORNO', 'VIADUCTO' => 'VIADUCTO'], null, ['style' => 'text-transform:uppercase','class' => 'form-control input-lg']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('name_road', 'Nombre Vialidad:') !!}
            {!! Form::text('name_road', null, ['style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NOMBRE VIALIDAD', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('outdoor_number', 'Nº E.:') !!}
            {!! Form::text('outdoor_number', null, ['style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NÚMERO EXTERIOR', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('interior_number', 'Nº I.:') !!}
            {!! Form::text('interior_number', null, ['style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NÚMERO INTERIOR', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('postal_code', 'Código Postal:') !!}
            {!! Form::text('postal_code', null, ['style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE CÓDIGO POSTAL', 'required' => 'required','onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
        </div>


        <div class="form-group col-sm-12">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        </div>

    </div>
</div>
