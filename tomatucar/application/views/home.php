    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <link href="<?php echo base_url(); ?>formvalidation/dist/css/formValidation.css" rel="stylesheet"/>
    <script src="<?php echo base_url(); ?>formvalidation/dist/js/formValidation.js"></script>	
    <script src="<?php echo base_url(); ?>formvalidation/dist/js/framework/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/busquedavalidation.js"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
	
	<!--Slick Carrousell-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/slick.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/slick-theme.css"/>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/slick.min.js"></script>
	
	<!--Slider-->
	<script src="<?php echo base_url(); ?>js/bootstrap-slider.js"></script>
	<link href="<?php echo base_url(); ?>css/bootstrap-slider.css" rel="stylesheet">
	
<!--Map-->	
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    
    <style>
		#chart_div path:nth-child(1),#chart_div path:nth-child(2),#chart_div path:nth-child(3),#chart_div path:nth-child(4), 
		#chart_div path:nth-child(5),#chart_div path:nth-child(6),#chart_div path:nth-child(7),#chart_div path:nth-child(8),
		#chart_div path:nth-child(25),#chart_div path:nth-child(28),#chart_div path:nth-child(29),#chart_div path:nth-child(30),
		#chart_div path:nth-child(31),#chart_div path:nth-child(32),#chart_div path:nth-child(33),#chart_div path:nth-child(34),
		#chart_div path:nth-child(35),#chart_div path:nth-child(36),#chart_div path:nth-child(38),#chart_div path:nth-child(39),
		#chart_div path:nth-child(40),#chart_div path:nth-child(41),#chart_div path:nth-child(42),#chart_div path:nth-child(43),
		#chart_div path:nth-child(44),#chart_div path:nth-child(45),#chart_div path:nth-child(46),#chart_div path:nth-child(49),
		#chart_div path:nth-child(50),#chart_div path:nth-child(51),#chart_div path:nth-child(52),#chart_div path:nth-child(54),
		#chart_div path:nth-child(56),#chart_div path:nth-child(57),#chart_div path:nth-child(59),#chart_div path:nth-child(60),
		#chart_div path:nth-child(94),
		#chart_div path:nth-child(61),#chart_div path:nth-child(63),#chart_div path:nth-child(64),#chart_div path:nth-child(65),
		#chart_div path:nth-child(66),#chart_div path:nth-child(68),#chart_div path:nth-child(69),#chart_div path:nth-child(71),
		#chart_div path:nth-child(72),#chart_div path:nth-child(73),#chart_div path:nth-child(76),#chart_div path:nth-child(77),
		#chart_div path:nth-child(78),#chart_div path:nth-child(80),#chart_div path:nth-child(81),#chart_div path:nth-child(83),
		#chart_div path:nth-child(84),#chart_div path:nth-child(85),#chart_div path:nth-child(86),#chart_div path:nth-child(87),#chart_div path:nth-child(88),
		#chart_div path:nth-child(90),#chart_div path:nth-child(91),#chart_div path:nth-child(92),#chart_div path:nth-child(93),
		#chart_div path:nth-child(95),#chart_div path:nth-child(96),#chart_div path:nth-child(97),#chart_div path:nth-child(99),
		#chart_div path:nth-child(101),#chart_div path:nth-child(102),#chart_div path:nth-child(104)
		{
		    display:none;
		
		} 
    </style>
    
    <script type='text/javascript'>
     google.load('visualization', '1', {'packages': ['geochart']});
     google.setOnLoadCallback(drawMarkersMap);

      function drawMarkersMap() {
      var data = google.visualization.arrayToDataTable([
   	
        ['Ciudad',   'Autos'],
 <?php foreach ($ciudades as $item): ?>  
        [<?php echo "'". $item['Estado']."'";?>,      <?php echo $item['Autos'];?>],
<?php endforeach; ?>
      ]);

      var options = {
        region: 'MX',
        'resolution':'provinces',
        colorAxis: {colors: ['#c7ffef', '#4f9d97']},
        defaultColor: '#eec3c3',
        magnifyingGlass:{enable: true, zoomFactor: 7.5}


      };

      var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
      chart.draw(data, options);
	 
	 google.visualization.events.addListener(chart, 'select', selectHandler);

	 function selectHandler(e) {
	 var selection = chart.getSelection();
var message = '';
  for (var i = 0; i < selection.length; i++) {
    var item = selection[i];
    if (item.row != null && item.column != null) {
      var str = data.getFormattedValue(item.row, item.column);
      message +=  str + '\n';
    } else if (item.row != null) {
      var str = data.getFormattedValue(item.row, 0);
      message +=  str + '\n';
    } else if (item.column != null) {
      var str = data.getFormattedValue(0, item.column);
      message += str + '\n';
    }
  }
  if (message == '') {
    message = 'nothing';
  }
  	
    var geocoder =  new google.maps.Geocoder();
    geocoder.geocode( { 'address': message+", Mexico"}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
          	document.getElementById('direccion').value = message+",Mexico"; 
          	document.getElementById('lat').value = results[0].geometry.location.lat(); 
          	document.getElementById('lng').value = results[0].geometry.location.lng();  
          	document.getElementById("busquedainicioform").submit();
          }
     });
}
};

    </script>   
    <!-- Header -->
    <header style="margin-top: -20px">
        <div class="container">
            <div class="intro-text">
            	<form id="busquedainicioform" method="post" action="<?php echo base_url(); ?>buscador"> 
            <div class="row">
                	<b><div class="intro-lead-in search-form col-md-10" style="font-size: 40px; font-style: normal; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; text-align: left">RENTA DE COCHE ENTRE PARTICULARES</div></b>
						                    <!-- David Vara 27/07 - A�adir slogan -->
                  <b><div class="intro-lead-in search-form col-md-10" style="font-size: 20px; color:#aaa; font-style: normal;
                   font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; text-align: left;
                   margin-top: -15px; padding-top: 0px; padding-bottom: 0px;">M&aacute;s f&aacute;cil, m&aacute;s econ&oacute;mico y cerca de ti</div></b><br>
				</div>
				<div class="row search-form">	
					<div class="col-md-8">	
 							<div style="text-align:left !important;" >
								<label id="ex3CurrentSliderValLabel" >&iquest;Donde buscas vehiculo?</label>
							</div>
							<div class="input-group input-group-lg">
  								                <!-- Boton de buscador -->
					  			<span class="input-group-btn">
					              <button type="submit" class="btn btn-default"  style="background-color: #EEE;">
					                <span class="glyphicon glyphicon-search"></span>
					              </button>
					              </span>
  								<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direcci&oacute;n" aria-describedby="sizing-addon1">
							<input name="lat" id="lat" type="text" value=""  hidden>
			        		<input name="lng" id="lng" type="text" value=""  hidden>
							<input type="hidden" name="estadodireccion" id="estadodireccion" value="">						
						</div>
					</div>
					<div class="input-daterange" id="datePicker" >
					<div class="col-md-2">
							<label id="ex3CurrentSliderValLabel" for="fechainicio">Entrega</label>
				           <div class="form-group-lg">
				           		<div class="input-group input-append date " >
				           			<input type="text" class="form-control" name="fechainicio" placeholder="Inicio" >
				           			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				           		</div>
				           </div>
					</div> 
					<div class="col-md-2">
							<label id="ex3CurrentSliderValLabel" for="fechainicio">Devolución</label>
				           <div class="form-group-lg">
				           		<div class="input-group input-append date" >
				           			<input type="text" class="form-control" name="fechafin" placeholder="Fin" >
				           			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				           		</div>
				           </div>
					</div> 
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="page-scroll btn btn-xl" name="botonbuscar" id="botonbuscar" >Buscar</button>
				</div>
				</form> 
                <br>
                
	
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container">

            <div class="row">
				<div class="your-class">
