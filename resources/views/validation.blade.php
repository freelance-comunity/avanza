@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection
@section('contentheader_title')
Parsley JS
@endsection

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		{!! Form::open(['data-parsley-validate' => '']) !!}
		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('name', 'Nombre Rol:') !!} <a id="anchor" href="#" >Link popup</a>
			{!! Form::text('name', null, [
				'class' => 'form-control input-lg',
				'placeholder' => 'NOMBRE ROL', 
				'required' => 'required',
				'data-parsley-required-message' => 'EL CAMPO NOMBRE ES OBLIGATORIO',]) 
				!!}
			</div>

			<div class="form-group col-sm-6 col-lg-4">
				{!! Form::label('display_name', 'Nombre Secundario Rol:') !!}
				{!! Form::text('display_name', null, [
					'class' => 'form-control input-lg', 
					'placeholder' => 'NOMBRE SECUNDARIO', 
					'required' => 'required',
					'data-parsley-required-message' => 'EL CAMPO NOMBRE SECUNDARIO ES OBLIGATORIO',
					]) !!}
				</div>

				<div class="form-group col-sm-6 col-lg-4">
					{!! Form::label('numero', 'Número:') !!}
					{!! Form::text('numero', null, [
						'class' => 'form-control input-lg', 
						'placeholder' => 'ESCRIBE NÚMERO', 
						'required' => 'required',
						'data-parsley-required-message' => 'EL CAMPO NÚMERO ES OBLIGATORIO',
						'data-parsley-type' => 'number',
						'data-parsley-type-message' => 'El campo debe ser numerico',
						]) !!}
					</div>

					<div class="form-group col-sm-6 col-lg-4">
						{!! Form::label('select', 'selecciona:') !!}
						{!! Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, [
						'class' => 'form-control',
						'required' => 'required',
						]); !!}
					</div>

					<div class="form-group col-sm-12">
						{!! Form::submit('Guardar', ['class' => 'uppercase btn btn-primary']) !!}
					</div>

					{!! Form::close() !!}
				</div>
			</div>
			@endsection
<script>
	// usamos onload para asegurarnos que existan los elementos en nuestro DOM
        window.onload = function() {
            var anchor = document.getElementById("anchor");         
            
            // le asociamos el evento a nuestro elemento para tener un codigo 
            // html mas limpio y manejar toda la interaccion
            // desde nuestro script
            anchor.onclick = function() {
                // una variable donde pongo la url a donde quiera ir, 
                //podria estar de mas pero asi queda mas limpio la funcion window.open()
                var url = "https://consultas.curp.gob.mx/CurpSP/";
                window.open(url, "_blank", 'width=500,height=500'); 
                // el return falase es para eviar que se progrague el evento y se vaya al href de tu anchor.
                return false;
            };
        }
</script>
