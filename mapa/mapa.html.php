<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple markers</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

function initMap() {
  var myLatLng = {lat: 37.3753501, lng: -6.0250989};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: myLatLng
  });

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Sevilla</h1>'+
      '<div id="bodyContent">'+
      '<p><b>Sevilla</b>, es un sitio <b>precioso</b>, y fascinante' +
      'en el que podemos observar un ciudad con muchos monumentos y sobre todo'+
      'bares donde tomar una buena copa.</p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Sevilla'
  });

  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });
}

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6EUlHy-IDtCx_UQ_lWjGWEQch8-7bado&signed_in=true&callback=initMap"></script>
  </body>
</html>