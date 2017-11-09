@extends('layouts.app') @section('main-content') @section('message_level') Créditos @endsection @section('message_level_here')
Lista de Créditos @endsection
<div class="container">
	@php 
	$now = Carbon\Carbon::now()->toDateString(); 
	$payments = DB::table('payments')->where('date', '=', $now)->get(); @endphp
	@include('flash::message')
	<div class="row">
		<h1 class="pull-left">Reporte de Pagos</h1>
	</div>
	<div class="row">
		{{-- @if($payment->isEmpty())
		<div class="well text-center">No hay registros.</div>
		@else --}}
		<div class="table-responsive">
			<table class="table" id="example">
				<thead class="bg-success">
					<th style="width: 15px;">No. Cuota</th>
					<th>Fecha</th>
					<th>Crédito</th>
					<th>Monto</th>
					<th>Capital</th>
					<th>Interés</th>
					<th>Total</th>
					<th>Pagado</th>
					<th>Estatus</th>
				</thead>
				<tbody>
					@foreach ($payments as $pay)
					<tr>
						<td>{{ $pay->number }}</td>
						<td>{{$pay->date}}</td>
						<td>$ {{ number_format($pay->ammount, 2) }}</td>
						<td>$ {{ number_format($pay->capital, 2) }}</td>
						<td>$ {{ number_format($pay->interest, 2) }}</td>
						<td>$ {{ number_format($pay->total)}}</td>
						<td class="bg-green">$ {{ number_format($pay->payment)}}</td>
						<td>{{ $pay->status}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		{{-- @endif --}}
	</div>
</div>
@endsection