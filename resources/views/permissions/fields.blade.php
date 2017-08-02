<div class="box box-danger">
	<div class="box-header with-border">
		<h3 class="box-title">Permisos</h3>
	</div>
	<div class="box-body">
		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('name', 'Nombre:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('display_name', 'Nombre Secundario Permiso:') !!}
			{!! Form::text('display_name', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('description', 'Descripcón:') !!}
			{!! Form::text('description', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-sm-12">
			{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
		</div>
	</div>
</div>