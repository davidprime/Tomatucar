<!--aqui termina el header de la pagina-->
  <?php
//Estos headers previene que el cache te permita ver la pagina
header("cache-Control: no-store, no-cache, must-revalidate");
header("cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

  ?>   
  <!-- Star Rating -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="<?php echo base_url(); ?>js/star-rating.js" type="text/javascript"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDnPDroLgoimf7Y6gJ3JHYrRPD7NwTxBIM&sensor=false&amp;libraries=places"/>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
	<style>
	body{
		padding-top: 50px;
	}
	.HeaderPad{
		background-color: rgba(126, 189, 98, 0.48);
	}
	::-webkit-scrollbar {
	    width: 12px;
	}
	 
	::-webkit-scrollbar-track {
	    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
	    border-radius: 10px;
	}
	 
	::-webkit-scrollbar-thumb {
	    border-radius: 10px;
	    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
	}

	.dropdown-image ul{

		background-color: #EEE;
		border: 5px solid #10A6CF;
		border-radius: 20px;

	}

	.dropdown-image img{
		width: 105px;
		height: 70px;
		margin: 5px;
		cursor:pointer;
	}

	.carousel-inner .item img{
		height: 170px;
		width: 100%;
		object-fit :cover;
		
	}
	.hoverBand
	{
		background-color: rgb(22, 222, 227);
		position: absolute;
		top: 0px;
		bottom: 0px;
		width: 0px;
		height: 100%;
		
		-webkit-transition-property: width;
		-moz-transition-property: width;
		-o-transition-property: width;
		transition-property: width;

		-webkit-transition-duration: .3s;
		-moz-transition-duration:.3s;
		-o-transition-duration:.3s;
		transition-duration: .3s;

	}

	.panel-body :hover .hoverBand
	{
		width: 12px;
	}








input[type=range] {
  -webkit-appearance: none;
  width: 100%;
}
input[type=range]:focus {
  outline: none;
}


input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 3.5px;
  cursor: pointer;
  background: #aaa;
}
input[type=range]::-webkit-slider-thumb {
  border: 1px solid #555;
  height: 14px;
  width: 15px;
  border-radius: 50px;
  background: #eee;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -5px;
}
input[type=range]:focus::-webkit-slider-runnable-track {
  background: #9e9d9f;
}


input[type=range]::-moz-range-track {
  width: 100%;
  height: 3.5px;
  cursor: pointer;
  background: #aaa;
}
input[type=range]::-moz-range-thumb {
  border: 0.1px solid #555;
  height: 14px;
  width: 15px;
  border-radius: 50px;
  background: #eee;
  cursor: pointer;
}


input[type=range]::-ms-track {
  width: 100%;
  height: 3.5px;
  cursor: pointer;
  background: #aaa;
}
input[type=range]::-ms-fill-lower {
  background: #aaa;
}

input[type=range]::-ms-fill-upper {
  background: #aaa;
}

