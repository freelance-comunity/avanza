<div class="box box-danger">
	<div class="box-header with-border">
		<h3 class="box-title">Proceso de reestructura de créditos</h3>
	</div>

	<div class="box-body">

		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('name', 'Nombre:') !!}
			{!! Form::text('name', null, ['class' => 'form-control input-lg ','required' => 'required',
				'data-parsley-trigger ' => 'input focusin',]) !!}
		</div>

		<div class="form-group col-sm-12 col-lg-12">
			{!! Form::label('area', 'Area Abarcada:') !!}
			{!! Form::textarea('area', null, ['class' => 'form-control input-lg', 'required' => 'required','data-parsley-validate' => '']) !!}
		</div>


		<div class="form-group col-sm-12">
			{!! Form::submit('Guardar', ['class' => 'btn btn-lg btn-primary']) !!}
		</div>
	</div>
</div>
