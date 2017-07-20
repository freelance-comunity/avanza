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
	@php
	$client = App\Models\Client::find(3);
	$document = $client->document;
	@endphp

	<h1>INE</h1>
	<hr>
	<img src="{{ asset('uploads/documents/') }}/{{ $document->ine }}" alt="">
	<div class="page-break"></div>
	<h1>CURP</h1>
	<hr>
	<img src="{{ asset('uploads/documents/') }}/{{ $document->curp }}" alt="">
	<div class="page-break"></div>
	<h1>COMPROBANTE DE DOMICILIO</h1>
	<hr>
	<img src="{{ asset('uploads/documents/') }}/{{ $document->proof_of_addres }}" alt="">
</body>
</html>