@extends('layouts.app')
@section('main-content')
<div class="container">
	<div class="row">
		<!-- ./col -->
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-header with-border">
					<i class="fa fa-user"></i>
					<h3 class="box-title"><strong>{{$credit->firts_name}} {{$credit->last_name}} {{$credit->mothers_last_name}}</strong></h3>
				</div>
				<!-- /.box-header -->
				@php
				$debt = $credit->debt;
				$late_payments = App\Models\Payment::where('debt_id', $debt->id)->where('status', 'Atrasado')->get();
				$late_interest = $late_payments->sum('interest');
				$late_capital = $late_payments->sum('capital');
				$late_moratorium = $late_payments->sum('moratorium');
				$late_total = $late_interest + $late_capital + $late_moratorium;
				@endphp
				<div class="box-body">
					<div class="col-md-4">
						<p class="lead"><strong>TIPO DE PRESTAMO:</strong> {{$credit->periodicity}}</p>
						<p class="lead"><strong>MONTO:</strong>$ {{ number_format($credit->ammount, 2) }}</p>
						<p class="lead"><strong>INTERÉS:</strong> {{$credit->interest_rate*100}}%</p>
						<p class="lead"><strong>CUOTAS:</strong> {{$credit->dues}}</p>
						<p class="lead"><strong>FECHA DE CONTRATO:</strong> {{strtoupper($credit->date->format('l, d F Y'))}}</p>
						<hr>
					</div>
					<div class="col-md-4">
						<p class="lead"><strong>PROMOTOR:</strong> {{$credit->adviser}}</p>
						<p class="lead"><strong>FOLIO:</strong> {{$credit->folio}}</p>
						<p class="lead"><strong>SUCURSAL:</strong> {{$credit->branch}}</p>
						<p class="lead"><strong>GARANTÍA:</strong> {{$credit->warranty_type}}</p>
						@php
						$debt = $credit->debt;
						$payments =$debt->payments;
						@endphp
						<p class="lead"><strong>CAPITAL:</strong> ${{ number_format($credit->ammount) }}</p>
						<hr>
					</div>
					<div class="col-md-4">
						<p class="lead" style="color:red;"><strong>INTERÉS:</strong>$ {{ number_format($late_interest, 2) }}</p>
						<p class="lead" style="color:red;"><strong>CAPITAL:</strong>$ {{ number_format($late_capital, 2) }}</p>
						<p class="lead" style="color:red;"><strong>MORA:</strong>$ {{ number_format($late_moratorium, 2)	 }}</p>
						<p class="lead" style="color:red;"><strong>TOTAL:</strong>$ {{ number_format($late_total, 2) }}</p>
						<button type="button" class="btn btn-lg btn-success btn-block" data-toggle="modal" data-target="#payment">Pagar</button>
						<hr>
					</div>					
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table" id="pagoss">

								<thead>
									<th>No.</th>
									<th>Día</th>
									<th>Fecha</th>
									<th>Monto</th>
									<th>Capital</th>
									<th>Interés</th>
									<th>Mora</th>
									<th>Total</th>
									<th>Pago</th>				
									<th>Estatus</th>

								</thead>
								<tbody>
									@foreach($payments as $payment)
									@if ($payment->status == "Pendiente")
									<tr class="active">
										<td>Cuota #{{ $payment->number }}</td>
										<td>{{$payment->day->format('l')}}</td>
										<td>{{$payment->date->format('d F Y')}}</td>
										<td>$ {{ number_format($payment->ammount, 2) }}</td>
										<td>$ {{ number_format($payment->capital, 2) }}</td>
										<td>$ {{ number_format($payment->interest, 2) }}</td>
										<td>$ {{ number_format($payment->moratorium, 2) }}</td>
										<td> <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#payment">$ {{ number_format($payment->total, 2) }}</button></td>
										<td>{{$payment->payment}}</td>
										<td><p style="color:gray;">{{$payment->status}}</p></td>
									</tr>
									@elseif($payment->status == "Atrasado")
									<tr class="danger">
										<td>Cuota #{{ $payment->number }}</td>
										<td>{{$payment->day->format('l')}}</td>
										<td>{{$payment->date->format('d F Y')}}</td>
										<td>$ {{ number_format($payment->ammount, 2) }}</td>
										<td>$ {{ number_format($payment->capital, 2) }}</td>
										<td>$ {{ number_format($payment->interest, 2) }}</td>
										<td>$ {{ number_format($payment->moratorium, 2) }}</td>
										<td> <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#payment">$ {{ number_format($payment->total, 2) }}</button></td>
										<td>{{$payment->payment}}</td>
										<td><p style="color:red;">{{$payment->status}}</p></td>
									</tr>
									@elseif($payment->status == "Pagado")
									<tr class="success">
										<td>Cuota #{{ $payment->number }}</td>
										<td>{{$payment->day->format('l')}}</td>
										<td>{{$payment->date->format('d F Y')}}</td>
										<td>$ {{ number_format($payment->ammount, 2) }}</td>
										<td>$ {{ number_format($payment->capital, 2) }}</td>
										<td>$ {{ number_format($payment->interest, 2) }}</td>
										<td>$ {{ number_format($payment->moratorium, 2) }}</td>
										<td> <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#payment">$ {{ number_format($payment->total, 2) }}</button></td>
										<td>{{$payment->payment}}</td>
										<td><p style="color:green;">{{$payment->status}}</p></td>
									</tr>
									@endif
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					@include('credits.payment')
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- ./col -->
	</div>
</div>
@endsection
