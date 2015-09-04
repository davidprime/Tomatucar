	 var map;
     var markers = [];
     var base_url = window.location.origin+"/tomatucardev/";
	//map es la variable con la que se genera el mapa

    
    //latitud por default del mapa, puede ser cualquiera
    var Lat = document.getElementById("lat").value;
    var Lng = document.getElementById("lng").value;
    if(Lat == "")
    {
   		Lat = 19.432608;
   		Lng = -99.133208;
    }
    var myLatlng = new google.maps.LatLng(parseFloat(Lat), parseFloat(Lng));
    //funcion que se llama para iniciar la creaci�n del mapa
    //esta funci�n puede o no traer el par�metro.
    map_initialize(myLatlng);
  
	function map_initialize(mapCenter){

	//se crea la variable marker, la cual contendra el marcador con el que se define la ubiaci�n 
	//del coche 
    var position;
    
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
	 
	position = new google.maps.Marker({
		map: map,
		point: mapCenter,
		draggable:false, //set marker draggable 
		animation: google.maps.Animation.DROP, //bounce animation
		icon: base_url+"img/icon-current-location.png" //custom pin icon
     });  
     	
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

    // Si el lugar tiene una geometr�a entonces se presenta en el mapa.
    if (place.geometry.viewport) {
 
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  
    }
    //si el marcador existe entonces solo se actualiza su lugar y el mapa
    if(position)
    {
    	position.setPosition(place.geometry.location);
    	position.setVisible(true);
    	populateInputs(place.geometry.location);    	
    }
    //si el lugar no existe entonces se crea el marcador
    else
    {
    	position = new google.maps.Marker({
	 		map: map,
			draggable:false, //set marker draggable 
			animation: google.maps.Animation.DROP, //bounce animation
			icon: "img/icon-current-location.png" //custom pin icon
     	});    	
     	position.setPosition(place.geometry.location);
     	position.setVisible(true);
    	populateInputs(place.geometry.location);
    }
	Actualizarbusqueda();
  	
	});
}
	function populateInputs(pos) {
		document.getElementById("lat").value=pos.lat();
        document.getElementById("lng").value=pos.lng();
    }

	window.setAllMap =function(map) 
	{
  		for (var i = 0; i < markers.length; i++) 
  			{markers[i].setMap(map);}
  
	}

	window.create_marker = function(Lat,Lng, MapTitle, MapDesc,  InfoOpenDefault, DragAble, Removable, Foto,Icono)
	{	
		var FotoURL= '<img style="margin-left: auto; margin-right: auto;" class="img-rounded img-responsive" width="120" height="80" src="'+Foto+'"></br>';
		bounds = new google.maps.LatLngBounds();
		bounds.extend(map.getCenter());
		var point 	= new google.maps.LatLng(parseFloat(Lat),parseFloat(Lng));
		bounds.extend(point);
		//new marker
		var marker = new google.maps.Marker({
			position: point,
			map: map,
			draggable:DragAble,
			animation: google.maps.Animation.DROP,
			title:MapTitle,
			icon: Icono
		});
		markers.push(marker);
		//Content structure of info Window for the Markers
		var contentString = $('<div class="marker-info-win">'+
		'<div class="marker-inner-win"><span class="info-content">'+
		'<h4 class="marker-heading">'+MapTitle+'</h4>'+
		MapDesc+'<br>'+
		FotoURL+
		'</span>'+
		'</div></div>');	
		
		
		//Create an infoWindow
		var infowindow = new google.maps.InfoWindow();
		//set the content of infoWindow
		infowindow.setContent(contentString[0]);

		//start panoramic view adding		

		google.maps.event.addListener( map, 'click', function() { 
    		infowindow.open( null, null ); 
		} );
	
		//add click listner open the infowindow	 
		google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker); // click on marker opens info window 
	    });
        		  
		if(InfoOpenDefault) //whether info window should be open by default
		{
		  infowindow.open(map,marker);
		}
		map.fitBounds (bounds);
		map.setCenter(bounds.getCenter());
		map.setZoom(map.getZoom()-2);	
					
	}
	window.deleteMarkers = function() 
	{	
  		setAllMap(null);
  		markers = [];  
	}
	window.Actualizarbusqueda = function()
      {
		 $.ajax({
                data: new FormData($('#multiselectForm')[0]),
                processData: false,
    			contentType: false,
                url:   base_url+'actualizarBusqueda',
                type:  'post',
                success:  function (response) 
                {
                	var container = $('#container');
                	if(response)
                	{
                		//alert(response);
                		container.html(response);
                		//$('#Busquedadiv').html(response);	
                		//NOTE TO SELF ASK IF LANGUAGES SHOULD BE INCLUDED IN EXTRAS.
                	}
                }
        });
      }
