@extends('layouts.app') @section('main-content') @section('message_level') Clientes @endsection @section('message_level_here')
Lista de Clientes @endsection
<div class="container">
	@php $clients = App\Models\Client::orderBy('folio', 'desc')->get(); @endphp @include('flash::message')
	<div class="row">
		<h1 class="pull-left">Reporte de Clientes</h1>
	</div>
	<div class="row">
		@if($clients->isEmpty())
		<div class="well text-center">No hay registros.</div>
		@else
		<div class="table-responsive">
			<table class="table" id="example">
				<thead class="bg-success">
					<th class="service">FOLIO</th>
					<th class="service">NOMBRE</th>
					<th class="service">APE. PATERNO</th>
					<th class="service">APE. MATERNO</th>
					<th class="service">TELÉFONO</th>
					<th class="service">REGISTRO</th>
					<th class="service">TOTAL
						<br> CRÉDITOS</th>
					<th class="service">TOTAL CRÉDITOS
						<br> PAGADOS</th>
					<th class="service">SUCURSAL</th>
				</thead>
				<tbody>
					@foreach ($clients as $client) @php $credits = $client->credits; $paid_out = $credits->where('status', 'Pagado'); @endphp
					<tr>
						<td class="service">{{ $client->folio }}</td>
						<td class="service">{{ $client->firts_name }}</td>
						<td class="service">{{ $client->last_name }}</td>
						<td class="service">{{ $client->mothers_last_name }}</td>
						<td class="service">{{ $client->phone }}</td>
						<td class="service">{{ $client->created_at->toFormattedDateString() }}</td>
						<td class="service">{{ $credits->count() }}</td>
						<td class="service">{{ $paid_out->count() }}</td>
						<td class="service">{{ $client->branch['name'] }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@endif
	</div>
</div>
@endsection