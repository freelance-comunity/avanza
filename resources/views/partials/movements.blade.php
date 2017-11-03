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
			<div class="box-header with-border">
				<h3 class="box-title">Movimientos {{-- {{ $region_allocation->id }} --}}</h3>
			</div>  
			<div class="box-body">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#menu1"><i class="fa fa-archive"></i>Saldo en caja</a></li>
					<li><a data-toggle="tab" href="#menu2"><i class="fa fa-reply"></i> Saldo inicial</a></li>
					<li><a data-toggle="tab" href="#menu3"><i class="fa fa-money"></i> Asignación de efectivo</a></li>
					<li><a data-toggle="tab" href="#menu4"><i class="fa fa-money"></i> Recuperación</a></li>
					<li><a data-toggle="tab" href="#menu5"><i class="fa fa-money"></i> Recuperación Acces</a></li>
					<li><a data-toggle="tab" href="#menu6">Colocación</a></li>
					<li><a data-toggle="tab" href="#menu7">Gastos</a></li>
					<li><a data-toggle="tab" href="#menu9">Sueldos</a></li>
					<li><a data-toggle="tab" href="#menu8">Cortes de caja</a></li>
				</ul>
				<div class="tab-content">
					<div id="menu1" class="tab-pane fade in active">
						<h3>Registro saldo en cajas</h3>
						@if($vaults->isEmpty())
						<div class="well text-center">Ho hay registros.</div>
						@else
						<div class="table-responsive">
							<table class="table" id="vaul">
								<thead class="bg-success">
									<th>Sucursal</th>
									<th>Usuario</th>
									<th>Monto</th>
									<th>Fecha/Hora ultima actualización</th>
								</thead>
								<tbody>
									@foreach($empleados as $emple)								
									<tr>
										<td>{{ $emple->branch['name'] }}</td>
										<td>{{ $emple['name'] }} {{ $emple['father_last_name'] }} {{ $emple['mother_last_name'] }}</td>
										<td>
											${{ number_format($emple->vault->ammount,2) }}
										</td>
										<td>{{ $emple->vault->updated_at->toDateTimeString() }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						@endif
					</div>
					<div id="menu2" class="tab-pane fade">
						<h3>Registro saldo inicial</h3>
						@if($starts->isEmpty())
						<div class="well text-center">Ho hay registros.</div>
						@else
						<div class="table-responsive">
							<table class="table" id="start">
								<thead class="bg-success">
									<th>Sucursal</th>
									<th>Usuario</th>
									<th>Monto</th>
									<th>Concepto</th>
									<th>Fecha/Hora asignación</th>
								</thead>
								<tbody>
									@foreach($starts as $start)
									<tr>
										<td>{{ $start->vault->user->branch['name'] }}</td>
										<td>{{ $start->vault->user['name'] }} {{ $start->vault->user['father_last_name'] }} {{ $start->vault->user['mother_last_name'] }}</td>
										<td>${{ number_format($start->ammount) }}</td>
										<td>{{ $start->concept }}</td>
										<td>{{ $start->vault->user->region['id'] }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						@endif
					</div>
					<div id="menu3" class="tab-pane fade">
						<h3>Registro asignación efectivo</h3>
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
					<div id="menu4" class="tab-pane fade">
						<h3>Recuperación</h3>
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
					<div id="menu5" class="tab-pane fade">
						<h3>Recuperación Acces</h3>
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
					<div id="menu6" class="tab-pane fade">
						<h3>Colocación</h3>
						@if($credits->isEmpty())
						<div class="well text-center">Ho hay registros.</div>
						@else
						<div class="table-responsive">
							<table class="table" id="creditos">
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
										<td>${{ number_format($credit->ammount) }}</td>
										<td>{{ $credit->concept }}</td>
										<td>{{ $credit->credit['firts_name'] }} {{ $credit->credit['last_name'] }} {{ $credit->credit['mothers_last_name'] }}</td>
										<td>{{ $credit->credit['folio'] }}</td>
										<td>{{ $credit->created_at }}</td>
									</tr>
									{{-- @endif --}}
									@endforeach
								</tbody>
							</table>
						</div>
						@endif
					</div>
					<div id="menu7" class="tab-pane fade">
						<h3>Colocación</h3>
						@if($expenses->isEmpty())
						<div class="well text-center">Ho hay registros.</div>
						@else
						<div class="table-responsive">
							<table class="table" id="expensees">
								<thead class="bg-success">
									<th>Sucursal</th>
									<th>Usuario</th>
									<th>Monto</th>
									<th>Concepto</th>
									<th>Fecha/Hora asignación</th>
								</thead>
								<tbody>
									@foreach($expenses as $expense)
									<tr>
										<td>{{ $expense->vault->user->branch['name'] }}</td>
										<td>{{ $expense->vault->user['name'] }} {{ $expense->vault->user['father_last_name'] }} {{ $expense->vault->user['mother_last_name'] }}</td>
										<td>${{ number_format($expense->ammount) }}</td>
										<td>{{ $expense->description }}</td>
										<td>{{ $expense->created_at }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						@endif
					</div>
					<div id="menu8" class="tab-pane fade">
						<h3>Cortes de caja</h3>
						@if($cuts->isEmpty())
						<div class="well text-center">Ho hay registros.</div>
						@else
						<div class="table-responsive">
							<table class="table" id="corte">
								<thead class="bg-success">
									<th>Sucursal</th>
									<th>Usuario</th>
									<th>Monto</th>
									<th>Fecha/Hora corte</th>
								</thead>
								<tbody>
									@foreach($cuts as $cut)
									<tr>
										<td>{{ $cut->user->branch['name'] }}</td>
										<td>{{ $cut->user['name'] }} {{ $cut->user['father_last_name'] }} {{ $cut->user['mother_last_name'] }}</td>
										<td>${{ number_format($cut->amount) }}</td>
										<td>{{ $cut->created_at }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						@endif
					</div>
					<div id="menu9" class="tab-pane fade">
						<h3>Cortes de caja</h3>
						@if($cuts->isEmpty())
						<div class="well text-center">Ho hay registros.</div>
						@else
						<div class="table-responsive">
							<table class="table" id="sueldos">
								<thead class="bg-success">
									<th>Fecha</th>
									<th>Nombre Coordonador</th>
									<th>Coordinación</th>
									<th>Sucursal</th>
									<th>Nombre Empleado</th>
									<th>Esquema de Pago</th>
									<th>Periodo de Pago</th>
									<th>Percepciones</th>
									<th>Deducciones</th>
									<th>Neto a Pagar</th>
									<th>Descargar</th>
								</thead>
								<tbody>
									@foreach($rosters as $roster)
									<tr>
										<td>{!! $roster->date !!}</td>
										<td>{!! $roster->coordinating_name !!}</td>
										<td>{!! $roster->coordination !!}</td>
										<td>{!! $roster->branch_office !!}</td>
										<td>{!! $roster->name_employee !!}</td>
										<td>{!! $roster->payment_scheme !!}</td>
										<td>{!! $roster->payment_period !!}</td>
										<td>${!! number_format($roster->perceptions,2) !!}</td>
										<td>${!! number_format($roster->deductions,2) !!}</td>
										<td>${!! number_format($roster->grandchild_pay,2) !!}</td>
										<td><a href="{{ url('roster') }}/{{ $roster->id }}"><i class="fa  fa-file-pdf-o fa-2x" data-toggle="tooltip" title="Ver Nomina"></i></a></td>
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
