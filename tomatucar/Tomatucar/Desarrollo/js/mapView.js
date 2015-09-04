    var myLatlng = null;
    var markers = [];
    var centerLatitude = null;
    var centerLongitude = null;
    var bounds = new google.maps.LatLngBounds();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, error);
    } else {
        alert('geolocation not supported');
    }
    function error(msg) {
        myLatlng = new google.maps.LatLng(32.50785, -116.97946);
        map_initialize(myLatlng);
    }
    function success(position) {

        myLatlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        centerLatitude = position.coords.latitude;
        centerLongitude = position.coords.longitude;
        document.getElementById("lat").value = centerLatitude;
        document.getElementById("lng").value = centerLongitude;
        map_initialize(myLatlng);
    }
    
    //Direction Service
    var directionsDisplay;
	var directionsService = new google.maps.DirectionsService();
	
	//############### Google Map Initialize ##############
	function map_initialize(mapCenter)
	{
	  directionsDisplay = new google.maps.DirectionsRenderer();
	  var mapOptions = {
	    zoom: 15,
	    center: mapCenter
	  }
	 // Create an array of styles.
	var styles = [
    	{
      	stylers: [
        	{ hue: "#00ffe6" },
        	{ saturation: -20 }
      	]
    	},{
      		featureType: "road",
      		elementType: "geometry",
      		stylers: [
        		{ lightness: 100 },
        		{ visibility: "simplified" }
      		]
    	},{
      		featureType: "road",
      		elementType: "labels",
      		stylers: [
        		{ visibility: "on" }
      		]
    	},{
    		featureType:"poi.business",
    		stylers: [
    			{visibility:"off"}
    		]
    	}
    	
  	];
  var styledMap = new google.maps.StyledMapType(styles,
    {name: "Styled Map"});
    
			var googleMapOptions = 
			{ 
				center: mapCenter, // map center
				zoom: 15, //zoom level, 0 = earth view to higher value
				mapTypeControl: false,
				zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL //zoom control size
			},
				scaleControl: true, // enable scale control
				mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
			};
		
		   	map = new google.maps.Map(document.getElementById("google_map"), googleMapOptions);			
			//Associate the styled map with the MapTypeId and set it to display.
  			map.mapTypes.set('map_style', styledMap);
 	 		map.setMapTypeId('map_style');
 	 		directionsDisplay.setMap(map);
			
		//Current Position
		var marker = new google.maps.Marker({
			position: mapCenter,
			map: map,
			animation: google.maps.Animation.DROP,
			icon:"icons/icon-current-location.png"
		});	
					
	}	
	//############### Get Markers Found ############

	//############### Calculate Route ##############
	function calcRoute(to) {
		
		if (navigator.geolocation)
		{
    		navigator.geolocation.getCurrentPosition(
        		function(position){
              		var posFrom = new google.maps.LatLng(centerLatitude,centerLongitude);
					var posTo = new google.maps.LatLng(to.position.lat(),to.position.lng());
  					var start = posFrom;
	  				var end = posTo;
  					var request = {
			    		origin:start,
      					destination:end,
			      		travelMode: google.maps.TravelMode.DRIVING
  					};
  					directionsService.route(request, function(response, status) {
			    	if (status == google.maps.DirectionsStatus.OK) {
    					directionsDisplay.setDirections(response);
    						var route = response.routes[0];
    						document.getElementById("results").innerHTML = "Distancia: " + route.legs[0].distance.text;
    					}
 			 		});
        		});
        		
		}
		else
		{
			window.alert('No se puede calcular la ruta, tu Navegador no soporta geolocalización');
		}
	}
	//Set markers
	function setMarkers(){
 		var Palabra = document.getElementById("srch-term").value;
 		var idEstado = document.getElementById("estado").value;
		var idCiudad = document.getElementById("ciudad").value;
		var latitude = document.getElementById("lat").value
		var longitude = document.getElementById("lng").value
		bounds = new google.maps.LatLngBounds();
		bounds.extend(map.getCenter());
		
		if(Palabra == "" && idEstado == 0)
		{
			document.getElementById("results").className = "alert alert-warning";
			document.getElementById("results").innerHTML = "Favor de ingresar un elemento de busqueda palabra y/o Estado";
		}
		else
		{		
			deleteMarkers();
			$.get("php/xmlfound.php",{palabra:Palabra, estado:idEstado, ciudad:idCiudad, lat:latitude, lng:longitude}, function (data,status) {
				count = 0;		
				$(data).find("marker").each(function () {
					count ++;
					var nombre 		= $(this).attr('nombre');
					var direccion 	= '<p>'+ $(this).attr('direccion')+'</p>';
					var point 	= new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('lng')));
					var Horario = '<span class="glyphicon glyphicon-calendar">: '+$(this).attr('horario')+'</span></br>';
					var Telefono ='<span class="glyphicon glyphicon-earphone">: '+$(this).attr('tel')+'</span></br>';
					var Referencia = '<span class="glyphicon glyphicon-map-marker">: '+$(this).attr('ref')+'</span></br>';
					var checkFoto = $(this).attr('foto');
					var categoria = $(this).attr('categoria');
					var icon = "http://www.gootit.com/icons/"+categoria+".png";
					if (checkFoto.length <= 1)
					{
						FotoUrl = 'uploads/default.png';
					}
					else
					{
						FotoUrl = $(this).attr('foto');
					}
					var Foto = '<img style="margin-left: auto; margin-right: auto;" class="img-rounded img-responsive" width="200" height="80" src="'+FotoUrl+'"></br>';
					bounds.extend(point);
					create_marker(point, nombre, direccion, false, false, false, icon,Horario,Telefono,Referencia,Foto);
				});
				
				if (count == 0)
				{
					document.getElementById("results").className = "alert alert-warning";
					document.getElementById("results").innerHTML = "0 lugares encontrados";
						
				}
				else if(count == 1)
				{
					document.getElementById("results").className = "alert alert-success";
					document.getElementById("results").innerHTML = "1 lugar encontrado";
					map.fitBounds (bounds);
					map.setCenter(bounds.getCenter());
					map.setZoom(map.getZoom()-1);	
					markerCluster = new MarkerClusterer(map, markers);				
				}
				else
				{
					document.getElementById("results").className = "alert alert-success";
					document.getElementById("results").innerHTML = count +" lugares encontrados";
					map.fitBounds (bounds);
					map.setCenter(bounds.getCenter());
					map.setZoom(map.getZoom()-1);	
					markerCluster = new MarkerClusterer(map, markers);			
				}

			});	
		 	
		}
	}				
	//############### Create Marker Function ##############