<?php foreach ($coches as $item): ?>	
				    <div class="item-image" style="width: 300px; margin-left:45px;margin-right:45px;">
				     <a href="<?php echo base_url().'autoanuncio/'; ?><?php echo $item['idCoche'];?>">
				      <img src="<?php echo base_url(); ?>uploads/<?php echo ($item['Foto1']>""? $item['Foto1'] :($item['Foto2']>""? $item['Foto2'] : $item['Foto3']));?>"
               				height="220px" width="300px" style="border-radius: 5px;">
				      <p class="marca"><?php echo $item['Marca'];?>, <?php echo $item['Modelo'];?></p>
				      <span class='post-labels' style="margin-left:150px; margin-top:-220px;">
      				  <p style="width:130px;"><?=$item['Precio']?> / dia</p></span>
      				  <img class="perfil" src="<?php echo base_url(); ?>uploads/<?php echo $item['Perfil'];?>" height="50px" width="50px" style="border-radius: 5px;">
				      <p class="nombreperfilslider"><?php echo $item['Nombre'];?></p>
				      <p class="direccionslider"><?php echo substr($item['Direccion'],0,30);?>...</p>
				     </a>
				    </div>
<?php endforeach; ?>
				</div>
            </div>

        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="services" class="bg-light-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" id="ex3CurrentSliderValLabel" style="font-size: 36px">TomatuCAR la nueva comunidad de movilidad inteligente</h2>
                </div>
            </div>
        <div class="row">
        	<div class="col-md-6"><h4>Encuentra los vehículos menos caros, más cercanos
