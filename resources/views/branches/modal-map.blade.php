 <div class="modal fade" id="myMapBranch">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Sucursal {{$branch->name}}</h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div id="map-canvas" class="" style="margin: 0;
            padding: 0;
            height: 100%;
            width:550px;
            height:480px;">
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
  var map;    
  var contentString = '{{$branch->address}}';    
  var myCenter=new google.maps.LatLng({{$branch->latitude}},{{$branch->length}});
  var marker=new google.maps.Marker({
    position:myCenter,
    icon: 'http://m.schuepfen.ch/icons/helveticons/black/60/Pin-location.png',
  });

  var infowindow = new google.maps.InfoWindow({
    content: contentString,
    maxWidth: 500
  });
  
  function initialize() {
    var mapProp = {
      center:myCenter,
      zoom: 14,
      draggable: false,
      scrollwheel: false,
      mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    map=new google.maps.Map(document.getElementById("map-canvas"),mapProp);
    marker.setMap(map);
    
  };
  google.maps.event.addDomListener(window, 'load', initialize);

  google.maps.event.addDomListener(window, "resize", resizingMap());

  $('#myMapBranch').on('show.bs.modal', function() {
   //Must wait until the render of the modal appear, thats why we use the resizeMap and NOT resizingMap!! ;-)
   resizeMap();
 })

  function resizeMap() {
   if(typeof map =="undefined") return;
   setTimeout( function(){resizingMap();} , 400);
 }

 function resizingMap() {
   if(typeof map =="undefined") return;
   var center = map.getCenter();
   google.maps.event.trigger(map, "resize");
   map.setCenter(center); 
 }
</script>
