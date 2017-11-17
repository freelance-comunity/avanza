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
					<li class="active"><a data-toggle="tab" href="#menu1"><i class="fa fa-archive"></i> Colocación</a></li>
				</ul>
				<div class="tab-content">
					<div id="menu1" class="tab-pane fade in active">
					
						@if($credits->isEmpty())
						<div class="well text-center">Ho hay registros.</div>
						@else
						<div class="table-responsive">
							<table class="table" id="creditos">
								<thead class="bg-success">
									<th>Sucursal</th>
									<th>Usuario</th>
									<th>Tipo de Crédito</th>
									<th>Monto</th>
									<th>Concepto</th>
									<th>Cliente</th>
									<th>Folio crédito</th>
									<th>Fecha/Hora asignación</th>
								</thead>
								<tbody>
									@foreach($credits as $credit)
									{{-- @if ($credit->credit['folio'] != $region_allocation->id)
									<tr style="display: none;">
										<td>{{ $credit->vault->user->branch['name'] }}</td>
										<td>{{ $credit->vault->user['name'] }} {{ $credit->vault->user['father_last_name'] }} {{ $credit->vault->user['mother_last_name'] }}</td>
										<td>${{ number_format($credit->ammount) }}</td>
										<td>{{ $credit->concept }}</td>
										<td>{{ $credit->credit['firts_name'] }} {{ $credit->credit['last_name'] }} {{ $credit->credit['mothers_last_name'] }}</td>
										<td>{{ $credit->credit['folio'] }}</td>
										<td>{{ $credit->created_at }}</td>
									</tr>
									@else --}}
									<tr>
										<td>{{ $credit->vault->user->branch['name'] }}</td>
										<td>{{ $credit->vault->user['name'] }} {{ $credit->vault->user['father_last_name'] }} {{ $credit->vault->user['mother_last_name'] }}</td>
										@if ($credit->credit['periodicity'] == "TRADICIONAL" OR  $credit->credit['periodicity'] == "DIARIO4" OR $credit->credit['periodicity'] == "DIARIO25" OR $credit->credit['periodicity'] == "SEMANAL")
											<td>MIGRADOS</td>
										@else
										<td>{{ $credit->credit['periodicity'] }}</td>
										@endif
										<td>${{ number_format($credit->ammount) }}</td>
										<td>{{ $credit->concept }}</td>
										<td>{{ $credit->credit['firts_name'] }} {{ $credit->credit['last_name'] }} {{ $credit->credit['mothers_last_name'] }}</td>
										<td><a href="{!! route('credits.show', [$credit->id]) !!}">{{ $credit->credit['folio'] }}</a></td>
										<td>{{ $credit->created_at }}</td>
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
