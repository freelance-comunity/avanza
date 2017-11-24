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
					<li class="active"><a data-toggle="tab" href="#menu1"><i class="fa fa-dollar"></i> Recuperación</a></li>
				</ul>
				<div class="tab-content">
					<div id="menu1" class="tab-pane fade in active">
						@if($recoverys->isEmpty())
						<div class="well text-center">Ho hay registros.</div>
						@else
						<div class="table-responsive">
							<table class="table" id="recovery">
								<thead class="bg-success">
									<th>Sucursal</th>
									<th>Usuario</th>
									<th>Monto</th>
									<th>Concepto</th>
									<th>Cliente</th>
									<th>Folio crédito</th>
									<th>Fecha/Hora asignación</th>
								</thead>
								<tbody>
									@foreach($recoverys as $recovery)
									<tr>
										<td>{{ $recovery->vault->user->branch['name'] }}</td>
										<td>{{ $recovery->vault->user['name'] }} {{ $recovery->vault->user['father_last_name'] }} {{ $recovery->vault->user['mother_last_name'] }}</td>
										<td>${{ number_format($recovery->ammount) }}</td>
										<td>{{ $recovery->concept }}</td>
										<td>{{ $recovery->debt->credit['firts_name'] }} {{ $recovery->debt->credit['last_name'] }} {{ $recovery->debt->credit['mothers_last_name'] }}</td>
										<td>{{ $recovery->debt->credit['folio'] }}</td>
										<td>{{ $recovery->created_at }}</td>
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
