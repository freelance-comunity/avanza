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
					<li class="active"><a data-toggle="tab" href="#menu1"><i class="fa fa-archive"></i>Saldo en caja</a></li>
				</ul>
				<div class="tab-content">
					<div id="menu1" class="tab-pane fade in active">
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
				
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
