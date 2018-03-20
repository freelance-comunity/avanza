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
					<li class="active"><a data-toggle="tab" href="#menu1"><i class="fa fa-cc-jcb"></i> Sueldos</a></li>
				</ul>
				<div class="tab-content">
					<div id="menu1" class="tab-pane fade in active">
						@if($rosters->isEmpty())
						<div class="well text-center">Ho hay registros.</div>
						@else
						<div class="table-responsive">
							<table class="table" id="sueldos">
								<thead class="bg-success">
									
									<th>Nombre Coordonador</th>
									<th>Coordinación</th>
									<th>Sucursal</th>
									<th>Nombre Empleado</th>
									<th>Esquema de Pago</th>
									<th>Periodo de Pago</th>
									<th>Percepciones</th>
									<th>Deducciones</th>
									<th>Neto a Pagar</th>
									{{-- <th>Descargar</th> --}}
									<th>Fecha</th>
								</thead>
								<tbody>
									@foreach($rosters as $roster)
									<tr>
										
										<td>{!! $roster->coordinating_name !!}</td>
										<td>{!! $roster->coordination !!}</td>
										<td>{!! $roster->user->branch['name'] !!}</td>
										<td>{!! $roster->name_employee !!}</td>
										<td>{!! $roster->payment_scheme !!}</td>
										<td>{!! $roster->payment_period !!}</td>
										<td>${!! number_format($roster->perceptions,2) !!}</td>
										<td>${!! number_format($roster->deductions,2) !!}</td>
										<td>${!! number_format($roster->grandchild_pay,2) !!}</td>
										{{-- <td><a href="{{ url('roster') }}/{{ $roster->id }}"><i class="fa  fa-file-pdf-o fa-2x" data-toggle="tooltip" title="Ver Nomina"></i></a></td> --}}
										<td>{!! $roster->date !!}</td>
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