input[type=range]::-ms-thumb {
  border: 0.1px solid #555;
  height: 14px;
  width: 15px;
  border-radius: 50px;
  background: #eee;
  cursor: pointer;
}
input[type=range]:focus::-ms-fill-lower {
  background: #aaa;
}
input[type=range]:focus::-ms-fill-upper {
  background: #aaa;
}




	</style>

	<!--scripts para date-->
	    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
		<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
		<script>
		  webshims.setOptions('waitReady', false);
		  webshims.setOptions('forms-ext', {types: 'date'});
		  webshims.polyfill('forms forms-ext');
		</script>
	<!--Fin del codigo para date-->
	<!--Script y css necesario para usar el dropdown con multiselect-->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-multiselect.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-multiselect.css" type="text/css"/>
    <!--Fin de multiselect-->
  <!--Scripts implementado para realizar la busqueda correspondiente con los parametros ingresados-->

  <script type="text/javascript">
	function GoToAuto()
	{
		<?php $this->session->set_userdata('loginRedirect',"perfil");  ?>
		window.location ='<?php echo base_url(); ?>auto';
	}
      function CheckDates(comparable,count)
      {
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();
		if(dd<10) {dd='0'+dd} 
		if(mm<10) {mm='0'+mm} 
		today = yyyy+'-'+mm+'-'+dd;
		var other = new Date(Date.parse(comparable));
		var today2 = new Date(Date.parse(today));
		if(other<today2)
		{
			//alert("Error");
			if(count==1)
			{$(FechaInicio).val(today);}
			else{$(FechaFin).val(today);}
		}
		else{
			PreActualizado();
			}
		
      }
      
      //FUNCIONES DEL PAGINADOR Y EL PRE ACTUALIZADO
      function PreActualizado()
      {
      	//Lo que hace esta funcion es reiniciar la posicion inicial del paginador a 0 antes de realizar la busqueda
      	//esto es necesario debido a que se usa como parametro en el query
      	document.getElementById("posinicial").value=0;
      	Actualizarbusqueda();
      }
      function Paginador(posinicio)
      {
      	if(posinicio==-1)//Para siguiente
      	{
      		posinicio=parseInt(document.getElementById("posinicial").value);
      		posinicio+=15;
      		document.getElementById("posinicial").value=posinicio;
      	}
      	if(posinicio==-2)//Para Anterior
      	{
      		posinicio=parseInt(document.getElementById("posinicial").value);
      		posinicio-=15;
      		document.getElementById("posinicial").value=posinicio;
      	}
      	if(posinicio>=0){document.getElementById("posinicial").value=posinicio;}
      	Actualizarbusqueda();
      	
      }
      function ActualizarPagina(nuevoInicio)
      {document.getElementById("posinicial").value=nuevoInicio; }
      //--------------------------------------------
     
  </script>
  
  <!--Script para el funcionamiento del enter en la barra de busqueda-->

  <script type="text/javascript">

    // When the document is ready
   	$(document).ready(function () { 

	initialize();
function initialize() {
	var isreal=false;
  // Create the autocomplete object, restricting the search
  // to geographical location types.
      var input = document.getElementById('direccion'); 
      
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('direccion')),
      { types: ['geocode'] });

  	//se agrega la funcion para que se autocomplete la direccion
   google.maps.event.addListener(autocomplete, 'place_changed', function() {
	    var place = autocomplete.getPlace();
	    if (!place.geometry) 
	    {
	    	//alert("Wrong, this place does not exist");
	    	//alert("LAT="+document.getElementById('lat').value + " LNG="+document.getElementById('lng').value);
	    	isreal=false;
	    	  return;
	    }
	    else
	    {
	    	isreal=true;
	    	document.getElementById('lat').value = place.geometry.location.lat();
	    	document.getElementById('lng').value = place.geometry.location.lng();
	    }  	
	}); 
	
	$("input").focusin(function () {
        $(document).keypress(function (e) {
            if (e.which == 13) {
            	
            
           		if(isreal==true)
				{PreActualizado();}

				else{
            	e.preventDefault();  
            	$(".pac-container").hide();  
            	var firstResult = $(".pac-container .pac-item:first").text();   
            	var stringMatched = $(".pac-container .pac-item:first").find(".pac-item-query").text(); 
            	firstResult = firstResult.replace(stringMatched, stringMatched + " ");        
                	 var geocoder = new google.maps.Geocoder();
       			 geocoder.geocode({"address":firstResult }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK)
            		 {
                var lat = results[0].geometry.location.lat(),a
                    lng = results[0].geometry.location.lng(),
                    placeName = results[0].address_components[0].long_name,
                    latlng = new google.maps.LatLng(lat, lng);
                    document.getElementById('direccion').value= firstResult;
                  //  console.log (""); //TESTING NAME OF CITY RETRIEVAL
                    if(document.getElementById('lat').value == lat && document.getElementById('lng').value == lng)
                    {
	                    if (results[0]) 
	                    {
		                    var add= results[0].formatted_address ;
		                    var  value=add.split(",");
		                    count=value.length;
		                    city=value[count-3];
		                    if(!city)
		                    {document.getElementById("estadodireccion").value="Mexico";}
		                    else{ document.getElementById("estadodireccion").value=city }  
	               		 }
                    	PreActualizado();
                    }
                    else{
		                    document.getElementById('lat').value = lat;
			    			document.getElementById('lng').value = lng;
			    		}
			          }
			        });
			       }
                
            }
        });
    });
    $("input").focusout(function () {
            	$(".pac-container").hide();
            		var firstResult = $(".pac-container .pac-item:first").text(); 
            		var stringMatched = $(".pac-container .pac-item:first").find(".pac-item-query").text(); 
            		firstResult = firstResult.replace(stringMatched, stringMatched + " ");  
            		 var geocoder = new google.maps.Geocoder();
        geocoder.geocode({"address":firstResult }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var lat = results[0].geometry.location.lat(),
                    lng = results[0].geometry.location.lng(),
                    placeName = results[0].address_components[0].long_name,
                    latlng = new google.maps.LatLng(lat, lng);
                    document.getElementById('direccion').value= firstResult;
                    document.getElementById('lat').value = lat;
	    			document.getElementById('lng').value = lng;

            }
        });            

    });


} 
       
            });
 
 $(document).ready(function() 
{
$('.numbersOnly').keypress(function (evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        return true;
    } 
});
	console.log("loaded");


//Actualizar opciones seleccionadas
var tipos = $( "#Tipo" ).val() || [];

//Determinar las imágenes de los botones del dropdown
function UpdateDropdownContent()
{
	$('#dropdown-container li img').each(function(i) 
	{ 
		//establecer prodiedad de src buscando modificar el número que tiene el nombre de la imagen
		this.src = this.src.substring(0,this.src.length -5) + 
		($.inArray($(this).attr("value"), tipos)>-1?"3":"1")+ // 3 es seleccionado, 1 es normal
		 ".png";

	});
}

//Para el boton que despliega el dropdown
$("#dropdown-button").on("show.bs.dropdown" , function()
{
	//Lista de tipos seleccionados
	tipos = $( "#Tipo" ).val() || [];
	//actualizar contenido
	UpdateDropdownContent();

	console.log("asd");
});

//Cierre del dropdown
$('#dropdown-button').on('hide.bs.dropdown', function () {
	PreActualizado();
});

//Click sobre las imagenes del dropdown
$( "#dropdown-container li img" ).click(function(e)
{
	//Evitar que el dropdown se cierre
	e.stopPropagation();

	//tipos seleccionados
	tipos = $( "#Tipo" ).val() || [];
	var index = $.inArray($(this).attr("value"), tipos);

	//si esta seleccionado, remover
	if(index>-1)
	{
		tipos.splice(index, 1);
		this.src = this.src.substring(0,this.src.length -5) +"1.png";
	}

	//de lo contrario, insertar
	else
	{
		tipos.push(index,$(this).attr("value"));
		this.src = this.src.substring(0,this.src.length -5) +"3.png";
	}

	$("#Tipo").val(tipos);

});


//Hover sobre las imagenes del dropdown
$('#dropdown-container li img').hover( 
	function()
	{
		tipos = $( "#Tipo" ).val() || [];
		//Si el tipo no esta seleccionado, colocar imagen de hover
		 if($.inArray($(this).attr("value"), tipos)==-1)
		 	this.src = this.src.substring(0,this.src.length -5) +"2.png";

	}, 
	function()
	{
		tipos = $( "#Tipo" ).val() || [];
	    //Si no esta seleccionado, colocar imagen normal
	    if($.inArray($(this).attr("value"), tipos)==-1)
	    	this.src = this.src.substring(0,this.src.length -5) +"1.png";
	}
	);
});
 
 
        </script>
  <!--/////////////////////////////////////////-->
	<div class="row HeaderPad">
		<div class="col-md-1">	</div>
		<div class="col-md-11">		
		<h4><font color="white">Renta de Coche entre particulares de Mexico</font></h4>
		</div>
	</div>
	<!--FORM-->	<form id="multiselectForm" role="search">
	<div class="row search-form HeaderPad">
		<div class="col-md-1">	</div>
			<div class="col-md-7">		
  				<div class="input-group input-group-lg ">
					<input type="text" class="form-control" value="<?php echo $Direccion; ?>" name="direccion" id="direccion"  placeholder="Direccion" size="75" >
					<input name="lat" id="lat" type="text" value="<?php echo $lat; ?>"  hidden>
			        <input name="lng" id="lng" type="text" value="<?php echo $lng; ?>"  hidden>

			     	<span class="input-group-btn">
			        <div class="btn btn-default" id="fechainicio_Hora_btn"  style="background-color: #EEE;" onclick="PreActualizado(); return false;">
			        	<span class="glyphicon glyphicon-search"></span>
			        </div>
			     	</span>


				</div>
			</div>
				<div class="input-daterange" id="datePicker" >
					<div class="col-md-2">
				           <div class="form-group-lg">
				           		<div class="input-group input-append date " >
								<input type="date" class="form-control" maxlength="20" size="18" value="<?php echo $fechai; ?>" id ="FechaInicio" name="FechaInicio" placeholder="Pickup" style="width: 4.5cm"  min="<?php echo date("Y-m-d"); ?>" onChange="CheckDates(this.value,1);" > 
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							    </div>
						   </div>
				    </div>
			   </div>
			   <div class="input-daterange" id="datePicker" >
					<div class="col-md-2">
				           <div class="form-group-lg">
				           		<div class="input-group input-append date " >
								<input type="date" class="form-control" maxlength="20" size="18" id="FechaFin" value="<?php echo $fechaf; ?>" name="FechaFin" placeholder="Return" style="width: 4.5cm"  min="<?php echo date("Y-m-d"); ?>" onChange="CheckDates(this.value,2); ">
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							    </div>
						   </div>
				    </div>
			   </div>
			   
	</div>
