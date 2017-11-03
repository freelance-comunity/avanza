@extends('layouts.app')
@section('main-content')
@section('message_level')
Estado de Resultados
@endsection
@section('message_level_here')
Detalles
@endsection
@php
$regions = App\Models\Region::pluck('name','id');
@endphp
<div class="container-fluid">
	<div class="row-fluid">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Reporte Ejecutivo de Cartera</h3>
			</div>  
			<div class="box-body">
				<div class="form-group col-sm-6 col-lg-4">
					{!! Form::label('period', 'Periodo:') !!}
					{!! Form::select('period',['ENERO'=>'ENERO', 'FEBRERO'=>'FEBRERO','MARZO'=>'MARZO','ABRIL'=>'ABRIL','MAYO'=>'MAYO','JUNIO'=>'JUNIO','JULIO'=>'JULIO','AGOSTO'=>'AGOSTO','SEPTIEMBRE'=>'SEPTIEMBRE','OCTUBRE'=>'OCTUBRE','NOVIEMBRE'=>'NOVIEMBRE','DICIEMBRE'=>'DICIEMBRE'], null, ['class' => 'form-control input-lg ','required' => 'required',
					'data-parsley-trigger ' => 'input focusin',]) !!}
				</div>
				<div class="form-group col-sm-6 col-lg-4">
					{!! Form::label('region', 'Unidad de Negocios:') !!}
					{!! Form::select('region',$regions, null, ['class' => 'form-control input-lg ','required' => 'required',
					'data-parsley-trigger ' => 'input focusin',]) !!}
				</div>
				<div class="form-group col-sm-6 col-lg-4">
					<canvas id="type_credit" width="700" height="650"></canvas>
				</div>
				<div class="form-group col-sm-6 col-lg-4">
					<table class="table table-bordered">
						<thead class="bg-success">
							<tr>
								<th>SALDO DE CARTERA</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>${{ number_format(92345,0) }}</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="form-group col-sm-6 col-lg-4">
					<table class="table table-bordered">
						<thead class="bg-success">
							<tr>
								<th>CARTERA POR PRODUCTO</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>${{ number_format(92345,0) }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- Graphic --}}
<script>
	new Chart(document.getElementById("type_credit"), {
		type: 'polarArea',
		data: {
			labels: ["VIGENTE", "1 A 7 DÍAS","8 A 30 DÍAS","MAYOR DE 30 DÍAS"],
			datasets: [
			{
				label: "Population (millions)",
				backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
				data: [65,10,5,20]
			}
			]
		},
		options: {

		}
	});
</script>
@endsection