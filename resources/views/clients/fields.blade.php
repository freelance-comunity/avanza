<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Registro Personal</h3>
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Datos</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Ubicación</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p>Identificaciones</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                    <p>Aval</p>
                </div>
            </div>
        </div>
    </div>
    <div class="box-body">
     <div class="row setup-content" id="step-1">
        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('folio', 'Folio:') !!}
            {!! Form::text('folio', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL FOLIO DEL CLIENTE','required'=>'required']) !!}

        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('firts_name', 'Nombre(s):') !!}
            {!! Form::text('firts_name', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL NOMBRE CLIENTE','required'=>'required']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('last_name', 'Apellido Paterno:') !!}
            {!! Form::text('last_name', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL APELLIDO PATERNO','required'=>'required']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('mothers_last_name', 'Apellido Materno:') !!}
            {!! Form::text('mothers_last_name', null, ['class' => 'form-control input-lg', 'placeholder'=>'ESCRIBE EL APELLIDO MATERNO','required'=>'required']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('birthdate', 'Fecha de Nacimiento:') !!}
            <input type="date" name="birthdate" class="form-control input-lg" required="required">
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('birth_entity', 'Entidad de Nacimiento:') !!}
            {!! Form::text('birth_entity', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
        </div>


        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('gender', 'Género:') !!}
            {!! Form::select('gender',['HOMBRE' => 'HOMBRE', 'MUJER' => 'MUJER'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('civil_status', 'Estado Civil:') !!}
            {!! Form::select('civil_status',['SOLTERO(A)' => 'SOLTERO(A)', 'CASADO(A)' => 'CASADO(A)'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('country', 'País de Nacimiento:') !!}
            {!! Form::select('country',['MÉXICO' => 'MÉXICO'] ,null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('nationality', 'Nacionalidad:') !!}
            {!! Form::select('nationality',['MEXICANA' => 'MEXICANA'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('scholarship', 'Grado Escolar:') !!}
            {!! Form::select('scholarship',['NINGUNA' => 'NINGUNA', 'SABE LEER' => 'SABE LEER', 'PRIMARIA' => 'PRIMARIA', 'SECUNDARIA' => 'SECUNDARIA', 'BACHILLERATO' => 'BACHILLERATO', 'LICENCIATURA' => 'LICENCIATURA', 'POSGRADO' => 'POSGRADO'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('phone_one', 'Teléfono 1:') !!}
            {!! Form::text('phone_one', null, ['class' => 'form-control input-lg', 'placeholder' => 'TELÉFONO 1', 'required' => 'required']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('phone_two', 'Teléfono 2:') !!}
            {!! Form::text('phone_two', null, ['class' => 'form-control input-lg', 'placeholder' => 'TELÉFONO 1', 'required' => 'required']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('no_children', 'Número de Hijos:') !!}
            {!! Form::select('no_children',['1' => '1', ' 2' => ' 2', '3' => '3', '4' => '4', '5' => '5'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('no_economic_dependent', '´No. de Dependientes Economicos') !!}
            {!! Form::select('no_economic_dependent',['1' => '1', ' 2' => ' 2', '3' => '3', '4' => '4', '5' => '5'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('avatar', 'Imagen:') !!}
            {!! Form::file('avatar', ['class' => 'form-control input-lg']) !!}
        </div>
         <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
        @php
        $count = App\Models\Branch::all();
        @endphp

        <div class="form-group col-sm-6 col-lg-4">
            {!! Form::label('branch_id', '* Sucursal:') !!}
            <select name="branch_id" value="" class="form-control input-lg" id="branch">
                @if($count ->isEmpty())
                <option value="">No hay sucursales registradas en el sistema</option>
                @else 
                <option selected value="">Seleccione Sucursal</option>
                @foreach($branch as $branches)
                <option value="{{ $branches->id}}">{{$branches->name}}</option>
                @endforeach
                @endif
            </select>
        </div>

        <div class="form-group col-sm-12">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        </div>
        </div>
         <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Ubicación </h3>
                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('country', 'País:') !!}
                        {!! Form::text('country', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE PAÍS', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('state', 'Estado:') !!}
                        {!! Form::text('state', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE ESTADO', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('municipality', 'Municipio:') !!}
                        {!! Form::text('municipality', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE MUNICIPIO', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('colony', 'Colonia:') !!}
                        {!! Form::text('colony', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE COLONIA', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('type_of_road', 'Tipo Vialidad:') !!}
                        {!! Form::select('type_of_road', ['AMPLIACIÓN' => 'AMPLIACIÓN', 'ANDADOR' => 'ANDADOR', 'AVENIDA' => 'AVENIDA', 'BOULEVARD' => 'BOULEVARD', 'CALLE' => 'CALLE', 'CALLEJÓN' => 'CALLEJÓN', 'CALZADA' => 'CALZADA', 'CERRADA' => 'CERRADA', 'CIRCUITO' => 'CIRCUITO', 'CIRCUNVALACIÓN' => 'CIRCUNVALACIÓN', 'CONTINUACIÓN' => 'CONTINUACIÓN', 'CORREDOR' => 'CORREDOR', 'DIAGONAL' => 'DIAGONAL', 'EJE VIAL' => 'EJE VIAL', 'PASAJE' => 'PASAJE', 'PEATONAL' => 'PEATONAL', 'PERIFÉRICO' => 'PERIFÉRICO', 'PRIVADA' => 'PRIVADA', 'PROLONGACIÓN' => 'PROLONGACIÓN', 'RETORNO' => 'RETORNO', 'VIADUCTO' => 'VIADUCTO'], null, ['class' => 'form-control input-lg']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('name_road', 'Nombre Vialidad:') !!}
                        {!! Form::text('name_road', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NOMBRE VIALIDAD', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('outdoor_number', 'Nº E.:') !!}
                        {!! Form::text('outdoor_number', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NÚMERO EXTERIOR', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('interior_number', 'Nº I.:') !!}
                        {!! Form::text('interior_number', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NÚMERO INTERIOR', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('postal_code', 'Código Postal:') !!}
                        {!! Form::text('postal_code', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE CÓDIGO POSTAL', 'required' => 'required']) !!}
                    </div>

                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
                </div>
            </div>
        </div>

    </div>    
</div>
