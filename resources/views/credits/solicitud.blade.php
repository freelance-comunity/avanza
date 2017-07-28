<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Solicitud de Crédito</title>
	<style>
		table {

			
		} 
		th {
			background-color: #ff3300;
			color: white;
			font: bold 90% monospace;
			padding: 1px;
		}
		td {
			border: 1px solid black;
			font: bold 90% monospace;
			padding: 1px;
		}
		.part1{
			width: 50%;
			float: left;
			padding: 15px;
		}

		.part2{
			width: 50%;
			float: left;
			padding-right: 100px;
		}
		span {
			color: #ff3300;
		}
		label{
			font: bold 90% monospace;
		}
		label.visible {
			visibility: visible
		}

		label.hidden {
			visibility: hidden
		}
	</style>
</head>
<body>
	<header class="clearfix">
		<h1>CREDIEFECTIVO</h1>
		<p  style="float: right;">FOLIO: <span>{{$credit->folio}}</span></p> <br>
	</header>
	<div class="part1">
		<label>A. DATOS DEL CRÉDITO</label>
		<table style="width:100%">
			<tr>
				<th align="center">EJECUTIVO DE CRÉDITO</th>
			</tr>
			<tr>
				<td align="center">{{$credit->adviser}}</td>
			</tr>
		</table>

		<table style="width:100%">
			<tr>
				<th align="center">MONTO CRÉDITO</th>
				<th align="center">TASA INTERÉS</th>
				<th align="center">NO. CUOTAS</th>				
			</tr>
			<tr>
				<td align="center">${{$credit->ammount}}</td>
				<td align="center">{{$credit->interest_rate}}</td>
				<td align="center">${{$credit->dues}}</td>
			</tr>
		</table>
		<label class="visible">B.DATOS GENERALES DEL SOLICITANTE</label>
		<table style="width:100%">
			<tr>
				<th align="center">NOMBRE(S)</th>
				<th align="center">PATERNO</th>
			</tr>
			<tr>
				<td align="center">{{$credit->firts_name}}</td>
				<td align="center">{{$credit->last_name}}</td>
			</tr>
		</table>
		<table style="width:100%">
			<tr>
				<th align="center">CURP</th>
				<th align="center">INE</th>
			</tr>
			<tr>
				<td align="center">{{$credit->curp}}</td>
				<td align="center">{{$credit->ine}}</td>
			</tr>
		</table>
		<table style="width:100%">
			<tr>
				<th align="center">CALLE</th>
				<th align="center">NÚMERO</th>
				<th align="center">COLONIA</th>
			</tr>
			<tr>
				<td align="center">{{$credit->street}}</td>
				<td align="center">{{$credit->number}}</td>
				<td align="center">{{$credit->colony}}</td>
			</tr>
		</table>
		<table style="width:100%">
			<tr>
				<th align="center">TELÉFONO</th>
				<th align="center">NO. DEPENDIENTES</th>
				<th align="center">NO. FAMILIAS</th>
			</tr>
			<tr>
				<td align="center">{{$credit->phone}}</td>
				<td align="center">{{$credit->dependents}}</td>
				<td align="center">{{$credit->no_familys}}</td>
			</tr>
		</table>
		<table style="width:100%">
			<tr>
				<th align="center">REFERENCIAS</th>
			</tr>
			<tr>
				<td align="center">{{$credit->references}}</td>
			</tr>
		</table>
		<label>C. DATOS DEL NEGOCIO</label>
		<table style="width:100%">
			<tr>
				<th align="center">CALLE</th>
				<th align="center">NÚMERO</th>
				<th align="center">COLONIA</th>
			</tr>
			<tr>
				<td align="center">{{$credit->street_company}}</td>
				<td align="center">{{$credit->number_company}}</td>
				<td align="center">{{$credit->colony_company}}</td>
			</tr>
		</table>

	</div>



	<div class="part2">
		<table style="width:50%; float:right;">
			<tr>
				<th align="center">SUCURSAL: {{$credit->branch}}</th>
			</tr>
		</table><br>

		<table style="width:30%; float:right;">
			<tr>
				<th align="center">FECHA</th>
			</tr>
			<tr>
				<td align="center">{{$credit->date}}</td>
			</tr>
		</table><br><br><br>
		<table style="width:100%; float:right;">
			<tr>
				<th align="center">PERIDIOCIDAD</th>
				<th align="center">TIPO DE GARANTÍA</th>
			</tr>
			<tr>
				<td align="center">{{$credit->periodicity}}</td>
				<td align="center">{{$credit->warranty_type}}</td>
			</tr>
		</table>
		<br><br><br>
		<label class="hidden">HIDDEN</label>
		<table style="width:100%; float:right;">
			<tr>
				<th align="center">APELLIDO MATERNO</th>
			</tr>
			<tr>
				<td align="center">{{$credit->mothers_last_name}}</td>
			</tr>
		</table>
		<br>
		<br>
		<table style="width:100%; float:right;">
			<tr>
				<th align="center">ESTADO CIVIL</th>
				<th align="center">ESCOLARIDAD</th>
			</tr>
			<tr>
				<td align="center">{{$credit->civil_status}}</td>
				<td align="center">{{$credit->scholarship}}</td>
			</tr>
		</table>
		<br><br>
		<table style="width:100%; float:right;">
			<tr>
				<th align="center">MUNICIPIO</th>
				<th align="center">ESTADO</th>
				<th align="center">C.P.</th>
			</tr>
			<tr>
				<td align="center">{{$credit->municipality}}</td>
				<td align="center">{{$credit->state}}</td>
				<td align="center">{{$credit->postal_code}}</td>
			</tr>
		</table>
		<br><br>
		<table style="width:100%; float:right;">
			<tr>
				<th align="center">TIPO DE VIVIENDA</th>				
			</tr>
			<tr>
				<td align="center">{{$credit->type_of_housing}}</td>
			</tr>
		</table>

<img src="{{ asset('uploads/signatures/') }}/{{ $credit->firm }}" alt="">

	</div>


</body>
</html>