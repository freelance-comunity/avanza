<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Solicitud</title>
	<style>
		.clearfix:after {
			content: "";
			display: table;
			clear: both;
		}
		.demo {
			border:1px solid #C0C0C0;
			border-collapse:collapse;
			padding:5px;
			width:100%;
		}
		.demo1 {
			border:1px solid #C0C0C0;
			border-collapse:collapse;
			padding:5px;
		}
		.demo th {
			border:1px solid #C0C0C0;
			padding:5px;
			background:#ff3300;
		}
		.demo td {
			border:1px solid #C0C0C0;
			padding:5px;
		}
		caption {
			background-color: #ff3300;
			border: 1px solid black;
			font: bold 90% monospace;
			text-align: left;
		}
		th {
			background-color: #ff3300;
			color: white;
			font: bold 90% monospace;
			padding: 1px;
			font-size: 10px;
		}
		
		td {
			border: 1px solid black;
			font: bold 90% monospace;
			font-size: 10px;
			padding: 1px;
		}
	</style>
</head>
<body>
	<header class="clearfix">
		<div id="logo">
			<img src="{{asset('img/logo.jpg')}}">
		</div>
		<p  style="float: right;">FOLIO: <span>{{$credit->folio}}</span></p>
	</header>
	<table class="demo1">
		<caption>A. DATOS DEL CRÉDITO</caption>
		<thead>
			<tr>
				<th>EJECUTIVO DE CRÉDITO</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>&nbsp;</td>
			</tr>
		</tbody>
	</table>
	<table class="demo">
		<thead>
			<tr>
				<th>MONTO CRÉDITO</th>
				<th>TASA INTERÉS</th>
				<th>NO. CUOTAS</th>
				<th>PERIODICIDAD</th>
				<th>TIPO DE GARANTÍA</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</tbody>
	</table>
	<table class="demo">
		<caption>B. DATOS GENERALES DEL SOLICITANTE</caption>
		<thead>
			<tr>
				<th>NOMBRE (S)</th>
				<th>APELLIDO PATERNO</th>
				<th>APELLIDO MATERNO</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</tbody>
	</table>
	<table class="demo">
		<thead>
			<tr>
				<th>CURP</th>
				<th>INE</th>
				<th>ESTADO CIVIL</th>
				<th>ESCOLARIDAD</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</tbody>
	</table>
	<table class="demo">
		<thead>
			<tr>
				<th>CALLE</th>
				<th>NÚMERO</th>
				<th>COLONIA</th>
				<th>MUNICIPIO</th>
				<th>ESTADO</th>
				<th>C.P.</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</tbody>
	</table>
	<table class="demo">
		<thead>
			<tr>
				<th>TELÉFONO</th>
				<th>NO. DEPENDIENTES</th>
				<th>NO. FAMILIAS</th>
				<th>TIPO DE VIVIENDA</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</tbody>
	</table>
	<table class="demo">
		<thead>
			<tr>
				<th>REFERENCIAS DE UBICACIÓN: COLOR DE CASA, ENTRE CALLES, ETC.</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>&nbsp;</td>
			</tr>
		</tbody>
	</table>
</body>
</html>