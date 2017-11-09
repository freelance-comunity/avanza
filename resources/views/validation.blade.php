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

					<div id="signature-pad" class="m-signature-pad">
						<div class="m-signature-pad--body">
							<canvas></canvas>
						</div>
						<div class="m-signature-pad--footer">
							<div class="description">Firma aquí</div>
							<button type="button" class="button clear" data-action="clear">Limpiar</button>
							<button type="button" class="button save" data-action="save">Usar</button>
						</div>
					</div>

					<div class="form-group col-sm-12">
						{!! Form::submit('Guardar', ['class' => 'uppercase btn btn-primary']) !!}
					</div>

					{!! Form::close() !!}
				</div>
			</div>
			@endsection
			<script>
				var wrapper = document.getElementById("signature-pad"),
				clearButton = wrapper.querySelector("[data-action=clear]"),
				saveButton = wrapper.querySelector("[data-action=save]"),
				canvas = wrapper.querySelector("canvas"),
				signaturePad;

				function resizeCanvas() {
					var ratio =  Math.max(window.devicePixelRatio || 1, 1);
					canvas.width = canvas.offsetWidth * ratio;
					canvas.height = canvas.offsetHeight * ratio;
					canvas.getContext("2d").scale(ratio, ratio);
				}

				window.onresize = resizeCanvas;
				resizeCanvas();

				signaturePad = new SignaturePad(canvas);

				clearButton.addEventListener("click", function (event) {
					signaturePad.clear();
				});

				saveButton.addEventListener("click", function (event) {
					if (signaturePad.isEmpty()) {
						alert("Por favor dibuja tu firma.");
					} else {
						document.getElementById('signature').value=signaturePad.toDataURL('image/png');
					}
				});
			</script>
