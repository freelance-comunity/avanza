<div class="box box-danger">
	<div class="box-header with-border">
		<h3 class="box-title">Permisos</h3>
	</div>
	<div class="box-body">
		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('name', 'Nombre:') !!}
			{!! Form::text('name', null, [
				'class' => 'form-control input-lg',
				'required' => 'required',
				'data-parsley-trigger ' => 'input focusin',
				]) !!}
			</div>

			<div class="form-group col-sm-6 col-lg-4">
				{!! Form::label('display_name', 'Nombre Secundario Permiso:') !!}
				{!! Form::text('display_name', null, [
					'class' => 'form-control input-lg',
					'required' => 'required',
					'data-parsley-trigger ' => 'input focusin',
					]) !!}
				</div>

				<div class="form-group col-sm-6 col-lg-4">
					{!! Form::label('description', 'Descripcón:') !!}
					{!! Form::text('description', null, [
						'class' => 'form-control input-lg',
						'required' => 'required',
						'data-parsley-trigger ' => 'input focusin',]) !!}
					</div>

					<div class="form-group col-sm-6 col-lg-4">
						{!! Form::label('code', 'Código:') !!}
						{!! Form::text('code', null, [
							'style' => 'text-transform:uppercase',
							'class' => 'form-control input-lg',
							'required' => 'required',
							'data-parsley-trigger ' => 'input focusin',
							'onkeyup' => 'javascript:this.value=this.value.toUpperCase();'
							]) !!}
						</div>

						<div class="box-body" >
							<div class="col-md-4">
								<div class="btn-group">
									{!! Form::submit('Guardar', ['class' => 'uppercase btn btn-primary', 'id' => 'save']) !!}
								</div>
							</div> 
						</div>
					</div>
				</div>