y más divertidos de toda la republica mexicana</h4></div>	
			<div class="col-md-6">
				<h4 class="col-md-offset-4">Los Mejores Autos</h4>
				<br>
				<?php if($this->session->userdata('nombre')){?>
				<div><a href="<?php echo base_url(); ?>auto"class="btn btn-primary btn-lg col-md-offset-3" role="button"><strong>¡Gana dinero ya!</strong></a></div>
	    <?php }else{ ?>
				<div><a href="<?php echo base_url(); ?>registro"class="btn btn-primary btn-lg col-md-offset-3" role="button"><strong>¡Gana dinero ya!</strong></a></div>
		<?php } ?>	
	        	</div>
            </div>
        </div>
        <div class="row">
	        <div class="col-md-6" style="height:400px; padding-top: -50px" id="chart_div" ></div>
	        <div class="col-md-6" > 
	        <br>
     <div id="lista3">
     	<a class="pull-left">
              <img src="img/1.png" alt="Vuelve al inicio" class="img-responsive" class="img-rounded" width="40px" height="40px">
           </a>
           <div class="media-body" id="item2">
             <h5  class="media-heading" > Puedes usar las redes sociales como Facebook, twitter. Si una persona da un clic en el link en tu muro y se registra en el sitio TomatuCAR, ya eres su padrino durante un año y ganas 5% de todas sus rentas sin hacer nada más.</h5>
           </div>

           <a class="pull-left">
              <img src="img/2.png" alt="Vuelve al inicio" class="img-responsive" class="img-rounded" width="40px" height="40px">
           </a>
           <div class="media-body" id="item2">
             <h5  class="media-heading" > Puedes mandar un mail a tus amigos, si abren el sitio a partir de tu mail ya eres sus padrino!</h5>
           </div>

           <a class="pull-left">
              <img src="img/3.png" alt="Vuelve al inicio" class="img-responsive" class="img-rounded" width="40px" height="40px">
           </a>
           <div class="media-body" id="item2">
             <h5  class="media-heading" > Cuando tu ahijado se inscribe en el sitio, tiene la posibilidad de agregar tu mail y así hacer de usted su padrino para que  ganes 5% de todas sus rentas durante un año.</h5>
           </div>
	</div><!-- aqui termina la lista -->
	        </div>
        </div>
        </div>
    </section>
    <section id="pasos" class="bg-light-gray">
    	<div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" id="ex3CurrentSliderValLabel" style="font-size: 36px">¡Con tomatuCAR todos salimos ganando!</h2>
                    <h3 class="section-subheading text-muted">En menos de unos minutos ya estas ganando dinero.</h3>
                </div>
            </div> 
            <div class="row text-center">
            	<img src="<?php echo base_url(); ?>img/PasosTomatucar.png">
            	
            </div>   	
            <div class="row text-center">
            	<a href="<?php echo base_url(); ?>auto" class="page-scroll btn btn-xl" style="border-radius: 80px; border-color: #000000">Poner en renta tu auto</a>
            </div>  	
    	</div>
    </section>
    <section id="simulador" class="bg-light-white">
    	<div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2 class="section-heading" id="ex3CurrentSliderValLabel" style="font-size: 36px">¡Esto es lo que puedes ganar!</h2>
                </div>
            </div> 
  			<div class="row">
  				<div class="col-md-6 text-center" >
  					<h4>Simula el costo de tu coche y recupera tu inversión.</h4>
	  				<div id="valor">
	            		<h4><span id="ex3CurrentSliderValLabel" >¡TU GANAS HASTA! :<span id="resulTotal">1500</span><span>$ por año</span></h4>
	      			</div> 
  				</div>
  				<div class="col-md-6 text-center" >
  					<div class="list-group" style="border-left: 1px solid rgb(221, 221, 221);">
			            <h5><p>Precio de compra de tu coche: <span id="ex1CurrentSliderValLabel" ><span id="valSliderAuto" >50,000</span>$</span></p></h5>
			            <input id="valorAuto" type="text" data-slider-min="50000" data-slider-max="1000000" data-slider-step="25000" data-slider-value="1"/> 
			            <br>
			            <h5><p> Puedo rentar mi coche: <span id="ex2CurrentSliderValLabel"><span id="valSliderDias">1</span><span>dia(s) al mes</span></span></p></h5>
			            
			            <input id="Ndias" type="text" data-slider-min="1" data-slider-max="30" data-slider-step="1" data-slider-value="1"/>
			            
		       		</div><!--aqui termina list group-->  
  				</div>
  			</div>
          	
    	</div>
    </section>
