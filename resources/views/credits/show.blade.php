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
				<div class="box-body">
					<div class="col-md-4">
						<p class="lead"><strong>TIPO DE PRESTAMO:</strong> {{$credit->periodicity}}</p>
						<p class="lead"><strong>MONTO:</strong> {{$credit->ammount}}</p>
						<p class="lead"><strong>INTERÉS:</strong> {{$credit->interest_rate}}</p>
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
						<p class="lead"><strong>CAPITAL:</strong> {{$debt->ammount}}</p>
						<hr>
					</div>
					<div class="col-md-4">
						<p class="lead" style="color:red;"><strong>INTERÉS:</strong> {{$credit->interest_rate}} </p>
						<p class="lead" style="color:red;"><strong>CAPITAL:</strong> $ {{$credit->ammount}}</p>
						<p class="lead" style="color:red;"><strong>MORA:</strong> {{$credit->moratorium}}</p>
						<p class="lead" style="color:red;"><strong>TOTAL:</strong> {{$credit->warranty_type}}</p>
						<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#payment">Pagar</button>
						<hr>
					</div>
					

					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table" id="payments">
								<thead>
									<th>No.</th>
									<th>Día</th>
									<th>Fecha</th>
									<th>Monto</th>
									<th>Capital</th>
									<th>Interés</th>
									<th>Moratorio</th>
									<th>Total</th>
									<th>Pago</th>				
									<th>Estatus</th>

								</thead>
								<tbody>
									@foreach($payments as $payment)
									<tr>
									@include('credits.payment')
										<td>#{{ $payment->number }}</td>
										<td>{{$payment->day->format('l')}}</td>
										<td>{{$payment->date->format('d F Y')}}</td>
										<td>$ {{$payment->ammount}}</td>
										<td>$ {{$payment->capital}}</td>
										<td>$ {{$payment->interest}}</td>
										<td>$ {{$payment->moratorium}}</td>
										<td> <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#payment">$ {{$payment->total}}</button></td>
										<td>{{$payment->payment}}</td>
										<td>{{$payment->status}}</td>

									</tr>
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
