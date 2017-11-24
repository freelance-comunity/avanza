@extends('layouts.app')

@section('main-content')
@section('message_level')
Créditos
@endsection
@section('message_level_here')
Lista de créditos
@endsection
{{-- Credits all --}}
<div class="container">
	<div class="row">
		<h1 class="pull-left">Créditos</h1>
	</div>

	<div class="row">
		@if($credits->isEmpty())
		<div class="well text-center">No se encontraron créditos.</div>
		@else
		<div class="table-responsive">
			@if(Auth::user()->hasRole(['administrador', 'director-general', 'coordinador-regional', 'coordinador-sucursal']))
			<table class="table"  id="example">
				@else
				<table class="table"  id="pagos_promotor">
					@endif
					<thead class="bg-primary">
						<th>Folio</th>
						<th>Cliente</th>
						<th>Fecha de Contrato</th>
						<th>Sucursal</th>
						<th>$ Monto</th>
						<th>No. Cuotas</th>
						<th>Estatus</th>
						<th width="50px">Detalle crédito</th>
					</thead>
					<tbody>
						@foreach($credits as $key=>$credit)
						@php
						$debt = $credit->debt;
						$late_payments = App\Models\Payment::where('debt_id', $debt->id)->where('status', 'Vencido')->get();
						$late_balance = $late_payments->sum('balance');
						@endphp
						@if ($credit->debt->status == 'VIGENTE')
						<tr>
							<td>{!! $credit->folio !!}</td>
							<td>{!! $credit->firts_name !!} {!! $credit->last_name !!} {!! $credit->mothers_last_name !!}</td>
							<td>{!! strtoupper($credit->date->format('d F Y')) !!}</td>
							<td>{!! $credit->branch !!}</td>
							<td>${!! number_format($credit->ammount, 2) !!}</td>
							<td>{!! $credit->dues !!}</td>
							<td>{{ $credit->debt['status'] }}</td>
							<td>
								{{-- <a href="{{ url('account') }}/{{ $credit->id }}"><i class="fa fa-align-left fa-2x" data-toggle="tooltip" title="Ver Estado de Cuenta"></i></a>
								<a href="{{ url('solicitud') }}/{{ $credit->id }}"><i class="fa  fa-file-pdf-o fa-2x" data-toggle="tooltip" title="Ver Solicitud"></i></a> --}}
								<a href="{!! route('credits.show', [$credit->id]) !!}"><i class="fa fa-eye fa-2x" data-toggle="tooltip" title="Ver Detalles" ></i></a>
							</td>
						</tr>
						@endif
						@endforeach
					</tbody>
				</table>
			</div>
			@endif
		</div>
	</div>
	@endsection
