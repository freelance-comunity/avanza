<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Documentos</title>
	<style>
		.page-break {
			page-break-after: always;
		}
	</style>
</head>
<body>
	<h1 style="text-align: center;">INE</h1>
	<hr>
	<img src="{{ asset('uploads/documents/') }}/{{ $document->ine }}" alt="">
	<div class="page-break"></div>
	<h1 style="text-align: center;">CURP</h1>
	<hr>
	<img src="{{ asset('uploads/documents/') }}/{{ $document->curp }}" alt="">
	<div class="page-break"></div>
	<h1 style="text-align: center;">COMPROBANTE DE DOMICILIO</h1>
	<hr>
	<img src="{{ asset('uploads/documents/') }}/{{ $document->proof_of_addres }}" alt="">
</body>
</html>