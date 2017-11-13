@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
@section('message_level')
Movimientos
@endsection
@section('message_level_here')
Detalles
@endsection
<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<div class="box-body">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#menu1"><i class="fa fa-money"></i> Recuperación Access</a></li>
				</ul>
				<div class="tab-content">
					<div id="menu1" class="tab-pane fade in active">
						@if($accesses->isEmpty())
						<div class="well text-center">Ho hay registros.</div>
						@else
						<div class="table-responsive">
							<table class="table" id="acces">
								<thead class="bg-success">
									<th>Sucursal</th>
									<th>Usuario</th>
									<th>Monto</th>
									<th>Concepto</th>
									<th>Fecha/Hora asignación</th>
								</thead>
								<tbody>
									@foreach($accesses as $acces)
									<tr>
										<td>{{ $acces->user->branch['name'] }}</td>
										<td>{{ $acces->user['name'] }} {{ $acces->user['father_last_name'] }} {{ $acces->user['mother_last_name'] }}</td>
										<td>${{ number_format($acces->ammount) }}</td>
										<td>{{ $acces->concept }}</td>
										<td>{{ $acces->created_at }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						@endif
					</div>
				
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
