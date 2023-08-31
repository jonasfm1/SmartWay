<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title></title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
 

  <style id="compiled-css" type="text/css">
      html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}
#map {
    height: 100%;     
    width: 100%;
    height: 100%;
}
    /* EOS */
  </style>

</head>
<body>


    <button onclick="for (var r of gRenderers) r.setMap(gMap);">Show line</button>

<button onclick="for (var r of gRenderers) r.setMap(null);">Hide line</button>
<div id='romaneio'>

</div>
<div id="map"></div>
<script>
function geocodePlaceId(geocoder, map, verifica) {
  const placeId = verifica;

  geocoder
    .geocode({ placeId: placeId })
    .then(({ results }) => {
      if (results[0]) {
        map.setZoom(11);
        map.setCenter(results[0].geometry.location);

        const marker = new google.maps.Marker({
          map,
          position: results[0].geometry.location,
        });
        console.log(results[0].geometry.location.lat());
        console.log(results[0].geometry.location.lng());

      } else {
        window.alert("No results found");
      }
    })
    .catch((e) => window.alert("Geocoder failed due to: " + e));
}

function getDistance(origem, destino)
  {
     //Find the distance
     var distanceService = new google.maps.DistanceMatrixService();
     distanceService.getDistanceMatrix({
        origins: origem,
        destinations: destino,
        travelMode: google.maps.TravelMode.WALKING,
        unitSystem: google.maps.UnitSystem.METRIC,
        durationInTraffic: true,
        avoidHighways: false,
        avoidTolls: false
    },
    function (response, status) {
        if (status !== google.maps.DistanceMatrixStatus.OK) {
            console.log('Error:', status);
        } else {
            //console.log(response);
           // $("#distance").text(response.rows[0].elements[0].distance.text).show();
          //  $("#duration").text(response.rows[0].elements[0].duration.text).show();
        }
    });
  }

        // list of points
    var stations1 = [
        {lat: -25.4774448, lng: -49.3345846, name: 'Inicio'},
        {lat: -25.9484068, lng: -48.59691677855778557855, name: 'B'},
        {lat: -25.9493245, lng: -48.59725497865778657865, name: 'D'},
        {lat: -25.9507372, lng: -48.59751037856778567856, name: 'C'},
        {lat: -26.0702974, lng: -48.61720567867778677867, name: 'B'},
       
        {lat: -26.0713721, lng: -48.61783497882778827882, name: 'A'},
        {lat: -25.9484068, lng: -48.59691677855778557855, name: 'B'},
        {lat: -25.9493245, lng: -48.59725497865778657865, name: 'D'},
        {lat: -25.9507372, lng: -48.59751037856778567856, name: 'C'},
        {lat: -26.0702974, lng: -48.61720567867778677867, name: 'B'},
        {lat: -26.0713721, lng: -48.61783497882778827882, name: 'A'},
        {lat: -26.0702974, lng: -48.61720567867778677867, name: 'B'},
        {lat: -26.0713721, lng: -48.61783497882778827882, name: 'A'},
        {lat: -25.9484068, lng: -48.59691677855778557855, name: 'B'},
        {lat: -25.9493245, lng: -48.59725497865778657865, name: 'D'},
        {lat: -25.9507372, lng: -48.59751037856778567856, name: 'C'},
        {lat: -26.0702974, lng: -48.61720567867778677867, name: 'B'},
        {lat: -26.0713721, lng: -48.61783497882778827882, name: 'A'},
        {lat: -26.0702974, lng: -48.61720567867778677867, name: 'B'},
        {lat: -27.0713721, lng: -51.61783497882778827882, name: 'A'},
        {lat: -27.4774448, lng: -49.3345846, name: 'Final'},
        // ... as many other stations as you need
    ];
    var stations2 = [
        {lat: -25.4774448, lng: -49.3345846, name: 'Inicio'},
        {lat: -26.2737615, lng: -48.824248182758275, name: 'XXX1'},
        {lat: -26.2662960, lng: -48.800199482768276, name: 'XXX2'},
        {lat: -26.0713721, lng: -48.61783497882778827882, name: 'A'},
        {lat: -25.4774448, lng: -49.3345846, name: 'Final'},
        // ... as many other stations as you need
     
    ];

 

  function initMap() {

    var service = new google.maps.DirectionsService;
    var map = new google.maps.Map(document.getElementById('map'));
    window.gMap = map;

  

    // Zoom and center map automatically by stations (each station will be in visible map area)
    var lngs1 = stations2.map(function(station2) { return station2.lng; });
    var lats1 = stations2.map(function(station2) { return station2.lat; });
    map.fitBounds({
        west: Math.min.apply(null, lngs1),
        east: Math.max.apply(null, lngs1),
        north: Math.min.apply(null, lats1),
        south: Math.max.apply(null, lats1),
    });


  

function geos(lista) {
//////////////////////////////////////////////////////////////////////////////////////////
    // Divide route to several parts because max stations limit is 25 (23 waypoints + 1 origin + 1 destination)
    for (var i = 0, parts = [], max = 23 - 1; i < lista.length; i = i + max)
    
     parts.push(lista.slice(i, i + max + 1));

        
    // Service callback to process service results
    var service_callback = function(response, status) {

       
        
        if (status != 'OK') {
            console.log('Directions request failed due to ' + status);
            return;
        }
        var renderer = new google.maps.DirectionsRenderer;  
        if (!window.gRenderers)
        		window.gRenderers = [];
        window.gRenderers.push(renderer);
        renderer.setMap(map);
        renderer.setOptions({ suppressMarkers: false, preserveViewport: false });
        renderer.setDirections(response);


        console.log(response);
        var legs = response.routes[0].legs[0].steps.length;
        const geocoder = new google.maps.Geocoder();
        const infowindow = new google.maps.InfoWindow();

        var verifica = response.geocoded_waypoints[4].place_id;

        geocodePlaceId(geocoder, map, verifica);

       /*  var legs_2 = response.routes[0].legs[0].via_waypoint.length;
        alert(legs_2);
	

      for (var j1 = 0; j1 < legs_2; j1++) {
        via_waypoints= response.routes[0].legs[0].via_waypoint[j1].location.lat;
				alert(via_waypoints[j1]);
      }
           */     
				for (var j = 0; j < legs; j++) {

				totaldistance = response.routes[0].legs[0].steps[j].distance.text;			
				totaltime = response.routes[0].legs[0].steps[j].duration.text;
                instrucoes = response.routes[0].legs[0].steps[j].instructions;



                document.getElementById('romaneio').innerHTML += instrucoes ;
                document.getElementById('romaneio').innerHTML += totaldistance + " - " + totaltime + "<br>";
                //alert(totaltime)
		
 				}
        
                
                 document.getElementById('romaneio').innerHTML +="<br><br><br>";
      
      
       // alert(xxx);
      //  alert(yyy);

    };

//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

    // Send requests to service to get route (for stations count <= 25 only one request will be sent)
    for (var i = 0; i < parts.length; i++) {
        // Waypoints does not include first station (origin) and last station (destination)
        
        var waypoints = [];
        for (var j = 1; j < parts[i].length - 1; j++)
            waypoints.push({location: parts[i][j], stopover: false});


        // Service options
        var service_options = {
            origin: parts[i][0],
            destination: parts[i][parts[i].length - 1],
            waypoints: waypoints,
            unitSystem: google.maps.UnitSystem.METRIC,
            optimizeWaypoints: true,
            travelMode: 'DRIVING'
        };
        //computeTotalDistance(response);
        // Send request
        //alert(waypoints[i]);
        console.log(waypoints);


        
        service.route(service_options, service_callback);
       
       
      
    }



//////////////////////////////////////////////////////////////////////////////////////////

}



geos(stations1);
//geos(stations2);

  }
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOI_XEyajBcnT9v24GexmaDP34vHAXDZk&callback=initMap"></script>


</body>
</html>