@extends('layouts.app')
@section('main-content')
<div class="container">
	<div class="row">
		<!-- ./col -->
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-header with-border">
					<i class="fa fa-user"></i>
					<h3 class="box-title"><strong>{{$credit->firts_name}} {{$credit->last_name}} {{$credit->mothers_last_name}}</strong></h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><strong>FECHA DE CONTRATO: {{strtoupper($credit->date->format(' d F Y'))}}</strong></label>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					<label><strong>FOLIO: {{$credit->folio}}</strong></label>

				</div>
				<!-- /.box-header -->
				@php
				$debt = $credit->debt;
				$late_payments = App\Models\Payment::where('debt_id', $debt->id)->where('status', 'Vencido')->get();
				$block = App\Models\Payment::where('debt_id', $debt->id)->where('status', 'Vencido')->count();
				$bloqueado = App\Models\LatePayments::where('debt_id', $debt->id)->where('status', 'Bloqueado')->count();
				$late_interest = $late_payments->sum('interest');
				$late_capital = $late_payments->sum('capital');
				$late_moratorium = $late_payments->sum('moratorium');
				$late_total = $late_interest + $late_capital + $late_moratorium;
				$pay =  App\Models\Payment::where('debt_id', $debt->id)->where('status', 'Pagado')->count();
				$total_payment = $debt->payments->sum('payment');
				$rest = $credit->dues - $pay;
				$date_now = Carbon\Carbon::today();
				
				if ($credit->dues == 25) {
					$total = 1.5 * $credit->ammount;
				}	
				elseif ($credit->dues == 30) {
					$total = 1.7 * $credit->ammount;
				}
				elseif ($credit->dues == 52) {
					$total = 1.5 * $credit->ammount;
				}
				elseif ($credit->dues == 60) {
					$total = 1.7 * $credit->ammount;
				}
				elseif ($credit->periodicity == "SEMANAL") {
					$total = 1.5 * $credit->ammount;
				}
				
				@endphp
				<div class="box-body">
					<div class="col-md-4">

						<!--<p class="lead"><strong>TIPO DE PRESTAMO:</strong> {{$credit->periodicity}}</p>
						<p class="lead"><strong>TOTAL DE PRESTAMO:</strong> {{$total}}</p>
						<p class="lead"><strong>CAPITAL:</strong>$ {{ number_format($credit->ammount, 2) }}</p>
						<p class="lead"><strong>INTERÉS:</strong> {{$credit->interest_rate*1}}%</p>
						<hr>-->

						<p><strong>FRECUENCIA:</strong> {{$credit->periodicity}}</p>
						<p><strong>MONTO:</strong>$ {{ number_format($credit->ammount, 2) }}</p>
						<p><strong>TASA:</strong> {{$credit->interest_rate}}%</p>
						<p><strong>CUOTAS:</strong> {{$credit->dues}}</p>
						

					</div>
					@php
					$debt = $credit->debt;
					$payments = $debt->payments;
					$client = $credit->client;
					$product = App\Models\Product::all();
					@endphp
					<div class="col-md-4">

						<!--<p class="lead"><strong>PROMOTOR:</strong> {{$credit->adviser}}</p>
						<p class="lead"><strong>SUCURSAL:</strong> {{$credit->branch}}</p>
						<p class="lead"><strong>CUOTAS:</strong> {{$credit->dues}}</p>
						<p class="lead"><strong>CUOTAS ABONADAS:</strong> {{$pay}}</p>-->
						@php
						$debt = $credit->debt;
						$payments = $debt->payments;
						$client = $credit->client;
						$product = App\Models\Product::all();
						@endphp


						<p><strong>CUOTAS PAGADAS:</strong> {{$pay}}</p>
						<p><strong>CUOTAS RESTANTES:</strong> {{ $rest }}</p>
						<p><strong>TOTAL PAGADO:</strong> ${{ number_format($total_payment,2) }}</p>
						<p><strong>TOTAL RESTANTE:</strong> ${{ number_format($debt->ammount,2) }}</p>
						<p><strong>ESTATUS DEL CRÉDITO: </strong> {{ strtoupper($debt->status) }}</p>			
					</div>
					<div class="col-md-4">
						<p style="color:red;"><strong>INTERÉS:</strong>$ {{ number_format($late_interest, 2) }}</p>
						<p style="color:red;"><strong>CAPITAL:</strong>$ {{ number_format($late_capital, 2) }}</p>
						<p style="color:red;"><strong>MORA:</strong>$ {{ number_format($late_moratorium, 2)	 }}</p>
						<p style="color:red;"><strong>TOTAL:</strong>$ {{ number_format($late_total, 2) }}</p>

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

						@if ($pay >= 20 && $credit->dues == 25 && $debt->status =='Pendiente')
						<button type="button" class="btn btn-lg bg-orange btn-block" data-toggle="modal" data-target="#unlock">Renovar Crédito</button></td>
						@elseif ($pay >= 20 &&  $credit->dues == 30 )
						<button type="button" class="btn btn-lg bg-orange btn-block" data-toggle="modal" data-target="#unlock">Renovar Crédito</button></td>
						@elseif ($pay >= 40 && $credit->dues == 52 )
						<button type="button" class="btn btn-lg bg-orange btn-block" data-toggle="modal" data-target="#unlock">Renovar Crédito</button></td>
						@elseif ($pay >= 40 &&  $credit->dues == 60 )
						<button type="button" class="btn btn-lg bg-orange btn-block" data-toggle="modal" data-target="#unlock">Renovar Crédito</button></td>
						@elseif($debt->status == 'Pagado' && $bloqueado == 0)
						<button type="button" class="btn btn-lg bg-blue btn-block" data-toggle="modal" data-target="#myModal{{$client->id}}">Renovar Crédito</button></td>
						@endif
						<hr>
					</div>					
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table" id="pagoss">

								<thead class="thead-inverse">
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
									@php
									$latePayments = $payment->latePayments;
									@endphp
									@include('credits.late')
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
										<td>
											<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#payment_{{ $payment->id }}">$ {{ number_format($payment->total, 2) }}
											</button>
										</td>
										<td>${{ number_format($payment->payment, 2)}}</td>
										<td>${{ number_format($payment->balance, 2) }}</td>
										<td><p style="color:gray;">{{$payment->status}}</p></td>
									</tr>
									@elseif($payment->status == "Parcial")
									<tr class="info">
										<td>Cuota #{{ $payment->number }}</td>
										<td>{{$payment->day->format('l')}}</td>
										<td>{{$payment->date->format('d F Y')}}</td>
										<td>$ {{ number_format($payment->ammount, 2) }}</td>
										<td>$ {{ number_format($payment->capital, 2) }}</td>
										<td>$ {{ number_format($payment->interest, 2) }}</td>
										<td>$ {{ number_format($payment->moratorium, 2) }}</td>
										<td> <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#payment_{{ $payment->id }}">$ {{ number_format($payment->total, 2) }}</button></td>
										<td>${{ number_format($payment->payment, 2)}}</td>
										<td style="color: blue;">${{ number_format($payment->balance, 2) }}</td>
										<td><p style="color:blue;">{{$payment->status}}</p></td>
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
