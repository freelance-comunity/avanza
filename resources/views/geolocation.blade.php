@extends('layouts.app')

@section('htmlheader_title')
Home
@endsection
@section('contentheader_title')
Panel de Control
@endsection

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<h1>Pruebas de Geolocalización</h1>
		<p>Click the button to get your coordinates.</p>

		<button onclick="getLocation()" class="btn bg-navy">Try It</button>

		<p id="demo"></p>
		<input type="text" id="lat">
		<input type="text" id="lon">
	</div>
	<script>
		var x = document.getElementById("demo");

		
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else { 
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
		function showPosition(position) {
			document.getElementById('lat').value=position.coords.latitude;
			document.getElementById('lon').value=position.coords.longitude;
			/*x.innerHTML = "Latitude: " + position.coords.latitude + 
			"<br>Longitude: " + position.coords.longitude;*/
		}
	</script>
</script>
</div>
@endsection
