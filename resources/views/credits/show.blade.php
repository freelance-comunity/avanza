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
				$pay =  App\Models\Payment::where('debt_id', $debt->id)->where('status', 'Pagado')->count();
				@endphp
				<div class="box-body">
					<div class="col-md-4">
						<p class="lead"><strong>TIPO DE PRESTAMO:</strong> {{$credit->periodicity}}</p>
						<p class="lead"><strong>MONTO:</strong>$ {{ number_format($credit->ammount, 2) }}</p>
						<p class="lead"><strong>INTERÉS:</strong> {{$credit->interest_rate*1}}%</p>
						<p class="lead"><strong>CUOTAS:</strong> {{$credit->dues}}</p>
						<p class="lead"><strong>CUOTAS ABONADAS:</strong> {{$pay}}</p>
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
						$payments = $debt->payments;
						$client = $credit->client;
						$product = App\Models\Product::all();
						@endphp
						<p class="lead"><strong>CAPITAL:</strong> ${{ number_format($credit->ammount) }}</p>
						<hr>
					</div>
					<div class="col-md-4">
						<p class="lead" style="color:red;"><strong>INTERÉS:</strong>$ {{ number_format($late_interest, 2) }}</p>
						<p class="lead" style="color:red;"><strong>CAPITAL:</strong>$ {{ number_format($late_capital, 2) }}</p>
						<p class="lead" style="color:red;"><strong>MORA:</strong>$ {{ number_format($late_moratorium, 2)	 }}</p>
						<p class="lead" style="color:red;"><strong>TOTAL:</strong>$ {{ number_format($late_total, 2) }}</p>
						<button type="button" class="btn btn-lg btn-success btn-block" data-toggle="modal" data-target="#payment">Saldar Prestamo</button>
						<!-- Modal -->
						<div class="modal fade" id="myModal{{$client->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Elige la modalidad</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="text-center">
											<h4>Selecciona una modalidad de crédito</h4>
										</div>
									</div>
									<div class="modal-footer">

										@foreach ($product as $product)
										<div class="form-group col-sm-6 col-lg-6">
											<a href="{{ url('creditsClient') }}/{{$client->id}}/{{$product->id}}" ><button type="button" class="btn btn-lg btn-block bg-red">{{mb_strtoupper($product->name)}}</button></a>
										</div>
										@endforeach

									</div>
								</div>
							</div>
						</div>

						<!--MODAL-->
						<div class="modal fade" id="myModal">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Alerta de Renovación de Crédito</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<h1>Necesitas cubrir todos los pagos para renovar el crédito</h1>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary">Save changes</button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						<!--endmodal-->
						@if ($pay == 20)
						<button type="button" class="btn btn-lg bg-orange btn-block" data-toggle="modal" data-target="#myModal">Renovar Crédito</button></td>
						@elseif($debt->status == 'Pagado')
						<button type="button" class="btn btn-lg bg-blue btn-block" data-toggle="modal" data-target="#myModal{{$client->id}}">Renovar Crédito</button></td>
						@endif
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
									<th>Pagado</th>
									<th>Balance</th>				
									<th>Estatus</th>

								</thead>
								<tbody>
									@foreach($payments as $payment)
									@include('credits.payment')
									@if ($payment->status == "Pendiente")
									<tr class="active">
										<td>Cuota #{{ $payment->number }}</td>
										<td>{{$payment->day->format('l')}}</td>
										<td>{{$payment->date->format('d F Y')}}</td>
										<td>$ {{ number_format($payment->ammount, 2) }}</td>
										<td>$ {{ number_format($payment->capital, 2) }}</td>
										<td>$ {{ number_format($payment->interest, 2) }}</td>
										<td>$ {{ number_format($payment->moratorium, 2) }}</td>
										<td> <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#payment_{{ $payment->id }}">$ {{ number_format($payment->total, 2) }}</button></td>
										<td>${{ number_format($payment->payment, 2)}}</td>
										<td>${{ number_format($payment->balance, 2) }}</td>
										<td><p style="color:gray;">{{$payment->status}}</p></td>
									</tr>
									@elseif($payment->status == "Vencido")
									<tr class="danger">
										<td>Cuota #{{ $payment->number }}</td>
										<td>{{$payment->day->format('l')}}</td>
										<td>{{$payment->date->format('d F Y')}}</td>
										<td>$ {{ number_format($payment->ammount, 2) }}</td>
										<td>$ {{ number_format($payment->capital, 2) }}</td>
										<td>$ {{ number_format($payment->interest, 2) }}</td>
										<td>$ {{ number_format($payment->moratorium, 2) }}</td>
										<td> <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#payment_{{ $payment->id }}">$ {{ number_format($payment->total, 2) }}</button></td>
										<td>${{ number_format($payment->payment, 2)}}</td>
										<td style="color: red;">${{ number_format($payment->balance, 2) }}</td>
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
										<td> <button type="button" class="btn btn-default btn-lg disabled" data-toggle="modal" data-target="#payment_{{ $payment->id }}">$ {{ number_format($payment->total, 2) }}</button></td>
										<td>${{ number_format($payment->payment, 2)}}</td>
										<td>${{ number_format($payment->balance, 2) }}</td>
										<td><p style="color:green;">{{$payment->status}}</p></td>
									</tr>
									@endif
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- ./col -->
	</div>
</div>
@endsection
