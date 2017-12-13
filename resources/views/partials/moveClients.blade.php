@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection
@section('main-content')
@section('message_level')
Transferir
@endsection
@section('message_level_here')
Detalles
@endsection
<style media="screen">
html {
	font-family: Lato, 'Helvetica Neue', Arial, Helvetica, sans-serif;
	font-size: 14px;
}

.table {
	border: none;
}

.table-definition thead th:first-child {
	pointer-events: none;
	background: white;
	border: none;
}

.table td {
	vertical-align: middle;
}

.page-item > * {
	border: none;
}

.custom-checkbox {
	min-height: 1rem;
	padding-left: 0;
	margin-right: 0;
	cursor: pointer;
}
.custom-checkbox .custom-control-indicator {
	content: "";
	display: inline-block;
	position: relative;
	width: 30px;
	height: 10px;
	background-color: #818181;
	border-radius: 15px;
	margin-right: 10px;
	-webkit-transition: background .3s ease;
	transition: background .3s ease;
	vertical-align: middle;
	margin: 0 16px;
	box-shadow: none;
}
.custom-checkbox .custom-control-indicator:after {
	content: "";
	position: absolute;
	display: inline-block;
	width: 18px;
	height: 18px;
	background-color: #f1f1f1;
	border-radius: 21px;
	box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4);
	left: -2px;
	top: -4px;
	-webkit-transition: left .3s ease, background .3s ease, box-shadow .1s ease;
	transition: left .3s ease, background .3s ease, box-shadow .1s ease;
}
.custom-checkbox .custom-control-input:checked ~ .custom-control-indicator {
	background-color: #84c7c1;
	background-image: none;
	box-shadow: none !important;
}
.custom-checkbox .custom-control-input:checked ~ .custom-control-indicator:after {
	background-color: #84c7c1;
	left: 15px;
}
.custom-checkbox .custom-control-input:focus ~ .custom-control-indicator {
	box-shadow: none !important;
}
</style>
<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Realizar transferencia de Cliente</h3>
			</div>  


			@if($clients->isEmpty())
			<div class="well text-center">No se encontraron créditos.</div>
			@else
			<div class="table-responsive">
				{!! Form::open(['url' => 'moveClientAll','data-parsley-validate' => '']) !!}
				{{ csrf_field() }}
				@if(Auth::user()->hasRole(['administrador', 'director-general', 'coordinador-regional', 'coordinador-sucursal']))
				<table class="table"  id="example">
					@else
					<table class="table"  id="pagos_promotor">
						@endif
						<thead class="bg-primary">
							<th>Seleccionar</th>
							<th>Promotor Actual</th>
							<th>Cliente</th>
							<th>Sucursal</th>

						</thead>
						<tbody>
							@foreach($clients as $key=>$client)
							@if ($user->id != $client->user_id)
							<tr>
								<td>
									<label class="custom-control custom-checkbox">
										<input type="checkbox" data-parsley-multiple="checkbox" data-parsley-mincheck="1" data-parsley-required data-parsley-error-message="Por favor selecciona al menos un crédito" name="rows[{{$client->id}}][id]" value="{{$client->id}}" class="custom-control-input">
										<span class="custom-control-indicator"></span>
									</label>

								</td>
								<td>{{$client->user->name}} {{$client->user->father_last_name}} {{$client->user->mother_last_name}}</td>
								<td>{!! $client->firts_name !!} {!! $client->last_name !!} {!! $client->mothers_last_name !!}</td>
								
								<td>{!! $client->branch['name'] !!}</td>

							</tr>
							@endif


							@endforeach
						</tbody>
					</table>
					<input type="hidden" name="user_id" value="{{ $user->id }}">
					<div class="form-group col-sm-6 col-lg-4">
						<input type="submit" value="SIGUIENTE" class="btn btn-lg uppercase btn-success">
					</div>
				</div>
				{!! Form::close() !!}
				@endif
				@include('partials.move')
			</div>
		</div>
		@endsection
