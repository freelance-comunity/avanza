@extends('layouts.app') @section('main-content') @section('message_level') Créditos @endsection @section('message_level_here')
Lista de Créditos @endsection
<div class="container">
	@php $filtered_date_now_credits = App\Models\Credit::where(function ($query) { $query->whereRaw('DATE(created_at) = CURRENT_DATE');
	})->get(); @endphp @include('flash::message')
	<div class="row">
		<h1 class="pull-left">Total Ministrado en el Día ${{ number_format($filtered_date_now_credits->sum('ammount'),2) }}</h1>
	</div>
	<div class="row">
		@if($filtered_date_now_credits->isEmpty())
		<div class="well text-center">No hay registros.</div>
		@else
		<div class="table-responsive">
			<table class="table" id="example">
				<thead class="bg-success">
					<th class="service">FOLIO</th>
					<th class="service">SUCURSAL</th>
					<th class="service">FECHA <br> HORA</th>
					<th class="service">MONTO</th>
					<th class="service">NOMBRE</th>
					<th class="service">APELLIDOS</th>
					<th class="service">PROMOTOR</th>
					<th class="service">FRECUENCIA</th>
				</thead>
				<tbody>
					@foreach ($filtered_date_now_credits as $credit) @php $debt = $credit->debt; $filtered_payments = $debt->payments; $late_payments
					= $filtered_payments->where('status','Vencido'); @endphp
					<tr>
						<td class="service">{{ $credit->folio }}</td>
						<td class="service">{{ $credit->branch }}</td>
                        <td>{{$credit->created_at}}</td>
						<td class="service">${{ number_format($credit->ammount,2) }}</td>
						<td class="service">{{ $credit->firts_name }}</td>
						<td class="service">{{ $credit->last_name }} {{ $credit->mothers_last_name }}</td>
						<td class="service">{{ $credit->adviser }}</td>
						<td class="service">{{ $credit->periodicity }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@endif
	</div>
</div>
@endsection