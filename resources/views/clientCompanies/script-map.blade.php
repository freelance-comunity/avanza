<script>
	$( document ).ready( function() {	
	//Google Maps JS
	//Set Map
	function initialize() {
		var myLatlng = new google.maps.LatLng({{$company->latitude_company}},{{$company->length_company}});
		var imagePath = 'http://m.schuepfen.ch/icons/helveticons/black/60/Pin-location.png'
		var mapOptions = {
			zoom: 11,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP   
		}

		var mapa = new google.maps.Map(document.getElementById('mapa'), mapOptions);
		//Callout Content
		var contentString = '{{$company->colony_company}}';
		//Set window width + content
		var infowindow = new google.maps.InfoWindow({
			content: contentString,
			maxWidth: 500
		});

		//Add Marker
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: mapa,
			icon: imagePath,
			title: 'image title'
		});

		google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(mapa,marker);
		});

		//Resize Function
		google.maps.event.addDomListener(window, "resize", function() {
			var center = map.getCenter();
			google.maps.event.trigger(mapa, "resize");
			mapa.setCenter(center);
		});
	}

	google.maps.event.addDomListener(window, 'load', initialize);

});
</script>