<div class="row HeaderPad" style="padding-bottom: 20px;">
	<div class="col-md-1"></div>	
	<div class="col-md-11" >
	
					<div class="col-md-3" style="padding-right: 0px; padding-left: 0px;">
					<div class="input-group">
					<span class="input-group-addon">Precio máximo por día</span><input type="range"  min="100" max="2000" class="form-control" name="precioS" id="precioS" value="2000" onChange="ValueText(this.value)" step="1"/>
					</div>
					</div>
					<div class="col-md-2" style="padding-right: 0px; padding-left: 0px;">
					<div class="input-group">
					<span class="input-group-addon">$</span><input type="text" name="PrecioT" class="numbersOnly form-control" id="PrecioT" value="2000" size="5" maxlength="4" onChange="ValueText(this.value)" />
					<span class="input-group-addon">al Día</span>
					</div>
					</div>
					<div class="col-md-5" style="padding-right: 0px; padding-left: 0px;">
						
						
<!-- Control de dropdown con imagenes -->
  <div class="dropdown dropdown-image" id="dropdown-button" data-toggle="dropdown" style="display:inline;">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tipo de Coche
    <span class="caret"></span></button>


	<ul class="dropdown-menu" id="dropdown-container" style="width:500px;">
		<li>
			<img src="<?php echo base_url(); ?>img/compacto1.png" value="1">
			<img  src="<?php echo base_url(); ?>img/sedan1.png" value="2">
			<img src="<?php echo base_url(); ?>img/convertible1.png" value="3">
			<img  src="<?php echo base_url(); ?>img/familiar1.png" value="4">

			<br>

			<img  src="<?php echo base_url(); ?>img/pickup1.png" value="5">
			<img  src="<?php echo base_url(); ?>img/todoterreno1.png" value="6">
			<img  src="<?php echo base_url(); ?>img/minivan1.png" value="7">
			<img src="<?php echo base_url(); ?>img/furgoneta1.png" value="8">

			<br>

			<img  src="<?php echo base_url(); ?>img/clasico1.png" value="9">
			<img  src="<?php echo base_url(); ?>img/deportivo1.png" value="10">
			<img  src="<?php echo base_url(); ?>img/otros1.png" value="11">

			 <div class="btn-group" role="group">
			<button type="button" class="btn btn-success" style="width:120px;"> Buscar! </button>
			</div>
		</li>
	</ul>
