$(document).ready(function() {
    var currentLat = document.getElementById("lat").value;
    var currentLng = document.getElementById("lng").value;
    var myLatlng = new google.maps.LatLng(currentLat, currentLng);
    map_initialize(myLatlng);
    var map;
function map_initialize(mapCenter){
	//Google map style
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
    
	//Google map option
	var googleMapOptions = 
	{ 
		center: mapCenter, // map center
		zoom: 15, //zoom level, 0 = earth view to higher value
		panControl: true, //enable pan Control
		zoomControl: true, //enable zoom control
		zoomControlOptions: {
		style: google.maps.ZoomControlStyle.SMALL //zoom control size
		},
		scaleControl: true, // enable scale control
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	 map = new google.maps.Map(document.getElementById("google_map"), googleMapOptions);	
	 var marker;
	 //Associate the styled map with the MapTypeId and set it to display.
  	map.mapTypes.set('map_style', styledMap);
 	 map.setMapTypeId('map_style');
 	 
 	 		//Current Position
		var marker = new google.maps.Marker({
			position: mapCenter,
			map: map,
			draggable:true,
			animation: google.maps.Animation.DROP,
			icon:"icons/pin_green.png"
		});	
		google.maps.event.addListener(marker, "drag", function (mEvent) {
        	populateInputs(mEvent.latLng);
         });
  
	function populateInputs(pos) {
		document.getElementById("lat").value=pos.lat()
        document.getElementById("lng").value=pos.lng();
    }
	google.maps.event.addListener(map, 'click', function(event) {	
		placeMarker(event.latLng);
	});
}
});