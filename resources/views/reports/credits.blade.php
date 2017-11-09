@extends('layouts.app') @section('main-content') @section('message_level') Créditos @endsection @section('message_level_here')
Lista de Créditos @endsection
<div class="container">
	@php $credits_collection = App\Models\Credit::all(); $credits = $credits_collection->where('status', 'MINISTRADO'); @endphp
	@include('flash::message')
	<div class="row">
		<h1 class="pull-left">Reporte de Créditos</h1>
	</div>
	<div class="row">
		@if($credits->isEmpty())
		<div class="well text-center">No hay registros.</div>
		@else
		<div class="table-responsive">
			<table class="table" id="example">
				<thead class="bg-success">
					<th class="service">FOLIO</th>
					<th class="service">SUCURSAL</th>
					<th class="service">REGISTRO</th>
					<th class="service">SALDO
						<br> VIGENTE</th>
					<th class="service">SALDO
						<br> VENCIDO</th>
					<th class="service">SALDO
						<br> TOTAL</th>
					<th class="service">NOMBRE</th>
					<th class="service">APELLIDOS</th>
					<th class="service">PROMOTOR</th>
					<th class="service">FRECUENCIA</th>
					<th class="service">MONTO</th>
				</thead>
				<tbody>
					@foreach ($credits as $credit) @php $debt = $credit->debt; $filtered_payments = $debt->payments; $late_payments
					= $filtered_payments->where('status','Vencido'); @endphp
					<tr>
						<td class="service">{{ $credit->folio }}</td>
						<td class="service">{{ $credit->branch }}</td>
						<td class="service">{{ $credit->created_at->toFormattedDateString() }}</td>
						<td class="service">{{ number_format($debt->ammount - $late_payments->sum('ammount'),2) }}</td>
						<td class="service">{{ number_format($late_payments->sum('ammount'),2) }}</td>
						<td class="service">{{ number_format($debt->ammount,2) }}</td>
						<td class="service">{{ $credit->firts_name }}</td>
						<td class="service">{{ $credit->last_name }} {{ $credit->mothers_last_name }}</td>
						<td class="service">{{ $credit->adviser }}</td>
						<td class="service">{{ $credit->periodicity }}</td>
						<td class="service">${{ number_format($credit->ammount,2) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@endif
	</div>
</div>
@endsection