</div>

<!-- Ocultar este control, se coloca dentro de un div ya que bootstrap crea un elemento despues del select y es el que se muestra -->
					<div style="display:none;">
					 <select name="Tipo[]" id="Tipo" multiple >
						    <option value="1">compacto</option>
						    <option value="2">sedan</option>
						    <option value="3">convertible</option>
						    <option value="4">familiar</option>
						    <option value="5">pickup</option>
						    <option value="6">todoterreno</option>
						    <option value="7">minivan</option>
						    <option value="8">furgoneta</option>
						    <option value="9">clasico</option>
						    <option value="10">deportivo</option>
						    <option value="11">otros</option>
						</select>
					</div>
					
					
					<select name="Extras[]" id="Extras" multiple="multiple" size="17" onChange="PreActualizado();">
					    <option value="clima">Aire acondicionado</option>
					    <option value="direccionasistida">Direccion asistida</option>
					    <option value="velocidad">Regulador de velocidad</option>
					    <option value="gps">GPS</option>
					    <option value="silla">Sillitas niño</option>
					    <option value="cdmp3">Lector de CD/MP3</option>
					    <option value="auxiliar">Entrada de audio(aux)</option>
					    <option value="usb">USB</option>
					    <option value="bluetooth">Bluetooth</option>
					    <option value="alarma">Alarma</option>
					    <option value="remolque">Enganche remolque</option>
					    <option value="bolsas">Bolsas de Aire</option>
					    <option value="fumar">Permite Fumar</option>
					    <option value="mascota">Permite Mascota</option>
					    <option value="ingles">Habla ingles</option>
					    <option value="frances">Habla frances</option>
					    <option value="espanol">Habla portuguese</option>
					    <option value="aleman">Habla aleman</option>
					</select>
					</div>
					<input type="hidden" name="posinicial" id="posinicial" value="<?php echo $posinicio; ?>">
					<input type="hidden" name="estadodireccion" id="estadodireccion" value="">
