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
                    <p>Roles</p>
                </div>
            </div>
        </div>
    </div>
    <div class="box-body">
     <form role="form">
        <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Datos </h3>
                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('name', 'Nombre:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE NOMBRE', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('email', 'Correo Electrónico:') !!}
                        <input type="email" class="form-control input-lg" placeholder="example@gmail.com" name="email" value="{{ old('email') }}" required="required" />
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('mother_last_name', 'Apellido Paterno:') !!}
                        {!! Form::text('mother_last_name', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE APELLIDO PATERNO', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('father_last_name', 'Apellido Materno:') !!}
                        {!! Form::text('father_last_name', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE APELLIDO MATERNO', 'required' => 'required']) !!}
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
                        {!! Form::label('place_of_birth', 'Lugar de Nacimiento:') !!}
                        {!! Form::text('place_of_birth', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LUGAR DE NACIMIENTO', 'required' => 'required']) !!}
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
                        {!! Form::label('country_of_birth', 'País de Nacimiento:') !!}
                        {!! Form::select('country_of_birth',['MÉXICO' => 'MÉXICO'] ,null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('nationality', 'Nacionalidad:') !!}
                        {!! Form::select('nationality',['MEXICANA' => 'MEXICANA'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('scholarship', 'Escolaridad:') !!}
                        {!! Form::select('scholarship',['NINGUNA' => 'NINGUNA', 'SABE LEER' => 'SABE LEER', 'PRIMARIA' => 'PRIMARIA', 'SECUNDARIA' => 'SECUNDARIA', 'BACHILLERATO' => 'BACHILLERATO', 'LICENCIATURA' => 'LICENCIATURA', 'POSGRADO' => 'POSGRADO'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('phone_1', 'Teléfono 1:') !!}
                        {!! Form::text('phone_1', null, ['class' => 'form-control input-lg', 'placeholder' => 'TELÉFONO 1', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('phone_2', 'Teléfono 2:') !!}
                        {!! Form::text('phone_2', null, ['class' => 'form-control input-lg', 'placeholder' => 'TELÉFONO 2', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('avatar', 'Foto:') !!}
                        {!! Form::file('avatar') !!}
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
                </div>
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
        <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Identificaciones</h3>
                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('ine', 'INE:') !!}
                        {!! Form::text('ine', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE INE', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('curp', 'CURP:') !!}
                        {!! Form::text('curp', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE CURP', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('rfc', 'RFC:') !!}
                        {!! Form::text('rfc', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE RFC', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('passport', 'PASAPORTE:') !!}
                        {!! Form::text('passport', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE PASAPORTE', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('number_imss', 'IMSS:') !!}
                        {!! Form::text('number_imss', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE FOLIO DE IMSS', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('driver_license', 'Licencia de Conducir:') !!}
                        {!! Form::text('driver_license', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE LICENCIA DE CONDUCIR', 'required' => 'required']) !!}
                    </div>
                    
                    <div class="form-group col-sm-6 col-lg-4">
                        {!! Form::label('professional_id', 'Cédula Profesional:') !!}
                        {!! Form::text('professional_id', null, ['class' => 'form-control input-lg', 'placeholder' => 'ESCRIBE CÉDULA PROFESIONAL', 'required' => 'required']) !!}
                    </div>

                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-4">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Roles</h3>
                    @php
                    $roles = App\Role::all();
                    @endphp                 
                    <div class="btn-group btn-group" data-toggle="buttons">
                        @foreach ($roles as $role) 
                        <label class="btn active">
                            <input type="checkbox" name='roles[]'><i class="fa fa-square-o fa-2x"></i><i class="fa fa-check-square-o fa-2x"></i><span> {{ $role->name }}
                        </label>
                        @endforeach
                    </div>
                    <div class="form-group col-sm-12">
                        <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
