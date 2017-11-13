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
					<li class="active"><a data-toggle="tab" href="#menu1"><i class="fa fa-money"></i> Asignación Efectivo</a></li>
				</ul>
				<div class="tab-content">
					<div id="menu1" class="tab-pane fade in active">
					
						@if($assignments->isEmpty())
						<div class="well text-center">Ho hay registros.</div>
						@else
						<div class="table-responsive">
							<table class="table" id="assignment">
								<thead class="bg-success">
									<th>Sucursal</th>
									<th>Usuario</th>
									<th>Monto</th>
									<th>Concepto</th>
									<th>Fecha/Hora asignación</th>
								</thead>
								<tbody>
									@foreach($assignments as $assignment)
									{{-- @if ($assignment->vault->user->region_id != $region_allocation->id)
									<tr style="display: none;">
										<td>{{ $assignment->vault->user->branch['name'] }}</td>
										<td>{{ $assignment->vault->user['name'] }} {{ $assignment->vault->user['father_last_name'] }} {{ $assignment->vault->user['mother_last_name'] }}</td>
										<td>${{ number_format($assignment->ammount) }}</td>
										<td>{{ $assignment->concept }}</td>
										<td>{{ $assignment->created_at }}</td>
									</tr>
									@else --}}
									<tr>
										<td>{{ $assignment->vault->user->branch['name'] }}</td>
										<td>{{ $assignment->vault->user['name'] }} {{ $assignment->vault->user['father_last_name'] }} {{ $assignment->vault->user['mother_last_name'] }}</td>
										<td>${{ number_format($assignment->ammount) }}</td>
										<td>{{ $assignment->concept }}</td>
										<td>{{ $assignment->created_at }}</td>
									</tr>
									{{-- @endif --}}
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