<!--Scripts para funcionalidades de los elementos del form class="navbar-form navbar-left"  -->
<script type="text/javascript">
function ValueText(newValue)
{
	//document.getElementById("PrecioS").innerHTML="menos de "+newValue+"/dia";
	if(newValue>2000)
	{newValue=2000;}
	if(newValue<100)
	{newValue=100;}
	if(isNaN(newValue))
	{newValue=2000;}
	document.getElementById("PrecioT").value=newValue;
	document.getElementById("precioS").value=newValue;
	PreActualizado();
}
</script>
<script type="text/javascript">
    $(document).ready(function() {
    	
		    $('#Extras').multiselect({
		    SelectedText: 'selected',
		    nonSelectedText: 'Características',
		
		});
        $('#Tipo').multiselect({
    SelectedText: 'selected',
    nonSelectedText: 'Tipo de coche',

});
    });
</script>
<!--//////////////////////////////////////////////-->
		</div>
		</div>
</form>
<div class="row">
<div class="col-md-1">	</div>	
<div class="col-md-6" style="padding-right: 0px;">
<div id="container"><!--Este div se utiliza para actualizar la busqueda-->
<div style="overflow: auto; width: 100%; height: 500px">
<?php if($coches != ""): ?>
   <?php $markercount=-1;  foreach ($coches as $item): ?>	
