@extends('layouts.app')

@section('main-content')
@php
$date = new Date();
@endphp
@include('executives.si')
@include('executives.rc')
@include('executives.af')
@include('executives.c')
@include('executives.g')
@include('executives.ra')
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
					@if(Auth::user()->hasRole(['administrador', 'director-general', 'coordinador-regional', 'coordinador-sucursal']))
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
					@endif
					@role('ejecutivo-de-credito')
					<tr>
						<td colspan="4">
							<a data-toggle="modal" data-target="#record_expense" class="btn bg-primary btn-lg btn-block">REGISTRAR GASTO</a>
							<a data-toggle="modal" data-target="#purse_access" class="btn bg-primary btn-lg btn-block">REGISTRAR COBROS ACCESS</a>
						</td>
						@include('executives.record_expense')
						@include('executives.purse_access')
					</tr>
					
					@endrole
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
						@if (Auth::user()->hasRole(['administrador', 'director-general','coordinador-regional', 'coordinador-sucursal']))
						<th style="width: 30px;">DETALLES</th>
						@endif
					</thead>
					<tbody>
						<tr>
							<td>Saldo inicial</td>
							<td>${{ number_format($si->sum('ammount')) }}</td>
							@if (Auth::user()->hasRole(['administrador', 'director-general','coordinador-regional', 'coordinador-sucursal']))
							<td style="text-align: center;">
								<a data-toggle="modal" data-target="#si"><i class="fa fa-eye fa-2x"></i></a>
							</td>
							@endif
						</tr>
						<tr>
							<td>Asignación de efectivo</td>
							<td>${{ number_format($af->sum('ammount')) }}</td>
							@if (Auth::user()->hasRole(['administrador', 'director-general','coordinador-regional', 'coordinador-sucursal']))
							<td style="text-align: center;">
								<a data-toggle="modal" data-target="#af"><i class="fa fa-eye fa-2x"></i></a>
							</td>
							@endif
						</tr>
						<tr>
							<td>Recuperación</td>
							<td>${{ number_format($rc->sum('ammount')) }}</td>
							@if (Auth::user()->hasRole(['administrador', 'director-general','coordinador-regional', 'coordinador-sucursal']))
							<td style="text-align: center;">
								<a data-toggle="modal" data-target="#rc"><i class="fa fa-eye fa-2x"></i></a>
							</td>
							@endif
						</tr>
						<tr>
							<td>Recuperación Access</td>
							<td>${{ number_format($ra->sum('ammount')) }}</td>
							@if (Auth::user()->hasRole(['administrador', 'director-general','coordinador-regional', 'coordinador-sucursal']))
							<td style="text-align: center;">
								<a data-toggle="modal" data-target="#ra"><i class="fa fa-eye fa-2x"></i></a>
							</td>
							@endif
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
						@if (Auth::user()->hasRole(['administrador', 'director-general','coordinador-regional', 'coordinador-sucursal']))
						<th style="width: 30px;">DETALLES</th>
						@endif
					</thead>
					<tbody>
						<tr>
							<td>Colocación</td>
							<td>${{ number_format($c->sum('ammount')) }}</td>
							@if (Auth::user()->hasRole(['administrador', 'director-general','coordinador-regional', 'coordinador-sucursal']))
							<td style="text-align: center;">
								<a data-toggle="modal" data-target="#c"><i class="fa fa-eye fa-2x"></i></a>
							</td>
							@endif
						</tr>
						<tr>
							<td>Gastos</td>
							<td>${{ number_format($g->sum('ammount')) }}</td>
							@if (Auth::user()->hasRole(['administrador', 'director-general','coordinador-regional', 'coordinador-sucursal']))
							<td style="text-align: center;">
								<a data-toggle="modal" data-target="#g"><i class="fa fa-eye fa-2x"></i></a>
							</td>
							@endif
						</tr>
						<tr>
							<td>Devolución</td>
							<td>$0.00</td>
							@if (Auth::user()->hasRole(['administrador', 'director-general','coordinador-regional', 'coordinador-sucursal']))
							<td style="text-align: center;"><a href=""><i class="fa fa-eye fa-2x"></i></a></td>
							@endif
						</tr>
						<tr>
							<td>Inversión</td>
							<td>$0.00</td>
							@if (Auth::user()->hasRole(['administrador', 'director-general','coordinador-regional', 'coordinador-sucursal']))
							<td style="text-align: center;"><a href=""><i class="fa fa-eye fa-2x"></i></a></td>
							@endif
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>  	
</div>
@endsection
