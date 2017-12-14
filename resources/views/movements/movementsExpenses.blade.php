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
					<li class="active"><a data-toggle="tab" href="#menu1"><i class="fa fa-credit-card"></i> Gastos</a></li>
				</ul>
				<div class="tab-content">
					<div id="menu1" class="tab-pane fade in active">
						
						@if($expenses->isEmpty())
						<div class="well text-center">Ho hay registros.</div>
						@else
						<div class="table-responsive">
							<table class="table" id="expensees">
								<thead class="bg-success">
									<th>Región</th>
									<th>Sucursal</th>
									<th>Usuario</th>
									<th>Monto</th>
									<th>Tipo de Gasto</th>
									<th>Concepto</th>
									<th>Fecha/Hora gasto</th>
								</thead>
								<tbody>
									@foreach($expenses as $expense)
									<tr>
										<td>{{ $expense->vault->user->region['name'] }}</td>
										<td>{{ $expense->vault->user->branch['name'] }}</td>
										<td>{{ $expense->vault->user['name'] }} {{ $expense->vault->user['father_last_name'] }} {{ $expense->vault->user['mother_last_name'] }}</td>
										<td>${{ number_format($expense->ammount) }}</td>
										@if ($expense->type)
										<th>{{$expense->type}}</th>
										@else
										<th>Sin especificar</th>
										@endif
										<td>{{ $expense->description }}</td>
										<td>{{ $expense->created_at }}</td>
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
