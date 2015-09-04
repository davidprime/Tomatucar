$(document).ready(function() {
	//map es la variable con la que se genera el mapa
    var map;
    
    //latitud por default del mapa, puede ser cualquiera
    var myLatlng = new google.maps.LatLng(32.50785, -116.97946);
    
    //funcion que se llama para iniciar la creaci�n del mapa
    //esta funci�n puede o no traer el par�metro.
    map_initialize(myLatlng);

	var componentForm = {
  		street_number: 'short_name',
  		route: 'long_name',
  		locality: 'long_name',
  		administrative_area_level_1: 'long_name',
  		country: 'long_name',
  		postal_code: 'short_name'
	};

	    
function map_initialize(mapCenter){

	//se crea la variable marker, la cual contendra el marcador con el que se define la ubiaci�n 
	//del coche 
    var marker;
    
	//Opciones de google maps
	var googleMapOptions = 
	{ 
		center: mapCenter, // map center
		zoom: 15, //zoom level, 0 = earth view to higher value
		panControl: false, //enable pan Control
		zoomControl: true, //enable zoom control
		zoomControlOptions: {
		style: google.maps.ZoomControlStyle.SMALL //zoom control size
		},
		scaleControl: true, // enable scale control
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	
	//aqui creamos el mapa, se busca el id del div que lo contrendr� y las opci�nes del mapa que 
	//declaramos anteriormente
	 map = new google.maps.Map(document.getElementById("map_canvas"), googleMapOptions);
	 
	//asignamos el autocomplete de google
  	 var autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('direccion')),
      { types: ['geocode'] });
	
  	///function
  	//se agrega la funcion para que se autocomplete la direcci�n
   google.maps.event.addListener(autocomplete, 'place_changed', function() {
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      return;
    }
    else
    {
    	fillInAddress(autocomplete);
    }

    // Si el lugar tiene una geometr�a entonces se presenta en el mapa.
    if (place.geometry.viewport) {
 
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  
    }
    //si el marcador existe entonces solo se actualiza su lugar y el mapa
    if(marker)
    {
    	marker.setPosition(place.geometry.location);
    	marker.setVisible(true);
    	populateInputs(place.geometry.location);    	
    }
    //si el lugar no existe entonces se crea el marcador
    else
    {
    	marker = new google.maps.Marker({
	 		map: map,
			draggable:false, //set marker draggable 
			animation: google.maps.Animation.DROP, //bounce animation
			icon: "img/pin_green.png" //custom pin icon
     	});    	
     	marker.setPosition(place.geometry.location);
     	marker.setVisible(true);
    	populateInputs(place.geometry.location);
    }


  	
	});
	function populateInputs(pos) {
		document.getElementById("lat").value=pos.lat();
        document.getElementById("lng").value=pos.lng();
    }
    //##### drop a new marker on click ######
	function placeMarker(location) {
    	if (marker) {
        	marker.setPosition(location);
        }
        else{
	        marker = new google.maps.Marker({
	     	position: location, //map Coordinates where user right clicked
		 	map: map,
			draggable:false, //set marker draggable 
			animation: google.maps.Animation.DROP, //bounce animation
			icon: "img/pin_green.png" //custom pin icon
	     	});
        }
       	populateInputs(location);
    }

	function fillInAddress(autocomplete) {
	  // Get the place details from the autocomplete object.
	  var place = autocomplete.getPlace();
		
	  // Get each component of the address from the place details
	  // and fill the corresponding field on the form.
	  for (var i = 0; i < place.address_components.length; i++) {
	    var addressType = place.address_components[i].types[0];
	    if (componentForm[addressType]) {
	      var val = place.address_components[i][componentForm[addressType]];
	      document.getElementById(addressType).textContent = val;
	      if(addressType == "administrative_area_level_1")
	      {
	      	document.getElementById("estadodireccion").value = val;
	      }
	    }
	  }
	}    
    
}
});