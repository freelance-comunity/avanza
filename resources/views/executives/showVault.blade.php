@extends('layouts.app')

@section('main-content')
@php
$date = new Date();
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
					<span class="info-box-number">{{ number_format($vault->ammount,2) }}</span>

					<div class="progress">
						<div class="progress-bar" style="width: 100%"></div>
					</div>
					<span class="progress-description">
						{{$date->format('d F Y')}}
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
						<td>{{ $user->branch->name }}</td>
					</tr>
					<tr>
						<td colspan="2">
							<a data-toggle="modal" data-target="#start_of_day" class="btn bg-primary btn-lg btn-block">ASIGNAR SALDO INICIAL</a>
						</td>
						<td colspan="2">
							<a data-toggle="modal" data-target="#cash_allocation" class="btn bg-primary btn-lg btn-block">ASIGNAR EFECTIVO</a>
						</td>
						@include('executives.cash_allocation')
						@include('executives.start_of_day')
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
						<th>CONCEPTO</th>
						<th>IMPORTE</th>
						<th style="width: 30px;">DETALLES</th>
					</thead>
					<tbody>
						<tr>
							<td>Saldo inicial</td>
							<td>${{ number_format($si->sum('ammount')) }}</td>
							<td style="text-align: center;">
								<a onclick="saldo()" data-toggle="modal" data-target="#si"><i class="fa fa-eye fa-2x"></i></a>
								@include('executives.si')
							</td>
						</tr>
						<tr>
							<td>Asignación de efectivo</td>
							<td>${{ number_format($af->sum('ammount')) }}</td>
							<td style="text-align: center;"><a href=""><i class="fa fa-eye fa-2x"></i></a></td>
						</tr>
						<tr>
							<td>Recuperación</td>
							<td>${{ number_format($rc->sum('ammount')) }}</td>
							<td style="text-align: center;"><a href=""><i class="fa fa-eye fa-2x"></i></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-6">  
			<h4 align="center">EGRESOS</h4> 
			<div class="table-responsive">
				<table class="table table-hover table-striped"  id="example2">
					<thead class="thead-inverse">
						<th>IMPORTE</th>
						<th>CONCEPTO</th>
						<th style="width: 30px;">DETALLES</th>
					</thead>
					<tbody>
						<tr>
							<td>Saldo inicial</td>
							<td>${{ number_format($c->sum('ammount')) }}</td>
							<td style="text-align: center;"><a href=""><i class="fa fa-eye fa-2x"></i></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>  	
</div>
@endsection
