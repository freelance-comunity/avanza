@extends('layouts.app')

@section('main-content')
@section('message_level')
Corte de caja
@endsection
@section('message_level_here')
Lista de personal
@endsection
<div class="container">

	@include('flash::message')
	@include('final.modalBoxCut')

	<div class="row">
		<h1 class="pull-left">CIERRE DE BÓVEDA</h1>

		{{-- <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalBoxCut" >CIERRE BÓVEDA </a> --}}
	</div>
	<div class="table-inverse">
		<div class="table-responsive">
			<table class="table" id="example">
				<thead class="thead-inverse">
					<th>Fecha</th>
					<th>Región</th>
					<th>Sucursal</th>
					<th>Empleado</th>
					<th>Saldo Bóveda</th>
					<th>Asignación en Efectivo</th>
					<th>Recuperación</th>
					<th>Recuperación Access</th>
					<th>Colocación</th>
					<th>Gastos</th>
					<th>Inversión en Activos</th>
				</thead>
				<tbody>
					@php

					$finals = App\Models\Finals::all();
					@endphp
					@foreach ($finals as $final)
					<tr>
						<td>{{$final->date}}</td>
						<td>{{$final->region}}</td>
						<td>{{$final->branch}}</td>
						<td>{{$final->name}}</td>
						<td>${{number_format($final->vault,2)}}</td>
						<td>{{$final->incomes}}</td>
						<td>{{$final->incomePayment}}</td>
						<td>{{$final->access}}</td>
						<td>{{$final->credit}}</td>
						<td>{{$final->expenditures}}</td>
						<td>{{$final->actives}}</td>
					</tr>


					@endforeach

				</tbody>
			</table>
		</div>
	</div>

</div>
@endsection