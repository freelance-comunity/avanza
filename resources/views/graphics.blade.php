@extends('layouts.app')

@section('main-content')

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
		<h3>Pagos Del Día</h3>
		<canvas id="line-chart" width="700" height="650"></canvas>
		<script>
			new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: [1,2,3,4,5,6,7,8,9,10],
    datasets: [{ 
        data: [{{$payments}}],
        label: "Proyectado",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: [{{$recovered}}],
        label: "Recuperado",
        borderColor: "#3cba9f",
        fill: false
      }, { 
        data: [{{$late}}],
        label: "Vencido",
        borderColor: "#c45850",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'World population per region (in millions)'
    }
  }
});
		</script>
	</div>
	@endsection