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
					<span class="info-box-number">92,050</span>

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
						<th style="width: 10px">1</th>
						<th>EJECUTIVO:</th>
						<th>JUAN CARLOS MONTEJO HERNANDEZ</th>
					</tr>
					<tr>
						<td>2.</td>
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
					<thead>
						<th>MONTO</th>
						<th>CONCEPTO</th>
						<th>FECHA</th>
					</thead>
					<tbody>
						<tr>
							<td>$5000</td>
							<td>PAGO DE DOÑA PELOS</td>
							<td>{{$date}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-6">  
			<h4 align="center">EGRESOS</h4> 
			<div class="table-responsive">
				<table class="table table-hover table-striped"  id="example2">
					<thead>
						<th>MONTO</th>
						<th>CONCEPTO</th>
						<th>VAUHCER</th>
					</thead>
					<tbody>
						<tr>
							<td>$3000</td>
							<td>RENOVACION DE CREDITO DE DON LUIS</td>
							<td>VAUCHER.JPG</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>  	
</div>

@endsection
