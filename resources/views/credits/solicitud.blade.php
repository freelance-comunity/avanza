<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Solicitud de Crédito</title>
	<style>
		th {
			background-color: #ff3300;
			color: white;
		}
		td {
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<header class="clearfix">

	</header>
	<label>A. DATOS DEL CRÉDITO</label>
	<div style=" margin-right:500px">
	<table >
		<tr>
			<th align="center">EJECUTIVO DE CRÉDITO</th>
		</tr>
		<tr>
			<td align="center">{{$credit->adviser}}</td>
		</tr>
	</table>

	<table>
		<tr>
			<th align="center">MONTO CRÉDITO</th>
			<th align="center">TASA DE INTERÉS</th>
		</tr>
		<tr>
			<td align="center">${{$credit->ammount}}</td>
			<td align="center">{{$credit->interest_rate}}</td>
		</tr>
	</table>
	</div>


</body>
</html>