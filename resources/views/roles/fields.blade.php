<div class="box box-danger">
	<div class="box-header with-border">
		<h3 class="box-title">Rol</h3>
	</div>
	<div class="box-body">

		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('name', 'Nombre Rol:') !!}
			{!! Form::text('name', null, ['class' => 'form-control input-lg', 'placeholder' => 'NOMBRE ROL', 'required' => 'required']) !!}
		</div>

		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('display_name', 'Nombre Secundario Rol:') !!}
			{!! Form::text('display_name', null, ['class' => 'form-control input-lg', 'placeholder' => 'NOMBRE SECUNDARIO', 'required' => 'required']) !!}
		</div>

		<div class="form-group col-sm-6 col-lg-4"></div>

		<div class="form-group col-sm-12 col-lg-12">
			{!! Form::label('description', 'Descripción:') !!}
			{!! Form::textarea('description', null, ['class' => 'form-control input-lg', 'placeholder' => 'DESCRIPCIÓN...', 'required' => 'required']) !!}
		</div>

		<div class="form-group col-sm-12">
			{!! Form::submit('Guardar', ['class' => 'uppercase btn btn-primary']) !!}
		</div>
	</div>
</div>