<div class="panel panel-default" style="margin-bottom: 0px; height:170px">
			<?php $markercount++; ?>
			<div class="panel-body" onmouseenter="MarkerBounce(<?php echo $markercount; ?>);" onmouseleave="MarkerStopBounce(<?php echo $markercount; ?>);"  style="cursor:pointer; padding:0px;"> 	
		
				<div class="row" style="margin:0px">
				<div class="col-md-5" style="padding:0px"><!-- carousel-->
					<div id="carCarousel_<?php echo $item['IdCoche'];?>" class="carousel slide" data-interval="false" style="width:100%; height: 170px;background-color:#333">
						<!-- "Bolitas blancas" -->
						<ol class="carousel-indicators">
							<?php if($item['Foto1'] > ""):?>	
							<li data-target="#carCarousel_<?php echo $item['IdCoche'];?>" data-slide-to="0" class="active"></li>
							<?php endif; ?>	
							<?php if($item['Foto2'] > ""):?>	
							<li data-target="#carCarousel_<?php echo $item['IdCoche'];?>" data-slide-to="1"></li>
							<?php endif; ?>	
							<?php if($item['Foto3'] > ""):?>	
							<li data-target="#carCarousel_<?php echo $item['IdCoche'];?>" data-slide-to="2"></li>
							<?php endif; ?>	
						</ol>
						
						<!-- Items del carousel-->
						<div class="carousel-inner" role="listbox" onclick="location.href='<?php echo base_url(); ?>autoanuncio/<?php echo $item['IdCoche'];?>';">
							<div class="item active">
								<?php if($item['Foto1'] > ""):?>	
									<img  src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto1'];?>" class="img-responsive" >
								<?php else: ?>
									<img  src="<?php echo base_url(); ?>img/ford.jpg"  class="img-responsive" >
								<?php endif; ?>		
							</div>

							<?php if($item['Foto2'] > ""):?>	
								<div class="item">								
									<img  src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto2'];?>" class="img-responsive" >
								</div>
							<?php endif; ?>		


							<?php if($item['Foto3'] > ""):?>	
								<div class="item">								
									<img  src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto3'];?>" class="img-responsive" >
								</div>
							<?php endif; ?>		

						</div>
						
						<!-- Controles de izquierda y derecha, solo han de mostrarse si hay mas de una imagen disponible-->
						<?php if($item['Foto2'] > ""|| $item['Foto3']>""):?>
						<a class="left carousel-control" href="#carCarousel_<?php echo $item['IdCoche'];?>" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Anterior</span>
						</a>
						<a class="right carousel-control" href="#carCarousel_<?php echo $item['IdCoche'];?>" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Siguiente</span>
						</a>
						<?php endif; ?>


					<div onMouseOver class="left hoverBand"></div>

					</div>
				</div>
				<!--Contenido del auto--> 	
				<div class="col-md-7" onclick="location.href='<?php echo base_url(); ?>autoanuncio/<?php echo $item['IdCoche'];?>';">
					<div class="row">
						<div class="col-md-12">

							<div class="panel-heading" style="padding:0px; ">

								<h4 style="color:#2272C0; overflow:hidden; text-overflow:ellipsis; white-space: nowrap;"
								 title="<?=$item['Marca']?> <?=$item['Modelo']?>">
									<?=$item['Marca']?> <?=$item['Modelo']?>
								</h4>
								 <b><?=$item['Annio']?></b><span class="text-muted"><?php echo $item['Energia']>""?", Motor: ".$item['Energia'] : "";?></span>
									
								<span class='post-labels' style="margin-top:-5px; right:0px">
								<p style="width:130px;">$<?=$item['Precio']?> / dia</p></span>

								<br>
							</div>


							<div class="panel-footer" style="padding:0px; overflow:hidden; text-overflow:ellipsis; white-space: nowrap;"
							title="<?=$item['Direccion']?>">
								<span class="glyphicon glyphicon-map-marker"> </span>
								<?php echo $item['Direccion']; ?>
							</div>

							<div class="panel-heading" style="margin-top: 40px; padding: 0px; height: 50px;">
								<div class="col-md-6">

									 <input id="ratingd" value="<?php echo ($item['Evaluacion']>"" ? $item['Evaluacion'] :"5")?>" class="rating rating-loading" min="0" max="5" step="0.1" data-size="xs"
    								 data-show-clear="false" data-show-caption="false" disabled>

								</div>

								<div class="col-md-6">     

								</div>



							</div>

						</div>
					</div>
				</div>
				</div> 

			</div>
		</div>
	<?php endforeach; ?>
