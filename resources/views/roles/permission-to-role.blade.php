@extends('layouts.app')

@section('main-content')
<div class="container">
	<div class="row">
		<h1 class="pull-left">Asignar Permisos al rol {{ $role->display_name }}</h1>
	</div>
	 {!! Form::open(['url' => 'asignamment']) !!}
		{{-- Start accordion permissions --}}
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="color: black;">
							<h3>INICIO</h3></a>
						</h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
						<div class="panel-body">
							@foreach ($permissions as $permission)
							@if($permission->code == 'INICIO')
							<div class="form-group">
								{{ $permission->display_name }}
								<br>
								<label class="switch">
									<input type="checkbox" name="rows[{{$permission->id}}][id]" value="{{$permission->id}}">
									<span class="slider round"></span>
								</label>
							</div>
							@endif
							@endforeach
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse2" style="color: black;"><h3>COTIZADOR</h3></a>
						</h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse">
						<div class="panel-body">
							@foreach ($permissions as $permission)
							@if($permission->code == 'COTIZADOR')
							<div class="form-group col-sm-6 col-lg-4">
								{{ $permission->display_name }}
								<br>
								<label class="switch">
									<input type="checkbox" name="rows[{{$permission->id}}][id]" value="{{$permission->id}}">
									<span class="slider round"></span>
								</label>
							</div>
							@endif
							@endforeach
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse3" style="color: black;"><h3>CLIENTES</h3></a>
						</h4>
					</div>
					<div id="collapse3" class="panel-collapse collapse">
						<div class="panel-body">
							@foreach ($permissions as $permission)
							@if($permission->code == 'CLIENTES')
							<div class="form-group col-sm-6 col-lg-4">
								{{ $permission->display_name }}
								<br>
								<label class="switch">
									<input type="checkbox" name="rows[{{$permission->id}}][id]" value="{{$permission->id}}">
									<span class="slider round"></span>
								</label>
							</div>
							@endif
							@endforeach
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse4" style="color: black;"><h3>CRÉDITOS</h3></a>
						</h4>
					</div>
					<div id="collapse4" class="panel-collapse collapse">
						<div class="panel-body">
							@foreach ($permissions as $permission)
							@if($permission->code == 'CREDITOS')
							<div class="form-group col-sm-6 col-lg-4">
								{{ $permission->display_name }}
								<br>
								<label class="switch">
									<input type="checkbox" name="rows[{{$permission->id}}][id]" value="{{$permission->id}}">
									<span class="slider round"></span>
								</label>
							</div>
							@endif
							@endforeach
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse5" style="color: black;"><h3>PAGOS</h3></a>
						</h4>
					</div>
					<div id="collapse5" class="panel-collapse collapse">
						<div class="panel-body">
							@foreach ($permissions as $permission)
							@if($permission->code == 'PAGOS')
							<div class="form-group col-sm-6 col-lg-4">
								{{ $permission->display_name }}
								<br>
								<label class="switch">
									<input type="checkbox" name="rows[{{$permission->id}}][id]" value="{{$permission->id}}">
									<span class="slider round"></span>
								</label>
							</div>
							@endif
							@endforeach
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse6" style="color: black;"><h3>CORTE DE CAJA</h3></a>
						</h4>
					</div>
					<div id="collapse6" class="panel-collapse collapse">
						<div class="panel-body">
							@foreach ($permissions as $permission)
							@if($permission->code == 'CORTE DE CAJA')
							<div class="form-group col-sm-6 col-lg-4">
								{{ $permission->display_name }}
								<br>
								<label class="switch">
									<input type="checkbox" name="rows[{{$permission->id}}][id]" value="{{$permission->id}}">
									<span class="slider round"></span>
								</label>
							</div>
							@endif
							@endforeach
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse7" style="color: black;"><h3>CONFIGURACIÓN</h3></a>
						</h4>
					</div>
					<div id="collapse7" class="panel-collapse collapse">
						<div class="panel-body">
							@foreach ($permissions as $permission)
							@if($permission->code == 'CONFIGURACIÓN')
							<div class="form-group col-sm-6 col-lg-4">
								{{ $permission->display_name }}
								<br>
								<label class="switch">
									<input type="checkbox" name="rows[{{$permission->id}}][id]" value="{{$permission->id}}">
									<span class="slider round"></span>
								</label>
							</div>
							@endif
							@endforeach
						</div>
					</div>
				</div>
			</div>
			{{-- End accordion permissions --}}
			<div class="form-group col-sm-12" style="text-align: center;">
				<input type="hidden" name="rol_id" value="{{$role->id}}">
				{!! Form::submit('Guardar', ['class' => 'uppercase btn-lg btn btn-primary']) !!}
			</div>
		{!! Form::close() !!}
	</div>
	@endsection
