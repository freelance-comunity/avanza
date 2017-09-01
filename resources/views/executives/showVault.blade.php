@extends('layouts.app')

@section('main-content')
@php
$date = \Carbon\Carbon::now()->toDateString();
@endphp

<div class="box box-danger">
	<div class="box-header with-border">
		<div class="col-md-12">
			<h3 class="box-title"><i class="fa fa-university"></i>BOVÉDA</h3>
		</div><br><br>
		<div class="col-md-4">   
			<div class="info-box bg-navy">
				<span class="info-box-icon"><i class="fa fa-dollar"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">CAJA</span>
					<span class="info-box-number">{{ number_format($vault->ammout,2) }}</span>

					<div class="progress">
						<div class="progress-bar" style="width: 100%"></div>
					</div>
					<span class="progress-description">
						{{$date}}
					</span>
				</div>
			</div>
		</div>
		<div class="col-md-8">   
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<th style="width: 10px"><i class="fa fa-user"></i></th>
						<th>EJECUTIVO DE CRÉDITO:</th>
						<th>{{ $user->name }} {{ $user->father_last_name }} {{ $user->mother_last_name }}</th>
					</tr>
					<tr>
						<td><i class="fa fa-map-marker"></i></td>
						<td>SUCURSAL:</td>
						<td>LAS NUBES TUXTLA GUTIERREZ</td>
					</tr>
				</table>
			</div>
		</div>
		<hr>
		<br><br>
		<br><br><br>
		<div class="col-md-6">  
			<h4 align="center">INGRESOS</h4> 
			<div class="table-responsive">
				<table class="table table-hover table-striped"  id="example">
					<thead class="thead-inverse">
						<th>MONTO</th>
						<th>CONCEPTO</th>
						<th>FECHA</th>
					</thead>
					<tbody>
						@foreach ($incomes as $income)
						<tr>
							<td>{{ $income->ammout }}</td>
							<td>{{ $income->concept }}</td>
							<td>{{ $income->created_at }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-6">  
			<h4 align="center">EGRESOS</h4> 
			<div class="table-responsive">
				<table class="table table-hover table-striped"  id="example2">
					<thead class="thead-inverse">
						<th>MONTO</th>
						<th>CONCEPTO</th>
						<th>COMPROBANTE</th>
						<th>FECHA</th>
					</thead>
					<tbody>
						@foreach ($expenditures as $expenditure)
						<tr>
							<td>{{ $expenditure->ammout }}</td>
							<td>{{ $expenditure->concept }}</td>
							<td>{{ $expenditure->voucher }}</td>
							<td>{{ $expenditure->created_at }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		
	</div>  	
</div>

@endsection
