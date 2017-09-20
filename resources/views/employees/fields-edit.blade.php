<div class="box box-danger">
	<div class="box-header with-border">
		<h3 class="box-title">Rol</h3>
	</div>
	<div class="box-body">
		<div class="form-group col-sm-6 col-lg-4">
			{!! Form::label('name', 'Nombre:') !!}
			{!! Form::text('name', null, [
				'style' => 'text-transform:uppercase',
				'style' => 'text-transform:uppercase',
				'class' => 'form-control input-lg', 
				'placeholder' => 'ESCRIBE NOMBRE', 
				'required' => 'required',
				'data-parsley-trigger' => 'input focusin', 
				'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
			</div>

			<div class="form-group col-sm-6 col-lg-4">
				{!! Form::label('father_last_name', 'Apellido Paterno:') !!}
				{!! Form::text('father_last_name', null, [
					'style' => 'text-transform:uppercase',
					'class' => 'form-control input-lg', 
					'placeholder' => 'ESCRIBE APELLIDO PATERNO', 
					'required' => 'required', 
					'data-parsley-trigger' => 'input focusin', 
					'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
				</div>

				<div class="form-group col-sm-6 col-lg-4">
					{!! Form::label('mother_last_name', 'Apellido Materno:') !!}
					{!! Form::text('mother_last_name', null, [
						'style' => 'text-transform:uppercase',
						'class' => 'form-control input-lg', 
						'placeholder' => 'ESCRIBE APELLIDO MATERNO', 
						'required' => 'required', 
						'data-parsley-trigger' => 'input focusin', 
						'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
					</div>

					<div class="form-group col-sm-6 col-lg-4">
						{!! Form::label('email', 'Correo Electrónico:') !!}
						<input type="email" class="form-control input-lg" placeholder="EJEMPLO@GMAIL.COM" name="email" value="{{ $employee->email }}" value="{{ old('email') }}" required="required" data-parsley-type="email" data-parsley-trigger="input focusin" />
					</div>

					<div class="form-group col-sm-6 col-lg-4">
						{!! Form::label('birthdate', 'Fecha de Nacimiento:') !!}
						 <input type="date" name="birthdate" value="{{ $employee->birthdate}}"  class="form-control input-lg" required="required" data-parsley-trigger="input focusin">

					</div>

					<div class="form-group col-sm-6 col-lg-4">
						{!! Form::label('birth_entity', 'Entidad de Nacimiento:') !!}
						{!! Form::select('birth_entity',['placeholder'=>'SELECCIONES UN ESTADO','AGUASCALIENTES' => 'AGUASCALIENTES', 'BAJA CALIFORNIA' => 'BAJA CALIFORNIA', 'BAJA CALIFORNIA SUR' => 'BAJA CALIFORNIA SUR','CAMPECHE' => 'CAMPECHE','COAHUILA' => 'COAHUILA','COLIMA' => 'COLIMA','CHIAPAS' => 'CHIAPAS','CHIHUAHUA' => 'CHIHUAHUA','DISTRITO FEDERAL' => 'DISTRITO FEDERAL','DURANGO' => 'DURANGO','JALISCO' => 'JALISCO','MÉXICO' => 'MÉXICO','MICHOACÁN' => 'MICHOACÁN','MORELOS' => 'MORELOS','NAYARIT' => 'NAYARIT','NUEVO LEÓN' => 'NUEVO LEÓN','OAXACA' => 'OAXACA','PUEBLA' => 'PUEBLA','QUERÉTARO' => 'QUERÉTARO','QUINTANA ROO'=>'QUINTANA ROO','SAN LUIS POTOSÍ'=> 'SAN LUIS POTOSÍ','SINALOA'=>'SINALOA','SONORA','SONORA','TABASCO'=>'TABASCO','TAMAULIPAS'=>'TAMAULIPAS','TLAXCALA'=>'TLAXCALA','VERACRUZ'=>'VERACRUZ','YUCATÁN'=>'YUCATÁN','ZACATECAS'=>'ZACATECAS'], null, [
							'class' => 'form-control input-lg', 
							'required' => 'required',
							'data-parsley-trigger' => 'input focusin']) !!}
						</div>

						<div class="form-group col-sm-6 col-lg-4">
							{!! Form::label('place_of_birth', 'Lugar de Nacimiento:') !!}
							{!! Form::text('place_of_birth', null, [
								'style' => 'text-transform:uppercase',
								'class' => 'form-control input-lg',
								'placeholder' => 'ESCRIBE LUGAR DE NACIMIENTO', 
								'required' => 'required',
								'data-parsley-trigger' => 'input focusin']) !!}
							</div>

							<div class="form-group col-sm-6 col-lg-4">
								{!! Form::label('gender', 'Género:') !!}
								{!! Form::select('gender',['HOMBRE' => 'HOMBRE', 'MUJER' => 'MUJER'], null, [
									'style' => 'text-transform:uppercase',
									'class' => 'form-control input-lg', 
									'required' => 'required',
									'data-parsley-trigger' => 'input focusin']) !!}
								</div>

								<div class="form-group col-sm-6 col-lg-4">
									{!! Form::label('civil_status', 'Estado Civil:') !!}
									{!! Form::select('civil_status',['SOLTERO(A)' => 'SOLTERO(A)', 'CASADO(A)' => 'CASADO(A)'], null, [
										'style' => 'text-transform:uppercase',
										'class' => 'form-control input-lg', 
										'required' => 'required',
										'data-parsley-trigger' => 'input focusin']) !!}
									</div>

									<div class="form-group col-sm-6 col-lg-4">
										{!! Form::label('country_of_birth', 'País de Nacimiento:') !!}
										{!! Form::select('country_of_birth',['MÉXICO' => 'MÉXICO'] ,null, [
											'style' => 'text-transform:uppercase',
											'class' => 'form-control input-lg', 
											'required' => 'required',
											'data-parsley-trigger' => 'input focusin']) !!}
										</div>

										<div class="form-group col-sm-6 col-lg-4">
											{!! Form::label('nationality', 'Nacionalidad:') !!}
											{!! Form::select('nationality',['MEXICANA' => 'MEXICANA'], null, [
												'style' => 'text-transform:uppercase',
												'class' => 'form-control input-lg', 
												'required' => 'required',
												'data-parsley-trigger' => 'input focusin']) !!}
											</div>

											<div class="form-group col-sm-6 col-lg-4">
												{!! Form::label('scholarship', 'Escolaridad:') !!}
												{!! Form::select('scholarship',['NINGUNA' => 'NINGUNA', 'SABE LEER' => 'SABE LEER', 'PRIMARIA' => 'PRIMARIA', 'SECUNDARIA' => 'SECUNDARIA', 'BACHILLERATO' => 'BACHILLERATO', 'LICENCIATURA' => 'LICENCIATURA', 'POSGRADO' => 'POSGRADO'], null, [
													'style' => 'text-transform:uppercase',
													'class' => 'form-control input-lg', 
													'required' => 'required',
													'data-parsley-trigger' => 'input focusin']) !!}
												</div>

												<div class="form-group col-sm-6 col-lg-4">
													{!! Form::label('phone_1', 'Teléfono 1:') !!}
													{!! Form::text('phone_1', null, [
														'style' => 'text-transform:uppercase',
														'class' => 'form-control input-lg', 
														'placeholder' => 'TELÉFONO 1', 
														'required' => 'required',
														'data-parsley-trigger' => 'input focusin',
														'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
													</div>

													<div class="form-group col-sm-6 col-lg-4">
														{!! Form::label('phone_2', 'Teléfono 2:') !!}
														{!! Form::text('phone_2', null, ['style' => 'text-transform:uppercase','class' => 'form-control input-lg', 'placeholder' => 'TELÉFONO 2', 'required' => 'required', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!}
													</div>
													@php
													$count = App\Models\Branch::all();
													@endphp

													<div class="form-group col-sm-6 col-lg-4">
														{!! Form::label('branch_id', '* Sucursal:') !!}
														<select name="branch_id" required="required" data-parsley-trigger="input focusin" value="{{ old('branch_id') }}" class="form-control input-lg" ">
															@foreach($count as $branches)
															<option value="{{$branches->id}}" {{ ($branches->id == $employee->branch_id) ? 'selected=selected' : '' }}>
																{{$branches->name}} 
																@endforeach
															</select>
														</div>
														<div class="form-group col-sm-12">
															{!! Form::submit('Guardar', ['class' => 'uppercase btn btn-primary']) !!}
														</div>
													</div>
												</div>