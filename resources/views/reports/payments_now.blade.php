@extends('layouts.app') @section('main-content') @section('message_level') Créditos @endsection @section('message_level_here')
Lista de Créditos @endsection
<div class="container">
	@php
  $now = Carbon\Carbon::now()->toDateString();
  $collection_payments = App\Models\IncomePayment::all();
  $payments = $collection_payments->where('date', $now);
  @endphp
	@include('flash::message')
	<div class="row">
		<h1 class="pull-left">Reporte Avance de Cobranza</h1>
	</div>
	<div class="row">
		{{-- @if($payment->isEmpty())
		<div class="well text-center">No hay registros.</div>
		@else --}}
		<div class="table-responsive">
			<table class="table" id="example">
				<thead class="bg-success">
          <th>Folio Crédito</th>
          <th>Importe</th>
          <th>Concepto</th>
          <th>Fecha</th>
          <th>Cliente</th>
          <th>Promotor</th>
				</thead>
				<tbody>
					@foreach ($payments as $pay)
            <tr>
              <td><a href="{!! route('credits.show', [$pay->debt->credit->id]) !!}">{{$pay->debt->credit->folio}}</a></td>
              <td>${{ number_format($pay->ammount,2) }}</td>
              <td>{{ $pay->concept }}</td>
              <td>{{ $pay->created_at }}</td>
              <td>{{$pay->debt->credit->firts_name}} {{$pay->debt->credit->last_name}} {{$pay->debt->credit->mothers_last_name}} </td>
              <td>{{ $pay->debt->credit->adviser}}</td>
            </tr>
					@endforeach
				</tbody>
			</table>
		</div>
		{{-- @endif --}}
	</div>
</div>
@endsection
