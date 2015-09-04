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
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
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
        defaultColor: '#eec3c3'


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
                	<div class="intro-lead-in search-form col-md-6 col-md-offset-3">Rentra entre particulares</div>
				</div>
				<div class="row search-form">	
					<div class="col-md-8">	
						<div class="input-group input-group-lg">
  							<span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
  							<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" aria-describedby="sizing-addon1">
							<input name="lat" id="lat" type="text" value=""  hidden>
			        		<input name="lng" id="lng" type="text" value=""  hidden>
						</div>
					</div>
					<div class="input-daterange" id="datePicker" >
					<div class="col-md-2">
				           <div class="form-group-lg">
				           		<div class="input-group input-append date " >
				           			<input type="text" class="form-control" name="fechainicio" placeholder="Inicio" >
				           			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				           		</div>
				           </div>
					</div> 
					<div class="col-md-2">
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
				    <div class="item-image">
				     <a href="<?php echo base_url().'autoanuncio/'; ?><?php echo $item['idCoche'];?>">
				      <img src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto1'];?>" height="220px" width="300px" style="border-radius: 5px;">
				      <p class="marca"><?php echo $item['Marca'];?>, <?php echo $item['Modelo'];?></p>
				      <span class='post-labels' style="margin-left:150px; margin-top:-220px;">
      				  <p style="width:130px;"><?=$item['Precio']?> / dia</p></span>
      				  <img class="perfil" src="<?php echo base_url(); ?>uploads/<?php echo $item['Perfil'];?>" height="50px" width="50px" style="border-radius: 5px;">
				      <p class="nombreperfilslider"><?php echo $item['Nombre']." ".$item['Apellido'] ;?></p>
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
                    <h2 class="section-heading">Lugares</h2>
                    <h3 class="section-subheading text-muted">Encuentra el mejor auto para ti.</h3>
                </div>
            </div>
        <div class="row">
	        <div class="col-md-6" style="height:500px" id="chart_div" ></div>
	        <div class="col-md-6" > 
	        <h4 class="col-md-offset-5">Los Mejores Autos</h4>
	        <br>
	        <br>
	        <p  style="align:justify;" > Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tincidunt enim ut sodales commodo. Quisque aliquet tempus tellus, a imperdiet lectus. Integer risus arcu, venenatis vitae libero nec, porta cursus metus. Etiam a dui eu ipsum tempor posuere id non neque. Vivamus in mauris metus. Praesent sit amet rutrum eros, id imperdiet risus. Aenean placerat, nulla sit amet faucibus finibus, ex nisi maximus neque, vel pretium sapien sapien venenatis ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed consectetur imperdiet felis, at facilisis orci dapibus ac. Cras vitae est non nulla consectetur semper vel non lacus.

Mauris et risus tellus. Pellentesque at lorem augue. Phasellus lacinia elit at finibus sollicitudin. Mauris congue neque vel velit sagittis, a porttitor nibh dapibus. Proin at convallis urna, nec auctor ligula. Duis eleifend aliquet ante ut efficitur. Curabitur pellentesque non urna ac sodales. Duis tempor pharetra ullamcorper.

Curabitur pellentesque maximus leo, ac porta odio aliquet nec. Aenean rutrum vitae enim quis ornare. Maecenas porta, dolor vitae sollicitudin convallis, lectus odio semper augue, ac pulvinar tellus arcu ac est. Aenean ac aliquet magna. Sed in fermentum mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur ultricies quis mi vel porttitor.
			 </p>
	        </div>
        </div>
        </div>
    </section>
    <section id="pasos" class="bg-light-gray">
    	<div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Es muy fácil ganar dinero</h2>
                    <h3 class="section-subheading text-muted">En menos de unos minutos ya estas ganando dinero.</h3>
                </div>
            </div> 
            <div class="row text-center">
            	<img src="<?php echo base_url(); ?>img/PasosTomatucar.png">
            </div>   	
            <div class="row text-center">
            </div>  	
    	</div>
    </section>
    <section id="simulador" class="bg-light-white">
    	<div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2 class="section-heading">Esto es lo que puedes ganar</h2>
                    <h3 class="section-subheading text-muted" style="margin-bottom: 5px">Simula el costo de tu coche y recupera tu inversión.</h3>
                </div>
            </div> 
  	
            <div class="text-center">
    <div class="list-group">
            <h5><p>Precio de compra de tu coche: <span id="ex1CurrentSliderValLabel" ><span id="valSliderAuto" >50,000</span>$</span></p></h5>
            <input id="valorAuto" type="text" data-slider-min="50000" data-slider-max="1000000" data-slider-step="25000" data-slider-value="1"/> 
            <br>
            <h5><p> Puedo rentar mi coche: <span id="ex2CurrentSliderValLabel"><span id="valSliderDias">1</span><span> dia(s) por mes</span></span></p></h5>
            
            <input id="Ndias" type="text" data-slider-min="1" data-slider-max="30" data-slider-step="1" data-slider-value="1"/>
            
       </div><!--aqui termina list group-->  

       <div id="valor">
            <h5><span id="ex3CurrentSliderValLabel" >¡TU GANAS HASTA! :<span id="resulTotal">1500</span><span>$ por año</span></h5>
      </div>          
         
            </div>  	
    	</div>
    </section>
<div class="bandaAzul">
  <div class="container">
      <ul class="listaV">
        <li id="primero"><a href="porqueTomatucar.html">¿Por qué TomatuCAR?</a></li>
        <li><a href="contratoR.html">Contrato de renta</a></li>
        <li><a href="tcondiciones.html">Términos y condiciones</a></li>
        <li><a href="preguntasf.html">F.A.Q.</a></li>
        <li><a href="contacto.html">Contáctanos</a></li>
        </ul>
      <div id="redesS">
        <ul>
        <li><a href=""><img src="<?php echo base_url(); ?>img/facebook.png" height="20px" width="30px" alt=""></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>img/twiter.png" height="20px" width="30px" alt=""></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>img/google.png" height="20px" width="30px" alt=""></a></li>
        </ul>
      </div>  
  </div>  
</div>
</body>

</html>
	<script type="text/javascript">
	$('#direccion').bind('keydown', function(e) {
	    if (e.keyCode == 13) {
	        e.preventDefault();
	    }
	});
    // When the document is ready
    	$(document).ready(function () {
        	$('.input-daterange').datepicker({
                    todayBtn: "linked"
            });     
	initialize();
function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('direccion')),
      { types: ['geocode'] });

  	//se agrega la funcion para que se autocomplete la direcci�n
   google.maps.event.addListener(autocomplete, 'place_changed', function() {
	    var place = autocomplete.getPlace();
	    if (!place.geometry) {
	      return;
	    }
	    else
	    {
	    	document.getElementById('lat').value = place.geometry.location.lat();
	    	document.getElementById('lng').value = place.geometry.location.lng();
	    }  	
	});

}         
            });
				$(document).ready(function(){
				  $('.your-class').slick({
				  	  infinite: true,
					  slidesToShow: 3,
					  slidesToScroll: 1,
					  autoplay: true,
					  autoplaySpeed: 4000,
				  });
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
      $(document).ready(function() { //funcion para el 2° input radius
        
      
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