</body>

</html>
	<script type="text/javascript">
				$(document).ready(function(){
				  $('.your-class').slick({
				  	  infinite: true,
					  slidesToShow: 3,
					  slidesToScroll: 1,
					  autoplay: true,
					  autoplaySpeed: 4000,
				  });
				});  
				
    // When the document is ready
    	$(document).ready(function () {
        	$('.input-daterange').datepicker({
                    todayBtn: "linked"
            });     
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
	    if (!place.geometry) {
	    	isreal=false;
	      return;
	    }
	    else
	    {
	    	document.getElementById('lat').value = place.geometry.location.lat();
	    	document.getElementById('lng').value = place.geometry.location.lng();
			isreal=true;	    
	    }  	
	}); 
	$("input").focusin(function () {
        $(document).keypress(function (e) {
            if (e.which == 13) {
           		if(isreal==true)
						{document.getElementById("busquedainicioform").submit();}

					else{
            	e.preventDefault();  
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
                    	document.getElementById("busquedainicioform").submit();
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
            
        </script>
  <script type='text/javascript'>
      $(document).ready(function() {// funcio para el primer input radius
      
      $("#valorAuto").slider(); //con este codigo creo un elemento de entrada
      $("#valorAuto").on('slide', function(slideEvt) {
        $("#valSliderAuto").text(slideEvt.value);
      });     

      });
    </script>
    <script type='text/javascript'>
      $(document).ready(function() { //funcion para el 2Â° input radius
        
      
      $("#Ndias").slider();//con este codigo creo un elemento de entrada
      $("#Ndias").on('slide', function(slideEvt) { //con este codigo creo la funcion que va a responder a un evento
        $("#valSliderDias").text(slideEvt.value); //con este codigo muestro el valor en el label
      });     

      });
    </script>


    <script type'text/javascript'>
    $(document).ready(function(){// funcion que realiza el calculo y lo muestra en un label

      var actualiza = function() {
            $('#resulTotal').text((valorAutos.getValue()) / 400 * (ndias.getValue()) * 12);
          };
        
      
      var valorAutos = $("#valorAuto").slider().on('slide',actualiza).data('slider');
      var ndias= $("#Ndias").slider().on('slide',actualiza).data('slider');
      
    
    });//termina la funcion ready
    </script> 