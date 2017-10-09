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
	@php
	$vaults = App\Models\Vault::all()->sortByDesc('updated_at');;
	$starts_collection = App\Models\Income::all();
	$starts = $starts_collection->where('concept', 'Saldo Inicial')->sortByDesc('created_at'); 
	$assignments = $starts_collection->where('concept', 'Asignación de efectivo')->sortByDesc('created_at'); 
	$recoverys = App\Models\IncomePayment::all()->sortByDesc('created_at'); 
	$accesses  = App\Models\PurseAccess::all()->sortByDesc('created_at'); 
	$credits   = App\Models\ExpenditureCredit::all()->sortByDesc('created_at'); 
	$expenses  = App\Models\Expenditure::all()->sortByDesc('created_at');
	$cuts      = App\Models\BoxCut::all()->sortByDesc('created_at');
	@endphp
	<div class="col-md-12">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Movimientos</h3>
			</div>  
			<div class="box-body">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#menu1">Saldo en caja</a></li>
					<li><a data-toggle="tab" href="#menu2">Saldo inicial</a></li>
					<li><a data-toggle="tab" href="#menu3">Asignación de efectivo</a></li>
					<li><a data-toggle="tab" href="#menu4">Recuperación</a></li>
					<li><a data-toggle="tab" href="#menu5">Recuperación Acces</a></li>
					<li><a data-toggle="tab" href="#menu6">Colocación</a></li>
					<li><a data-toggle="tab" href="#menu7">Gastos</a></li>
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
								<thead class="thead-inverse">
									<th>Sucursal</th>
									<th>Usuario</th>
									<th>Monto</th>
									<th>Fecha/Hora ultima actualización</th>
								</thead>
								<tbody>
									@foreach($vaults as $vault)
									<tr>
										<td>{{ $vault->user->branch['name'] }}</td>
										<td>{{ $vault->user['name'] }} {{ $vault->user['father_last_name'] }} {{ $vault->user['mother_last_name'] }}</td>
										<td>
											${{ number_format($vault->ammount,2) }}
										</td>
										<td>{{ $vault->updated_at->toDateTimeString() }}</td>
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
								<thead class="thead-inverse">
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
										<td>{{ $start->created_at }}</td>
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
								<thead class="thead-inverse">
									<th>Sucursal</th>
									<th>Usuario</th>
									<th>Monto</th>
									<th>Concepto</th>
									<th>Fecha/Hora asignación</th>
								</thead>
								<tbody>
									@foreach($assignments as $assignment)
									<tr>
										<td>{{ $assignment->vault->user->branch['name'] }}</td>
										<td>{{ $assignment->vault->user['name'] }} {{ $assignment->vault->user['father_last_name'] }} {{ $assignment->vault->user['mother_last_name'] }}</td>
										<td>${{ number_format($assignment->ammount) }}</td>
										<td>{{ $assignment->concept }}</td>
										<td>{{ $assignment->created_at }}</td>
									</tr>
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
								<thead class="thead-inverse">
									<th>Sucursal</th>
									<th>Usuario</th>
									<th>Monto</th>
									<th>Concepto</th>
									<th>Fecha/Hora asignación</th>
								</thead>
								<tbody>
									@foreach($recoverys as $recovery)
									<tr>
										<td>{{ $recovery->vault->user->branch['name'] }}</td>
										<td>{{ $recovery->vault->user['name'] }} {{ $recovery->vault->user['father_last_name'] }} {{ $recovery->vault->user['mother_last_name'] }}</td>
										<td>${{ number_format($recovery->ammount) }}</td>
										<td>{{ $recovery->concept }}</td>
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
								<thead class="thead-inverse">
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
								<thead class="thead-inverse">
									<th>Sucursal</th>
									<th>Usuario</th>
									<th>Monto</th>
									<th>Concepto</th>
									<th>Fecha/Hora asignación</th>
								</thead>
								<tbody>
									@foreach($credits as $credit)
									<tr>
										<td>{{ $credit->vault->user->branch['name'] }}</td>
										<td>{{ $credit->vault->user['name'] }} {{ $credit->vault->user['father_last_name'] }} {{ $credit->vault->user['mother_last_name'] }}</td>
										<td>${{ number_format($credit->ammount) }}</td>
										<td>{{ $credit->concept }}</td>
										<td>{{ $credit->created_at }}</td>
									</tr>
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
								<thead class="thead-inverse">
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
								<thead class="thead-inverse">
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
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
