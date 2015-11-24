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

  <?php 

    if (!empty($latlon)) {

      $place = "";  
      foreach ($latlon as $location) {
        
        $place .= "var myLatLng" . $location['id_location'] . " = {lat: " . $location['lat'] . ", lng: " . $location['lon']. "};\n";
      }

        echo $place;
      
    }

   ?>

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: myLatLng
  });

  <?php 

  $contentString = "";

  foreach ($latlon as $location) {
    
  $contentString .= "var contentString".$location['id_location']." = '<div id=\"content\">"
    .'</div>'
    .'<h1 id="firstHeading" class="firstHeading">' .$location['location']. '</h1>'
    .'<div id="bodyContent">'
    .'<p><b>(' . $location['animal'] . '):</b> ' . $location['caracteristicas'] . '</p>'
    .'</div>'
    ."</div>';\n\n";
  

  }

echo $contentString;


  $infowindow = "";

  foreach ($latlon as $location) {
    
    $infowindow .= "var infowindow".$location['id_location']." = new google.maps.InfoWindow({ content: contentString".
    $location['id_location']." });\n";

  }

echo $infowindow;
  // var infowindow = new google.maps.InfoWindow({
  //   content: contentString
  // });


  $marker = "";

  foreach ($latlon as $location) {
    
    $marker .= " var marker".$location['id_location']." = new google.maps.Marker({\n position: myLatLng".$location['id_location'].",\n map: map, \n title: '".$location['location']."'});\n";

   

  }

echo $marker;
    // var marker = new google.maps.Marker({
    //     position: myLatLng,
    //     map: map,
    //     title: 'Sevilla'
    //   });

  $markerListeners = "";

  foreach ($latlon as $location) {
    
    $markerListeners .= "marker".$location['id_location'].".addListener('click', function() {\n infowindow".$location['id_location'].".open(map, marker".$location['id_location'].");\n});\n";
  
  }

  echo $markerListeners;
  // marker.addListener('click', function() {
  //   infowindow.open(map, marker);
  // });


   ?>
}
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6EUlHy-IDtCx_UQ_lWjGWEQch8-7bado&signed_in=true&callback=initMap"></script>
  </body>
</html>