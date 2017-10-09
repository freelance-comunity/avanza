<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Solicitud de Crédito</title>
	<style>
		.clearfix:after {
			content: "";
			display: table;
			clear: both;
		}
		table {

			
		} 
		caption {
			background-color: #ff3300;
			border: 1px solid black;
			font: bold 90% monospace;
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
		.part1{
			width: 50%;
			float: left;
			padding: 15px;
		}

		.part2{
			width: 50%;
			float: left;
			padding-right: 15px;
		}
		span {
			color: #ff3300;
		}
		label{
			font: bold 90% monospace;
			font-size: 10px;
		}
		label.visible {
			visibility: visible
		}

		label.hidden {
			visibility: hidden
		}
		p{
			font: bold 90% monospace;
			font-size: 8px;
			text-align: justify;
		}
		p.ex1 {
			margin-bottom: 10cm;
		}
		
		.part3{
			width: 100%;
			float: ;
			padding: 15px;
		}
		<<<<<<< HEAD

	</style>
</head>
<body>
	<header class="clearfix">
		<div id="logo">
			<img style="max-width: 40%;
			height: auto;
			display: inline;
			margin: auto;" src="{{asset('img/logo.jpg')}}">
		</div>


		<p  style="float: right;">FOLIO: <span>{{$credit->folio}}</span></p>
	</header><br>
	<br>
	<br>
	<div class="part1">
		<label> DATOS DEL CRÉDITO</label>
		<table style="width:203%">
			<tr>
				<th align="center">EJECUTIVO DE CRÉDITO</th>
				<th  align="center">FECHA</th>
			</tr>
			<tr>
				<td align="center">{{$credit->adviser}}</td>
				<td align="center">{{$credit->date->format('d F Y')}}</td>
			</tr>
		</table>

		<table style="width:203%">
			<tr>
				<th align="center">MONTO CRÉDITO</th>
				<th align="center">TASA INTERÉS</th>
				<th align="center">NO. CUOTAS</th>	
				<th align="center">PERIDIOCIDAD</th>
				<th align="center">TIPO DE GARANTÍA</th>			
			</tr>
			<tr>
				<td align="center">${{$credit->ammount}}</td>
				<td align="center">{{$credit->interest_rate * 100}}%</td>
				<td align="center">{{$credit->dues}}</td>
				<td align="center">{{$credit->periodicity}}</td>
				<td align="center">{{$credit->warranty_type}}</td>
			</tr>
		</table>
		<label class="visible"> DATOS GENERALES DEL SOLICITANTE</label>
		<table style="width:203%">
			<tr>
				<th align="center">NOMBRE(S)</th>
				<th align="center">APELLIDO PATERNO</th>
				<th align="center">APELLIDO MATERNO</th>
			</tr>
			<tr>
				<td align="center">{{$credit->firts_name}}</td>
				<td align="center">{{$credit->last_name}}</td>
				<td align="center">{{$credit->mothers_last_name}}</td>
			</tr>
		</table>
		<table style="width:203%">
			<tr>
				<th align="center">CURP</th>
				<th align="center">INE</th>
				<th align="center">ESTADO CIVIL</th>
				<th align="center">ESCOLARIDAD</th>
			</tr>
			<tr>
				<td align="center">{{$credit->curp}}</td>
				<td align="center">{{$credit->ine}}</td>
				<td align="center">{{$credit->civil_status}}</td>
				<td align="center">{{$credit->scholarship}}</td>
			</tr>
		</table>
		<table style="width:203%">
			<tr>
				<th align="center">CALLE</th>
				<th align="center">NÚMERO</th>
				<th align="center">COLONIA</th>
				<th align="center">MUNICIPIO</th>
				<th align="center">ESTADO</th>
				<th align="center">C.P.</th>
			</tr>
			<tr>
				<td align="center">{{$credit->street}}</td>
				<td align="center">{{$credit->number}}</td>
				<td align="center">{{$credit->colony}}</td>
				<td align="center">{{$credit->municipality}}</td>
				<td align="center">{{$credit->state}}</td>
				<td align="center">{{$credit->postal_code}}</td>
			</tr>
		</table>
		<table style="width:203%">
			<tr>
				<th align="center">TELÉFONO</th>
				<th align="center">NO. DEPENDIENTES</th>
				<th align="center">NO. FAMILIAS</th>
				<th align="center">TIPO DE VIVIENDA</th>
			</tr>
			<tr>
				<td align="center">{{$credit->phone}}</td>
				<td align="center">{{$credit->dependents}}</td>
				<td align="center">{{$credit->no_familys}}</td>
				<td align="center">{{$credit->type_of_housing}}</td>
			</tr>
		</table>
		<table style="width:203%">
			<tr>
				<th align="center">REFERENCIAS DE UBICACIÓN: COLOR DE CASA, ENTRE CALLES, ETC.</th>
			</tr>
			<tr>
				<td align="center">{{$credit->references}}</td>
			</tr>
		</table>
		<label>DATOS DEL NEGOCIO</label>
		<table style="width:203%">
			<tr>
				<th align="center">CALLE</th>
				<th align="center">NÚMERO</th>
				<th align="center">COLONIA</th>
				<th align="center">MUNICIPIO</th>
				<th align="center">ESTADO</th>
				<th align="center">C.P.</th>
			</tr>
			<tr>
				<td align="center">{{$credit->street_company}}</td>
				<td align="center">{{$credit->number_company}}</td>
				<td align="center">{{$credit->colony_company}}</td>
				<td align="center">{{$credit->municipality_company}}</td>
				<td align="center">{{$credit->state_company}}</td>
				<td align="center">{{$credit->postal_code_company}}</td>
			</tr>
		</table>
		<table style="width:203%">
			<tr>
				<th align="center">TELÉFONO</th>
				<th align="center">NOMBRE DEL NEGOCIO</th>

			</tr>
			<tr>
				<td align="center">{{$credit->phone_company}}</td>
				<td align="center">{{$credit->name_company}}</td>
			</tr>
		</table>
	@if ($credit->client->aval)
		<label> DATOS DEL CONYUGUE Y/O AVAL</label>
			<table style="width:203%">
				<tr>
					<th align="center">NOMBRE(S)</th>
					<th align="center">APELLIDO PATERNO</th>
					<th align="center">APELLIDO MATERNO</th>
				</tr>
				<tr>
					<td align="center">{{$credit->name_aval}}</td>
					<td align="center">{{$credit->last_name_aval}}</td>
					<td align="center">{{$credit->mothers_name_aval}}</td>
				</tr>
			</table>
			<table style="width:203%">
				<tr>
					<th align="center">CURP</th>
					<th align="center">TELÉFONO CELULAR</th>
					<th align="center">ESTADO CIVIL</th>
					<th align="center">ESCOLARIDAD</th>
				</tr>
				<tr>
					<td align="center">{{$credit->curp_aval}}</td>
					<td align="center">{{$credit->phone_aval}}</td>
					<td align="center">{{$credit->civil_status_aval}}</td>
					<td align="center">{{$credit->scholarship_aval}}</td>
				</tr>
			</table>
			<table style="width:203%">
				<tr>
					<th align="center">CALLE</th>
					<th align="center">NÚMERO DE CASA</th>
					<th align="center">COLONIA</th>
					<th align="center">MUNICIPIO</th>
					<th align="center">ESTADO</th>
					<th align="center">C.P</th>
				</tr>
				<tr>
					<td align="center">{{$credit->street_aval}}</td>
					<td align="center">{{$credit->number_aval}}</td>
					<td align="center">{{$credit->colony_aval}}</td>
					<td align="center">{{$credit->municipality_aval}}</td>
					<td align="center">{{$credit->state_aval}}</td>
					<td align="center">{{$credit->postal_code_aval}}</td>
				</tr>
			</table>
	@endif
			
			
			<label> AUTORIZACION PARA CONSULTA DE SIC</label>
			<p  style="width: 200%">Autorizo expresamente a CrediEfectivo, para que por conducto de sus servidores públicos facultados lleve a cabo sus investigaciones sobre mi comportamiento crediticio con las Sociedades de Información Crediticia. </p>
			<p style="width: 200%">Asimismo, declaro que conozco la naturaleza y alcance de la información que se solicitará, del uso que la Financiera hará de tal información y de que ésta podrá realizar consultas periódicas de mi historial crediticio, consintiendo que esta autorización se encuentre vigente por los siguientes tres años contados a partir de su expedición y en todo caso durante el tiempo que se mantenga 	la relación jurídica entre ambas.</p>
			<p style="width: 200%">Estoy de acuerdo y acepto que este documento quede bajo propiedad de la Financiera y/o de la Sociedad de Información Crediticia consultada para efectos de control y cumplimiento del artículo 28 de la Ley para Regular las Sociedades de Información Crediticia.</p>					
			@if ($credit->firm)
				<h6 style="text-align: center; width:200%"><img  class="displayed" src="{{ asset('uploads/signatures/') }}/{{ $credit->firm }}" style="height: 45px; max-width: 50%;"><br>{{$credit->firts_name}} {{$credit->last_name}} {{$credit->mothers_last_name}}
			</h6>
			@elseif($credit->firm_ine)
			<h6 style="text-align: center; width:200%"><img  class="displayed" src="{{ asset('uploads/firms/') }}/{{ $credit->firm_ine }}" style="height: 45px; max-width: 50%;"><br>{{$credit->firts_name}} {{$credit->last_name}} {{$credit->mothers_last_name}}
			</h6>
			@endif
		</div>
		<div class="part2">
			<table style="width:50%; float:right;">
				<tr>
					<th align="center">SUCURSAL/PTO VTA:{{$credit->branch}} </th>
				</tr>
			</table>
		</div>
		<div class="page-break"></div>
	</body>
	</html>
