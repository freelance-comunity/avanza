@extends('layouts.app')

@section('main-content')

<div class="container">

	@include('flash::message')

	<div class="row">
		<h1 class="pull-left">Créditos</h1>
	</div>

	<div class="row">
		@if($credits->isEmpty())
		<div class="well text-center">No se encontraron créditos.</div>
		@else
		<div class="table-responsive">
			<table class="table"  id="example">
				<thead>
					<th>No.</th>
					<th>Folio</th>
					<th>Cliente</th>
					<th>Teléfono</th>
					<th>Fecha de Contrato</th>
					<th>$ Monto</th>
					<th>No. Cuotas</th>
					<th>Sucursal</th>				
					<th>Tip de Garantía</th>
					<th width="50px">Acción</th>
				</thead>
				<tbody>
					@foreach($credits as $key=>$credit)
					<tr>
						<td>#{{ ++$key }}</td>
						<td>{!! $credit->folio !!}</td>
						<td>{!! $credit->firts_name !!} {!! $credit->last_name !!} {!! $credit->mothers_last_name !!}</td>
						<td>{!! $credit->phone !!}</td>
						<td>{!! date('F d, Y', strtotime($credit->date)) !!}</td>
						<td>${!! number_format($credit->ammount) !!}</td>
						<td>{!! $credit->dues !!}</td>
						<td>{!! $credit->branch !!}</td>
						<td>{!! $credit->warranty_type !!}</td>
						<td>
							<a href="{{ url('solicitud') }}/{{ $credit->id }}"><i class="fa fa-file-pdf-o fa-2x" data-toggle="tooltip" title="Descargar"></i></a>
							<a href="#"><i class="fa fa-info-circle fa-2x" data-toggle="tooltip" title="Ver detalles"></i></a>
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