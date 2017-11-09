@extends('layouts.app')
@section('main-content')
<style>
    label.btn span {
      font-size: 1.5em ;
  }

  label input[type="radio"] ~ i.fa.fa-circle-o{
    color: #c8c8c8;    display: inline;
}
label input[type="radio"] ~ i.fa.fa-dot-circle-o{
    display: none;
}
label input[type="radio"]:checked ~ i.fa.fa-circle-o{
    display: none;
}
label input[type="radio"]:checked ~ i.fa.fa-dot-circle-o{
    color: #7AA3CC;    display: inline;
}
label:hover input[type="radio"] ~ i.fa {
    color: #7AA3CC;
}

label input[type="checkbox"] ~ i.fa.fa-square-o{
    color: #c8c8c8;    display: inline;
}
label input[type="checkbox"] ~ i.fa.fa-check-square-o{
    display: none;
}
label input[type="checkbox"]:checked ~ i.fa.fa-square-o{
    display: none;
}
label input[type="checkbox"]:checked ~ i.fa.fa-check-square-o{
    color: #7AA3CC;    display: inline;
}
label:hover input[type="checkbox"] ~ i.fa {
    color: #7AA3CC;
}

div[data-toggle="buttons"] label.active{
    color: #7AA3CC;
}

div[data-toggle="buttons"] label {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 2em;
    text-align: left;
    white-space: nowrap;
    vertical-align: top;
    cursor: pointer;
    background-color: none;
    border: 0px solid 
    #c8c8c8;
    border-radius: 3px;
    color: #c8c8c8;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
}

div[data-toggle="buttons"] label:hover {
    color: #7AA3CC;
}

div[data-toggle="buttons"] label:active, div[data-toggle="buttons"] label.active {
    -webkit-box-shadow: none;
    box-shadow: none;
}


.p{
    color:black;
}
@media screen and (max-width: 600px) {
  .p .responsivo{
      color:black;
  } 
  .p .test {
    white-space: nowrap; 
    width: 50px; 
    font-size:70%;
}
}
</style>
<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Registro Personal</h3>
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step p" id="myparrafo">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p class="responsivo test">Datos</p>
                </div>
                <div class="stepwizard-step p" id="myparrafo">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p class="responsivo test">Ubicación</p>
                </div>
                <div class="stepwizard-step p" id="myparrafo">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p class="responsivo test">Negocio</p>
                </div>
                <div class="stepwizard-step p" id="myparrafo">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                    <p class="responsivo test">Aval</p>
                </div>
                <div class="stepwizard-step p" id="myparrafo">
                    <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                    <p class="responsivo test">Referencias</p>
                </div>
                <div class="stepwizard-step p" id="myparrafo">
                    <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
                    <p  class="responsivo test">Digitalización</p>
                </div>
            </div>
        </div>
    </div>
    <div class="box-body">
       {!! Form::open(['route' => 'employees.store']) !!}
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
                    <input type="email" class="form-control input-lg" placeholder="ESCRIBE CORREO ELECTRÓNICO" name="email" value="{{ old('email') }}" required="required" />
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
                    {!! Form::text('phone_1', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
                </div>

                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('phone_2', 'Teléfono 2:') !!}
                    {!! Form::text('phone_2', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
                </div>

                <div class="form-group col-sm-6 col-lg-4">
                    {!! Form::label('avatar', 'Foto:') !!}
                    {!! Form::text('avatar', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
                </div>

                <button class="btn btn-primary btn-lg pull-right" type="submit" >Siguiente</button>
            </div>
        </div>
    </div>
</form>
<input type="range" value="2000" step="25" min="1000" max="20000">
<small id="helper" class="slideRight">Slide to get started &#x2192;</small>
<br>
<br>
<h2 style="display: inline-block; margin-bottom: 50px;"></h2><output style="display: inline-block">3,825</output>
</div>
</div>
<script>
    function parrafo() {
        var x = document.getElementById("myparrafo");
        if (x.className === "p") {
            x.className += " test";
        } else {
            x.className = "p";
        }
    }
</script>


@include('partials.wizard')
@endsection