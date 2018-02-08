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
				<table class="table"  id="carteraVencida">
					@endif
					<thead class="bg-primary">
						<th>ID</th>
						<th>Folio</th>
						<th>Región</th>
						<th>Estado</th>
						<th>Municipio</th>
						{{-- <th>Teléfono</th> --}}
						<th>Tipo de Crédito</th>
						<th>Promotor</th>
						<th>Cliente</th>
						<th>Fecha de Contrato</th>
						<th>Sucursal</th>
						<th>$ Monto</th>
						<th>Tasa</th>
						<th># Cuotas</th>
						<th>Cuotas pagadas</th>
						<th>Cuotas parciales</th>
						<th>Cuotas vencidas</th>
						<th>Total Pagado</th>
					{{-- 	<th>Capital Cobrado</th>
						<th>Interés Cobrado</th>
						<th>Mora Cobrado</th> --}}
						<th>Total Vencido</th>
						<th>Capital Vencido</th>
						<th>Intereses vencidos</th>
						<th>Mora</th>
						{{-- <th>Total</th> --}}
						<th>Total Vigente</th>
						<th>Total Capital Vigente</th>
						<th>Total Interes Vigente</th>
						<th>Estatus</th>
					</thead>
					<tbody>
						@foreach($credits as $key=>$credit)
						@php
						$debt = $credit->debt;
						$late_payments = App\Models\Payment::where('debt_id', $debt->id)->where('status', 'Vencido')->get();
						$current_payments = App\Models\Payment::where('debt_id', $debt->id)->where('status', 'Pagado')->get();
						$partial_payments = App\Models\Payment::where('debt_id', $debt->id)->where('status', 'Parcial')->get();
						$pending_payments = App\Models\Payment::where('debt_id', $debt->id)->where('status', 'Pendiente')->get();

						$totales = App\Models\Payment::where('debt_id',$debt->id);
						$total = $current_payments->sum('payment') + $partial_payments->sum('payment');

						//$late_interest = $late_payments->sum('interest');

						$late_interest = $late_payments->sum('interest');
						$late_capital = $late_payments->sum('capital');
						$late_moratorium = $late_payments->sum('moratorium');
						$late_total = $late_interest + $late_capital + $late_moratorium;

						$pending_interest = $pending_payments->sum('interest');
						$pending_capital = $pending_payments->sum('capital');
						$pending_total = $pending_interest + $pending_capital;

						$client = $credit->client;
						@endphp
						<tr>
							<td>{!!$client->folio!!}</td>
							<td><a href="{!! route('credits.show', [$credit->id]) !!}">{!! $credit->folio !!}</a></td>
							<td>{!! $credit->region['name'] !!}</td>
							<td>{{$client->location->state}}</td>
							<td>{{$client->location->municipality}}</td>
							{{-- 	<td>{{$credit->phone}}</td> --}}
							@if ($credit->periodicity == "TRADICIONAL" OR $credit->periodicity == "DIARIO4" OR $credit->periodicity == "25" OR  $credit->periodicity == "SEMANAL")
							<td class="service">MIGRADOS</td>
							@else
							<td class="service">{{ $credit->periodicity }}</td>
							@endif
							<td>{!! $credit->user['name'] !!} {!! $credit->user['father_last_name'] !!} {!! $credit->user['mother_last_name'] !!}</td>
							<td>{!! $credit->firts_name !!} {!! $credit->last_name !!} {!! $credit->mothers_last_name !!}</td>
							<td>{!! strtoupper($credit->date->format('d F Y')) !!}</td>
							<td>{!! $credit->branch !!}</td>
							<td>${!! number_format($credit->ammount, 2) !!}</td>
							<td>{!! $credit->interest_rate!!}%</td>
							<td>{!!$credit->dues!!}</td>
							<td>{!! $current_payments->count() !!}</td>
							<td>{!! $partial_payments->count() !!}</td>
							<td>{!! $late_payments->count() !!}</td>
							<th class="info">${{ number_format($totales->sum('payment'),2) }}</th>

							{{-- <th>C</th>
							<th>M</th>
							<th>t</th> --}}
							@if ($late_total==0)
							<td class="success">${!! number_format($late_total, 2) !!}</td>
							@elseif($late_total > 0)
							<td class="danger">${!! number_format($late_total, 2) !!}</td>
							@endif
							<td class="bg-primary">${{ number_format($late_capital,2) }}</td>
							<td class="bg-primary">${{ number_format($late_interest,2) }}</td>
							<td class="bg-primary">${{ number_format($late_moratorium,2) }}</td>
							{{-- <td class="warning">${{ number_format($credit->debt['ammount'] + $late_total,2) }}</td> --}}
							<td class="warning">${!! number_format($pending_total,2) !!}</td>
							<td class="bg-primary">${!! number_format($pending_capital,2) !!}</td>
							<td class="bg-primary">${!! number_format($pending_interest,2) !!}</td>
							<td>{{ $credit->debt['status'] }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			@endif
		</div>
	</div>
	@endsection
