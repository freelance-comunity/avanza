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
					<th>Promotor</th>
					<th>Fecha</th>
					<th>Folio</th>
					<th>Monto</th>
					<th>Cuotas</th>
					<th>Sucursal</th>				
					<th>Tip de Garantía</th>
					<th>Nombre(s)</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Firma</th>
					<th width="50px">Acción</th>
				</thead>
				<tbody>

					@foreach($credits as $credit)
					<tr>
						<td>{!! $credit->adviser !!}</td>
						<td>{!! $credit->date !!}</td>
						<td>{!! $credit->folio !!}</td>
						<td>{!! $credit->ammount !!}</td>
						
						<td>{!! $credit->dues !!}</td>
						<td>{!! $credit->branch !!}</td>
						<td>{!! $credit->warranty_type !!}</td>
						<td>{!! $credit->firts_name !!}</td>
						<td>{!! $credit->last_name !!}</td>
						<td>{!! $credit->mothers_last_name !!}</td>
						
						<td>{!! $credit->firm !!}</td>
						<td>
							<a href="{!! route('credits.edit', [$credit->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
							<a href="{!! route('credits.delete', [$credit->id]) !!}" onclick="return confirm('Are you sure wants to delete this Credit?')"><i class="glyphicon glyphicon-remove"></i></a>
							<a href="{{ url('solicitud') }}/{{ $credit->id }}"><i class="fa fa-file-pdf-o fa-2x"></i></a>
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