<?php else: ?>
	<h3> <?php echo($fueraDeRegion? "El servicio no esta disponible en esta region" : "No se encontraron resultados"); ?> </h3>
<?php endif ?>
<!--Enter PANEL TEMPLATE HERE  IMG TO USE=arrendador5.png  NOTA CHECA QUE AUTO ESTE VALIDADO PARA EL LOGIN-->
<div class="panel panel-default" style="margin-bottom: 0px;">
	<div class="panel-body" >
		<div class="row" >
			<div class="col-md-2"></div>
			<div class="col-md-10 col-sm-offset-2">
			<div><h4 style="color:#2272C0; overflow:hidden; text-overflow:ellipsis; white-space: nowrap; font-size: 23px;"><b>¿Tienes un coche en <?php if($ciudad!=""){echo $ciudad;} else{echo 'Mexico';} ?> ?</b></h4></div>
			</div>		
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<img src="<?php echo base_url(); ?>img/arrendador5.png" alt="..." width="160" height="130">
			</div>
			<div class="col-md-7" style="padding-left: 30px;  padding-top: 60px;">
				<button class="btn btn-primary" style="cursor:pointer; width:310px; font-size:1.3em; font-family:sans-serif; letter-spacing:.1em;"  onclick="GoToAuto();" >¡Registralo Ahora!</button>
			</div>
		</div>
	</div>
</div>
<!--End of PANEL TEMPLATE HERE   -->
</div>

<div class="row" style="padding-left: 15px;">
	<?php 
	$y=0;
	$count=0;
	$morepages=false;
		for($x=0;$x<$numAutos;$x+=15)
		{  $y++;
			$count++;
			if($x==0)
			{
	?> 
	<button onclick="Paginador(<?php echo $x; ?>)" class="btn btn-info"><?php echo $y; ?></button>
	
	<?php }else{?>
		<button onclick="Paginador(<?php echo $x; ?>)" class="btn btn-primary"><?php echo $y; ?></button>
	<?php 
				}
			if($count==4 && $x<$numAutos)
			{$morepages=true; break;}
		}
		
		if($morepages==true)
		{echo "...";}
	if(($numAutos-15)>0){
	?>
		<button onclick="Paginador(-1)" class="btn btn-primary">Siguiente</button>
	<?php } ?>
</div>
<!--Div de busqueda-->
   </div>
   </div>
           <!--MENU VERTICAL (MAPA)-->
	<div class="col-md-5" style="padding-left: 0px;  padding-top: 302px;">	

	 <div class="map_canvas" id="map_canvas" style="width:560px; height:500px;"></div>
	</div>
</div>
			<!--termina menu vertical (EL MAPA)-->






</div><!--termina contenido cuenta-->
</div><!--termina container-->

<!--LO DEMAS-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/mapbusqueda.js"></script><!--MAPA NO TOCAR-->
<script>deleteMarkers();</script>
<?php if($coches != ""): ?>
   <?php foreach ($coches as $item): ?>	
   	 <script>
         var lat="<?php echo $item['Lat']; ?>";
         var lng="<?php echo $item['Lng']; ?>";
         var titulo="<?php echo $item['Marca']; ?> "+"<?php echo $item['Modelo']; ?> "+"<?php echo $item['Annio']; ?> ";
         var Texto="$<?php echo $item['Precio']; ?>/dia "+" <?php echo $item['Descripcion']; ?>";
         var FotoLink="<?php echo $item['Foto1']; ?>";
         if(FotoLink=="")
         {FotoLink="<?php echo base_url(); ?>img/ford.jpg";}
         else{FotoLink="<?php echo base_url(); ?>uploads/<?php echo $item['Foto1']; ?>";}
         var icon ="<?php echo base_url(); ?>img/pin_green.png";
         
         create_marker(lat,lng, titulo,Texto,false, false, false,FotoLink,icon);

</script>
   <?php endforeach; ?>
<?php endif ?>