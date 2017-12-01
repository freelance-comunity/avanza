@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection
@section('main-content')
@section('message_level')
Reportes
@endsection
@section('message_level_here')
Pagos
@endsection
<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Historial de pagos Región Norte</h3>
			</div>  
			<div class="box-body">
				@if($payments->isEmpty())
				<div class="well text-center">Ho hay registros.</div>
				@else
				<div class="table-responsive">
					<table class="table" id="recovery">
						<thead class="bg-success">
							<th>Región</th>
							<th>Sucursal</th>
							<th>Promotor</th>
							{{-- <th>Concepto</th> --}}
							<th>Cliente</th>
							<th>Folio crédito</th>
							<th>Monto</th>
							<th>Capital</th>
							<th>Intereses</th>
							<th>Moratorio</th>
							<th>Fecha/Hora asignación</th>
						{{-- 	<th>status</th> --}}
						</thead>
						<tbody>
							@foreach($payments as $payment)
							@if ($payment->status == 'Pagado' OR $payment->status == 'Parcial')
								<tr>
								<td>{{$payment->region['name']}}</td>
								<td>{{$payment->branch['name']}}</td>
								<td>{{$payment->debt->credit->user['name']}} {{$payment->debt->credit->user['father_last_name']}}									{{$payment->debt->credit->user['mother_last_name']}}</td>
								<td>{{$payment->debt->credit->firts_name}} {{$payment->debt->credit->last_name}} {{$payment->debt->credit->mothers_last_name}}</td>
								<td>{{$payment->debt->credit->folio}}</td>
								<td class="bg-green">{{$payment->payment}}</td>
								<td class="bg-primary">{{$payment->capital}}</td>
								<td class="bg-yellow">{{$payment->interest}}</td>
								<td class="bg-red">{{$payment->moratorium}}</td>
								<td>{{$payment->updated_at}}</td>
								{{-- <td>{{$payment->status}}</td> --}}
								{{-- <td>{{ $recovery->vault->user->branch->region['name'] }}</td>
								<td>{{ $recovery->vault->user->branch['name'] }}</td>
								<td>{{ $recovery->vault->user['name'] }} {{ $recovery->vault->user['father_last_name'] }} {{ $recovery->vault->user['mother_last_name'] }}</td>
								<td>{{ $recovery->concept }}</td>
								<td>{{ $recovery->debt->credit['firts_name'] }} {{ $recovery->debt->credit['last_name'] }} {{ $recovery->debt->credit['mothers_last_name'] }}</td>
								<td>{{ $recovery->debt->credit['folio'] }}</td>
								<td class="bg-green">${{ number_format($recovery->ammount) }}</td>
								<td class="bg-primary">${{ number_format($recovery->payment['capital']) }}</td>
								<td class="bg-yellow">${{ number_format($recovery->payment['interest']) }}</td>
								<td class="bg-red">${{ number_format($recovery->payment['moratorium']) }}</td>
								<td>{{ $recovery->created_at }}</td> --}}
							</tr>
							@endif
							
							@endforeach
						</tbody>
					</table>
				</div>
				@endif
			</div>
		</div>
	</div>
	@endsection