// Sets the map on all markers in the array.
function setAllMap(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
    markerCluster.removeMarker(markers[i]);
  }
  
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setAllMap(null);
  directionsDisplay.setDirections({routes: []});
	
}
function deleteMarkers() {
  clearMarkers();
  markers = [];
  
}
	function create_marker(MapPos, MapTitle, MapDesc,  InfoOpenDefault, DragAble, Removable, iconPath,Horario,Telefono,Referencia,Foto)
	{	  	  		  
		
		//new marker
		var marker = new google.maps.Marker({
			position: MapPos,
			map: map,
			draggable:DragAble,
			animation: google.maps.Animation.DROP,
			title:MapTitle,
			icon: iconPath
		});
		markers.push(marker);
		//Content structure of info Window for the Markers
		var contentString = $('<div class="marker-info-win">'+
		'<div class="marker-inner-win"><span class="info-content">'+
		'<h1 class="marker-heading">'+MapTitle+'</h1>'+
		MapDesc+
		Horario+
		Telefono+
		Referencia+'<br>'+
		Foto+
		'</span><button name="calculate-route" class="calculate-route" title="Calculate Route"><span class="glyphicon glyphicon-screenshot">IR/GO</span></button>'+
		'</div></div>');	
		
		
		//Create an infoWindow
		var infowindow = new google.maps.InfoWindow();
		//set the content of infoWindow
		infowindow.setContent(contentString[0]);

		//start panoramic view adding		

		google.maps.event.addListener( map, 'click', function() { 
    		infowindow.open( null, null ); 
		} );

		//finish panoramic view
		
		//Find remove button in infoWindow
		var calculateRouteBtn = contentString.find('button.calculate-route')[0];

		//add click listner to calculate the distance
		google.maps.event.addDomListener(calculateRouteBtn, "click", function(event) {
			calcRoute(marker);
		});
		
		//add click listner open the infowindow	 
		google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker); // click on marker opens info window 
	    });
        		  
		if(InfoOpenDefault) //whether info window should be open by default
		{
		  infowindow.open(map,marker);
		}
	}