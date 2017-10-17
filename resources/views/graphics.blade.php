@extends('layouts.app')

@section('main-content')
@section('message_level')
Graficas de monitoreo
@endsection
@section('message_level_here')
Lista de graficas
@endsection
<div class="container">
	@php
	$date = \Carbon\Carbon::now()->toDateString();
	$payments = App\Models\Payment::where('date', $date)->count();
	$recovered = App\Models\Payment::where('status', 'Pagado')->where('date', $date)->count();
	$late = App\Models\Payment::where('status','Vencido')->where('date', $date)->count();
	$pending = App\Models\Payment::where('status','Pendiente')->where('date', $date)->count();
	$diario_one = App\Models\Credit::where('periodicity','DIARIO')->where('dues','25')->count();
	$diario_two= App\Models\Credit::where('periodicity','DIARIO')->where('dues','30')->count();
	$diario_three = App\Models\Credit::where('periodicity','DIARIO')->where('dues','52')->count();
	$diario_four = App\Models\Credit::where('periodicity','DIARIO')->where('dues','60')->count();
	$semanal = App\Models\Credit::where('periodicity', 'SEMANAL')->count();
	
	@endphp

	<div class="col-md-6">
		<h3>Pagos Del Día</h3>
		<canvas id="paymentsNow" width="700" height="650"></canvas>
		<script>
			
			var ctx = document.getElementById("paymentsNow").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: [{{$date}}],
					datasets: [{
						label: 'Proyectado',
						data: [{{$payments}},0],
						backgroundColor: "rgb(51, 51, 255)"
					}, {
						label: 'Recuperado',
						data: [{{$recovered}},0],
						backgroundColor: "rgb(0, 204, 153)"
					}, {
						label: 'Pendiente',
						data: [{{$pending}},0],
						backgroundColor: "rgb(255, 204, 0)"
						
					}, {
						label: 'Vencido',
						data: [{{$late}},0],
						backgroundColor: "rgb(255, 80, 80)"
					}]
				}
			});
		</script>
	</div>

	<div class="col-md-6">
		<h3>Tipos de Créditos</h3>
		<canvas id="type_credit" width="700" height="650"></canvas>
		<script>
			new Chart(document.getElementById("type_credit"), {
				type: 'polarArea',
				data: {
					labels: ["25 CUOTAS", "30 CUOTAS","52 CUOTAS", "60 CUOTAS" ,"SEMANAL"],
					datasets: [
					{
						label: "Population (millions)",
						backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
						data: [{{$diario_one}},{{$diario_two}},{{$diario_three}},{{$diario_four}},{{$semanal}}]
					}
					]
				},
				options: {
					
				}
			});
		</script>
	</div>
	<div class="col-md-6">
		<h3>Tipos de Créditos</h3>
		<canvas id="type_credit" width="700" height="650"></canvas>
		<script>
			var ctx = document.getElementById("myChart");
			var myChart = new Chart(ctx, {
				type: 'radar',
				data: {
					labels: ["M", "T", "W", "T", "F", "S", "S"],
					datasets: [{
						label: 'apples',
						backgroundColor: "rgba(153,255,51,0.4)",
						borderColor: "rgba(153,255,51,1)",
						data: [12, 19, 3, 17, 28, 24, 7]
					}, {
						label: 'oranges',
						backgroundColor: "rgba(255,153,0,0.4)",
						borderColor: "rgba(255,153,0,1)",
						data: [30, 29, 5, 5, 20, 3, 10]
					}]
				}
			});
		</script>
	</div>
	
	@endsection