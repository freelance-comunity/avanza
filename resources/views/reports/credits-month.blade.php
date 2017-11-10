@extends('layouts.app') @section('main-content') @section('message_level') Créditos @endsection @section('message_level_here')
Lista de Créditos @endsection
<div class="container">
	@php $month = \Carbon\Carbon::now()->month; $credits_this_month = App\Models\Credit::where( DB::raw('MONTH(created_at)'), '=', date($month) )->get(); @endphp @include('flash::message')
	<div class="row">
		<h1 class="pull-left">Total Ministrado en el Mes ${{ number_format($credits_this_month->sum('ammount'),2) }}</h1>
	</div>
	<div class="row">
		@if($credits_this_month->isEmpty())
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
					<th>ESTATUS</th>
				</thead>
				<tbody>
					@foreach ($credits_this_month as $credit) @php $debt = $credit->debt; $filtered_payments = $debt->payments; $late_payments = $filtered_payments->where('status','Vencido');
					@endphp
					<tr>
						<td class="service"><a href="{!! route('credits.show', [$credit->id]) !!}">{{ $credit->folio }}</a></td>
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
						<td>{{$credit->debt->status}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@endif
	</div>
</div>
@endsection
