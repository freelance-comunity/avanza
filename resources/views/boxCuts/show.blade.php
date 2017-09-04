@extends('layouts.app')

@section('main-content')
@php
$date = new Date();
@endphp

<div class="box box-danger">
	<div class="box-header with-border">
		<div class="col-md-12">
			<h3 class="box-title"><i class="fa fa-university"></i>CORTE DE CAJA</h3>
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
							<a data-toggle="modal" data-target="#cut" class="btn bg-primary btn-lg btn-block">CORTE DE CAJA</a>
						</td>
						@include('boxCuts.cut')
					</tr>
				</table>
			</div>
		</div>
		<hr>
		<br><br>
		<br><br><br>
		<div class="col-md-4">   
			<div class="info-box bg-navy">
				<span class="info-box-icon"><i class="fa fa-dollar"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">CAJA</span>
					{{--<span class="info-box-number">{{ number_format($boxCut->bills_1000 * 1000 + $boxCut->bills_500 * 500 + $boxCut->bills_200 * 200 + $boxCut->bills_100 * 100 + $boxCut->bills_50 * 50 + $boxCut->bills_20 * 20 + $boxCut->coin_10 * 10 + $boxCut->coin_5 * 5 + $boxCut->coin_2 * 2 + $boxCut->coin_1 * 1 + $boxCut->cents_50 * 0.50,2) }}</span>--}}

					<div class="progress">
						<div class="progress-bar" style="width: 100%"></div>
					</div>
					<span class="progress-description">
						{{$date->format('d F Y')}}
					</span>
				</div>
			</div>
		</div>

		
		
		 
	</div>

	@endsection
