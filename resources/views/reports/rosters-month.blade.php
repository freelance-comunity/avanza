@extends('layouts.app') @section('main-content') @section('message_level') Sueldos @endsection @section('message_level_here')
Lista de Sueldos @endsection
<div class="container">
	@php $month = \Carbon\Carbon::now()->month; $rosters_this_month = App\Models\Roster::where( DB::raw('MONTH(created_at)'),
	'=', date($month) )->get(); @endphp @include('flash::message')
	<div class="row">
		<h1 class="pull-left">Reporte de Sueldos Mensual</h1>
	</div>
	<div class="row">
		@if($rosters_this_month->isEmpty())
		<div class="well text-center">No hay registros.</div>
		@else
		<div class="table-responsive">
			<table class="table" id="example">
				<thead class="bg-success">
					<th>Fecha</th>
					<th>Nombre Coordinador</th>
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
					@foreach($rosters_this_month as $roster)
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
						<td>
							<a href="{{ url('roster') }}/{{ $roster->id }}">
								<i class="fa  fa-file-pdf-o fa-2x" data-toggle="tooltip" title="Ver Nomina"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@endif
	</div>
</div>
@endsection