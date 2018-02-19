@extends('layouts.app')
@section('main-content')
<div class="container">
	<div class="box box-danger">
		<div class="box-header with-border">
			<h3 class="box-title">Pérfil de usuario</h3>
		</div>
		<div class="box-body">
			{{-- Start header profile --}}
			<div class="col-md-12">
				<div class="box box-widget widget-user">
					<div class="widget-user-header bg-black" style="background: url({{ asset('/img/bg_profile2.jpg') }}) center center;">
						<h3 class="widget-user-username">{{ Auth::user()->name }} {{ Auth::user()->father_last_name }} {{ Auth::user()->mother_last_name }}</h3>
						<h5 class="widget-user-desc">SUCURSAL: {{ Auth::user()->branch->name }}</h5>
					</div>
					<div class="widget-user-image">
						<img class="img-circle" src="{{ asset('/uploads/avatars') }}/{!! Auth::user()->avatar !!}" alt="User Avatar">
					</div>
					<div class="box-footer">
						<div class="row">
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h5 class="description-header">TELÉFONO</h5>
									<span class="description-text">{{ Auth::user()->phone_1 }}</span>
								</div>
								<!-- /.description-block -->
							</div>
							<!-- /.col -->
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h5 class="description-header">CURP</h5>
									<span class="description-text">
										@if (is_null(Auth::user()->credential))
										No cuentas con estos datos.
										@else
										{{ Auth::user()->credential->curp }}
										@endif
									</span>
								</div>
								<!-- /.description-block -->
							</div>
							<!-- /.col -->
							<div class="col-sm-4">
								<div class="description-block">
									<h5 class="description-header">INE</h5>
									<span class="description-text">
										@if (is_null(Auth::user()->credential))
										No cuentas con estos datos.
										@else
										{{ Auth::user()->credential->ine }}
										@endif
									</span>
								</div>
								<!-- /.description-block -->
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
				</div>
			</div>
			{{-- End header profile --}}
			<div class="col-md-12">
				<div class="col-md-6">
					<div class="box box-danger">
						<div class="box-header with-border">
							<h3 class="box-title">Datos Generales</h3>
						</div>
						<div class="box-body">
							<p>
								<i class="fa fa-user fa-2x"></i> {{ Auth::user()->name }} {{ Auth::user()->father_last_name }} {{ Auth::user()->mother_last_name }}
							</p>
							<p>	
								<i class="fa fa-send fa-2x"></i> {{ Auth::user()->email }}
							</p>
							<p>	
								<i class="fa fa-calendar fa-2x"></i> {{ Auth::user()->birthdate->format('l, d F Y') }}
							</p>
							<p>	
								<i class="fa fa-genderless fa-2x"></i> {{ Auth::user()->gender }}
							</p>
							<p>	
								<i class="fa fa-home fa-2x"></i> {{ Auth::user()->place_of_birth }}, {{ Auth::user()->birth_entity }}
							</p>
							<p>	
								@if (is_null(Auth::user()->location))
								<i class="fa fa-map-marker fa-2x"></i> No cuentas con estos datos.
								@else
								<i class="fa fa-map-marker fa-2x"></i> {{ Auth::user()->location->colony }}
								@endif
							</p>
							<p>	
								<i class="fa fa-graduation-cap fa-2x"></i> {{ Auth::user()->scholarship }}
							</p>
							<p>	
								<i class="fa fa-globe fa-2x"></i> {{ Auth::user()->nationality }}
							</p>
						</div>
					</div>
				</div>
				@if (Auth::user()->hasRole(['administrador', 'director-general', 'coordinador-regional','ejecutivo-de-crédito']))
				<div class="col-md-6">
					<div class="box box-danger">
						<div class="box-header with-border">
							<h3 class="box-title"><i class="fa fa-key fa-1x"></i> Cambiar Contraseña</h3>
						</div>
						<div class="box-body">
							<form action="{{ url('updatepassword') }}" method="POST" data-parsley-validate>
								{{ csrf_field() }}
								<div class="form-group">
									<label for="">Nombre de Usuario</label>
									<input type="text" name="username" class="form-control input-lg" value="{{ Auth::user()->email }}" readonly="">
								</div>
								<div class="form-group">
									<label for="">Nueva contraseña</label>
									<input type="password" id="anotherfield" name="password" required="" class="form-control input-lg">
								</div>
								<div class="form-group">
									<label for="">Confirmar Contraseña</label>
									<input type="password" data-parsley-equalto="#anotherfield" name="confirmpassword" required="" class="form-control input-lg">
								</div>
								<input type="hidden" value="{{Auth::user()->id}}" name="user_id">
								<div class="form-group col-sm-12">
									{!! Form::submit('actualizar', ['class' => 'uppercase btn btn-primary']) !!}
								</div>
							</form>
						</div>
					</div>
				</div>
				@endif 
				{{-- <a href="{{ url('/avatar') }}/{!! Auth::user()->avatar !!}"><img  style="border-radius: 50%; padding: 2px; width: 100px;" class="img-circle" src="{{ asset('/uploads/avatars') }}/{!! Auth::user()->avatar !!}" alt="User Avatar"></a> --}}
			</div>
		</div>
	</div>
</div>
@endsection
