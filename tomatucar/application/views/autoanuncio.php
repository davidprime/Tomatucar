
<?php

header("cache-Control: no-store, no-cache, must-revalidate");
header("cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

//Eliminar cookie para redirigir
$this->session->unset_userdata('loginRedirect');

?>


<link href="<?php echo base_url(); ?>formvalidation/dist/css/formValidation.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>formvalidation/dist/js/formValidation.js"></script>	
<script src="<?php echo base_url(); ?>formvalidation/dist/js/framework/bootstrap.min.js"></script>
    
<script src="<?php echo base_url(); ?>js/autoanunciovalidations.js"></script>

<!-- Star Rating -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="<?php echo base_url(); ?>js/star-rating.js" type="text/javascript"></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>


<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDnPDroLgoimf7Y6gJ3JHYrRPD7NwTxBIM&sensor=false&amp;libraries=places"><script src="<?php echo base_url(); ?>js/jquery.geocomplete.js"></script>



<script>
	
	$(document).ready(function() {
		
    var currentLat = document.getElementById("Lat").value;
    var currentLng = document.getElementById("Lng").value;
    var myLatlng = new google.maps.LatLng(currentLat, currentLng);
    map_initialize(myLatlng);
    var map;
    
function map_initialize(mapCenter){
	//Google map style
	 // Create an array of styles.

 
    
	//Google map option
	var googleMapOptions = 
	{ 
		center: mapCenter, // map center
		zoom: 15, //zoom level, 0 = earth view to higher value
		zoomControl: true,
 		 scaleControl: false,
  		scrollwheel: false,
  		disableDoubleClickZoom: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	
	 map = new google.maps.Map(document.getElementById("google_map"), googleMapOptions);
	 	
	 var marker;
	 //Associate the styled map with the MapTypeId and set it to display.

 	 
 	 		//Current Position
		var marker = new google.maps.Marker({
			position: mapCenter,
			map: map,
			draggable:false,
			animation: google.maps.Animation.DROP,
			icon: document.getElementById("base_url").value+"/img/pin_green.png"
		});	
		
}
});


 //Obtener fechas reservadas
var fechasReservadas = <?php echo '["' . implode('", "', $fechasReservadas) . '"]' ?>;

 //Verificar si las fechas son válidas
 function verificarDisponibilidad()
	{
		//Si tenemos fechas
		if(fechainicio > "" && fechafin >"")
		{
			//Crear nuevos Date especificando si es antes o despues de pm
			var inicio = new Date($('#fechainiciotxt').val().replace(/\//g , "-") +  ($('#fechainicio_Hora').val() =="p.m."? "T12:00:00":"T00:00:00"));
   			var fin = new Date($('#fechafintxt').val().replace(/\//g , "-") +  ($('#fechafin_Hora').val()=="p.m."? "T12:00:00":"T00:00:00"));

			//console.log($('#fechainiciotxt').val().replace(/\//g , "-"));
			//recorrer el arreglo de fechas reservadas y verificar si se halla dentro del intervalo de fechas escogidas
			for(var i =0; i< fechasReservadas.length;i++)
			{
				//Si este intervalo esta dentro del intervalo escogido por el usuario
    			//var checkInicio = new Date(fechasReservadas[i].fechaInicio+  (fechasReservadas_Horas[i].ampm ==1? "T12:00:00":"T00:00:00"));
    			//var checkFin = new Date(fechasReservadas[i].fechaFin+  (fechasReservadas_Horas[i].ampm ==1? "T12:00:00":"T00:00:00"));

				var checkInicio = new Date("2015-08-18T12:00:00");
				var checkFin = new Date("2015-08-20T00:00:00");

				//console.log(inicio +"__"+ fin +"__"+ checkInicio +"__"+ checkFin);

			    if(checkInicio <= fin && checkFin >= inicio)
			    {
			    	//No esta disponible en este intervalo
			    	console.log("hi");
			    	//Mostrar div de error, ocultar div normal
			    	$("#panelRentaError").show();
			    	$("#panelRenta").hide();

			        return false;
			    }
			}
		}
		//Ocultar div de error

		$("#panelRentaError").hide();
		$("#panelRenta").show();

		return true;
	} 



 $(document).ready(function(){
 	
 	$('#submitpeticion').click(function(){
     /* when the submit button in the modal is clicked, submit the form */

     console.log("appending");

     //Colocar campos con informacion sensible
     $("#periodorentaformModal").append('<input type="hidden"  name = "idUsuarioDuenio" value="<?php echo $usuario->idusuarios?>">');
     $("#periodorentaformModal").append('<input type="hidden"  name = "idUsuarioRenta" value="<?php echo ($visitante>""? $visitante->idusuarios :"")?>">');
     $("#periodorentaformModal").append('<input type="hidden"  name = "idCoche" value="<?php echo $coche->IdCoche?>">');
     $("#periodorentaformModal").append('<input type="hidden"  name = "TotalDias" value="'+dias+'">');
     $("#periodorentaformModal").append('<input type="hidden"  name = "PagoKilometro" value="<?php echo $coche->PrecioKilometro?>">');
     $("#periodorentaformModal").append('<input type="hidden"  name = "TotalRenta" value="'+totalRenta+'">');
     $("#periodorentaformModal").append('<input type="hidden"  name = "TotalPagar" value="'+(totalRenta * .7)+'">');
     $("#periodorentaformModal").append('<input type="hidden"  name = "TotalComision" value="'+(totalRenta * .3)+'">');

     $("#periodorentaformModal").append('<input type="hidden"  name = "inicio" value="'+$("#fechainiciotxt").val()+'">');
     $("#periodorentaformModal").append('<input type="hidden"  name = "fin" value="'+$("#fechafintxt").val()+'">');


     $("#periodorentaformModal").append('<input type="hidden"  name = "email" value="<?php echo $usuario->Email?>">');
     $("#periodorentaformModal").append('<input type="hidden"  name = "remitente" value="<?php echo ($visitante>""? $visitante->Nombre." ".$visitante->Apellido: ""); ?>">');
     $("#periodorentaformModal").append('<input type="hidden"  name = "auto" value="<?php echo $coche->Marca." ".$coche->Modelo;?>">');




    $("#periodorentaformModal").attr("action", "<?php echo base_url(); ?>autoanuncio/solicitarrenta");
    //$jq('#periodorentaformModal').formValidation('enableFieldValidators', 'email', false);
    $('#periodorentaformModal').submit();
});	
	
});

</script>



<!--scripts para date-->
<!--
	    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
		<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
		<script>
		  webshims.setOptions('waitReady', false);
		  webshims.setOptions('forms-ext', {types: 'date'});
		  webshims.polyfill('forms forms-ext');
		</script>
	<!--Fin del codigo para date-->
<!-- -->

<style>
	
.carousel-indicators {
	left: 80%;

}

.carousel-indicators .active {
    width: 70px;
    height: 55px;
    margin: 10px;
    border-style: solid;
    border-width: 3px;
    border-color:#2272C0;
}

#google_map {
        width: 100%;
        height: 200px;
      }

.whitetext
{
	color:#FFF;	
}	

.colortext
{
	color:#2272C0;
}
	

.carousel-inner .item img{
	
	height:450px;	
	width:auto;
	max-height: 450px;
	margin-left:auto;
	margin-right:auto;
}	

.fv-form-bootstrap .fv-icon-no-label{
    top: 0;
    right: -15px;
}
.input-group-addon, .input-group-btn{
	width: auto;
}

</style>






<!--comienza el contenido-->
<div class="container">
	


<div class="row" style="padding: 0px 50px;">
	
	<!--Informacion General sobre el auto-->
	<div class="col-md-9" style="padding:0px;">
		
		
		
		<div class="panel panel-default" style="margin:0px;">
  			<div class="panel-body" style="padding-bottom: 5px;">
  				
  				<h1 class="colortext" style="margin-top: 0px;"><?php echo $coche->Marca." ".$coche->Modelo;?></h1>
	  			

			
				<div class="row">
					<div class="col-md-2"><?php echo $coche->Annio;?></div>
					<div class="col-md-3"><?php echo $coche->RangoKilometraje;?></div>
					<div class="col-md-3"><?php echo $coche->energia>""?"Motor: ".$coche->energia:"";?></div>
					<div class="col-md-4"></div>
				</div>
  				
  			</div>
  			
  			
  			<div class="panel-footer" style="padding-bottom: 5px;">
  				<div class="row">
					<div class="col-md-2" >
						<h3 class="colortext" style="margin: 0px;" ><?php echo $coche->RentasHechas;?></h3> Rentas</div>

					<div class="col-md-3">

						<span class="colortext"><?php echo ($coche->Evaluaciones)?></span> Valoraciones

						<div data-toggle="tooltip" data-placement="top" title="<?php echo ($coche->Evaluaciones)?> valoraciones <?php echo ($coche->Evaluaciones>0? 'de los cuales '.(($coche->Evaluacion/5)*100).'% positiva' :'')?>" >
    					<input id="ratingd" value="<?php echo ($coche->Evaluacion>"" ? $coche->Evaluacion:"5")?>" class="rating rating-loading" min="0" max="5" step="0.1" data-size="xs"
    					 data-show-clear="false" data-show-caption="false" disabled>
    					</div>
					</div>

					


					<div class="col-md-7"></div>
				</div>	
  			</div>
  			
  		</div>
  	
  	
  	
					 <div id="carCarousel" class="carousel slide" data-interval="false" style="width:100%; height: 450px;background-color:#333">
					  
					  <!-- "Selector del carousel" -->
					  
						<span class = "carousel-indicators">
							<?php if($coche->Foto1 > ""):?>	
							<img src="<?php echo base_url(); ?>uploads/<?php echo $coche->Foto1;?>" height="50px" width="67px"
							data-target="#carCarousel" data-slide-to="0" class = "active" >
							<?php else: ?>
							<img src="<?php echo base_url(); ?>img/ford.jpg" height="50px" width="67px"
							data-target="#carCarousel" data-slide-to="0" class = "active">
							<?php endif; ?>	
							
							<?php if($coche->Foto2 > ""):?>	
							<img src="<?php echo base_url(); ?>uploads/<?php echo $coche->Foto2;?>" height="50px" width="67px"
							data-target="#carCarousel" data-slide-to="1" >
							<?php endif; ?>	
							
							<?php if($coche->Foto3 > ""):?>	
							<img src="<?php echo base_url(); ?>uploads/<?php echo $coche->Foto3;?>" height="50px" width="67px"
							data-target="#carCarousel" data-slide-to="2" >
							<?php endif; ?>	
						</span>
					  
					  <!-- Items del carousel-->
					  <div class="carousel-inner" role="listbox">
					    <div class="item active">
					    	<?php if($coche->Foto1 > ""):?>	
					      		<img  src="<?php echo base_url(); ?>uploads/<?php echo $coche->Foto1;?>" class="img-responsive" >
					    	<?php else: ?>
					    		<img  src="<?php echo base_url(); ?>img/ford.jpg">
					    	<?php endif; ?>		
					    </div>
					
					    <?php if($coche->Foto2 > ""):?>	
					    	<div class="item">					    	
					      		<img  src="<?php echo base_url(); ?>uploads/<?php echo $coche->Foto2;?>"  >
					    	</div>
					    <?php endif; ?>	
					
					    <?php if($coche->Foto3 > ""):?>	
					    	<div class="item">					    	
					      		<img  src="<?php echo base_url(); ?>uploads/<?php echo $coche->Foto3;?>"  >
					    	</div>
					    <?php endif; ?>	
					    
					    <!-- width="350px" height="240px" style="max-height: 240px; max-width: 350px; min-height: 240px; min-width: 350px" -->
					  </div>
					
					</div>
					
					
					
			<!--Ubicacion y más informacion sobre el auto-->
			<!--Mapa-->
			<div class="panel panel-default" style="margin:0px;">
				
				<div class="panel-footer">
					<span class="glyphicon glyphicon-map-marker"> </span>
					<?php echo $coche->Direccion;?>
				</div>
				
				<div class="panel-body">
					 <div id="google_map"></div>
				</div>
				
			</div>
			
			<!--Opciones y accesorios-->
			<div class="panel panel-default" style="margin:0px;">
				
				<div class="panel-heading">
					<span class="colortext lead">Características del coche</span>
				</div>
				
				<div class="panel-body">
					<div class="row">
						<div class="col-md-2"><strong>Opciones y accesorios</strong></div>
						
						<?php $iconString='<span class="glyphicon glyphicon-ok-sign" style="color: #A2E347;"></span>';?>
						<?php $iconStringNo='<span class="glyphicon glyphicon-remove" style="color:#CCD;"></span>';?>
						<?php $iconStringWarn='<span class="glyphicon glyphicon-remove" style="color:#C33;"></span>';?>
						
						<!--c.AireAcondicionado,c.DireccionAsistida,c.ReguladorVelocidad,c.GPS,c.SillaBebe,c.LectorCdMp3,c.USB,c.Bluetooth,c.BolsaAire,c.EngancheRemolque,c.Alarma-->
						
						<div class="col-md-10">
							<div class="row">
								<div class="col-md-4"><?php if($coche->AireAcondicionado==1) echo $iconString; else echo $iconStringNo;?> Climatizacion</div>
								<div class="col-md-4"><?php if($coche->SillaBebe==1) echo $iconString; else echo $iconStringNo;?> Sillas para bebé</div>
								<div class="col-md-4"><?php if($coche->idiomaEspaniol==1) echo $iconString;else echo $iconStringNo;?> Hablo Portugués</div>
							</div>
							<div class="row">
								<div class="col-md-4"><?php if($coche->DireccionAsistida==1) echo $iconString; else echo $iconStringNo;?> Dirección asistida</div>
								<div class="col-md-4"><?php if($coche->BolsaAire==1) echo $iconString; else echo $iconStringNo;?> Bolsa de aire</div>
								<div class="col-md-4"><?php if($coche->idiomaFrances==1) echo $iconString; else echo $iconStringNo;?> Hablo Inglés</div>
							</div>
							<div class="row">
								<div class="col-md-4"><?php if($coche->ReguladorVelocidad==1) echo $iconString; else echo $iconStringNo;?> Regulador de velocidad</div>
								<div class="col-md-4"><?php if($coche->Alarma==1) echo $iconString; else echo $iconStringNo;?> Alarma</div>
								<div class="col-md-4"><?php if($coche->idiomaFrances==1) echo $iconString; else echo $iconStringNo;?> Hablo Francés</div>
							</div>
							<div class="row">
								<div class="col-md-4"><?php if($coche->GPS==1) echo $iconString; else echo $iconStringNo;?> GPS</div>
								<div class="col-md-4"><?php if($coche->EngancheRemolque==1) echo $iconString; else echo $iconStringNo;?> Enganche remolque</div>
								<div class="col-md-4"><?php if($coche->idiomaAleman==1) echo $iconString; else echo $iconStringNo;?> Hablo Alemán</div>
							</div>
							<div class="row">
								<div class="col-md-4"><?php if($coche->USB==1) echo $iconString; else echo $iconStringNo;?> Entrada USB</div>
								<div class="col-md-4"><?php if($coche->LectorCdMp3==1) echo $iconString; else echo $iconStringNo;?> Lector CD Mp3</div>
								<div class="col-md-4"><?php if($coche->Bluetooth==1) echo $iconString; else echo $iconStringNo;?> Bluetooth</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			
			
			<!--Características-->
			<div class="panel panel-default" style="margin:0px;">
				
				
				<div class="panel-body">
				<strong>Características</strong>
					</div>
					
					
					<div class="row">
					
					<div class="col-md-1"></div>
					
					<div class="col-md-5">
						<table class="table">
							<tr>
								<td>Número de plazas:</td>
								<td><?php echo $coche->plazas>""?$coche->plazas:"N/D";?></td>
							</tr>
							<tr>
								<td>Número de puertas:</td>
								<td><?php echo $coche->puertas>""?$coche->puertas:"N/D";?></td>
							</tr>
							<tr>
								<td>Kilometraje:</td>
								<td><?php echo $coche->RangoKilometraje>""?$coche->RangoKilometraje:"N/D";?></td>
							</tr>
							<tr>
								<td>Color Engomado:</td>
								<td><?php echo $coche->colorEngomado>""?$coche->colorEngomado:"N/D";?></td>
							</tr>
							<tr>
								<td>Terminacion Placas:</td>
								<td><?php echo $coche->terminacionPlacas>""?$coche->terminacionPlacas:"N/D";?></td>
							</tr>
						</table>
					</div>
					
					<div class="col-md-5">
						<table class="table">
							<tr>
								<td>Transmisión:</td>
								<td><?php echo $coche->transmision>""?$coche->transmision:"N/D";?></td>
							</tr>
							<tr>
								<td>Consumo:</td>
								<td><?php echo $coche->rangoConsumo>""?$coche->rangoConsumo:"N/D";?></td>
							</tr>
							<tr>
								<td>Energias:</td>
								<td><?php echo $coche->energia>""?$coche->energia:"N/D";?></td>
							</tr>
							<tr>
								<td>Tipo Engomado:</td>
								<td><?php echo $coche->tipoEngomado>""?$coche->tipoEngomado:"N/D";?></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
							</tr>
						</table>
					</div>
					
					<div class="col-md-1"></div>
					
					</div>								
			</div>
			
			
			<!--Descripcion personal-->
			<div class="panel panel-default" style="margin:0px;">
				
				<div class="panel-body">
					<strong>Descripcion personal</strong>
				</div>
				
				<div class="panel-body">
					<div class="panel panel-default">
						<div class="panel-body"><?php echo $coche->DescripcionPersonal;?></div>
					</div>
				</div>
				
			</div>
			
			<!--Condiciones de renta-->
			<div class="panel panel-default" style="margin:0px;">
				
				<div class="panel-heading">
					<span class="colortext lead">Condiciones de renta</span>
				</div>
				
				<div class="panel-body">
					<div class="panel panel-default">
						<div class="panel-body"><?php echo ($coche->CondicionPersonal>""?$coche->CondicionPersonal:
						"<span class='text-muted'>El propietario no especificó condiciones para la renta.</span>");?></div>
					</div>
				</div>
				
			</div>


			<!-- Despliegue de calendario -->
			
		
							
	</div>
	
	
	<!--Informacion sobre el costo del alquiler-->
	<div class="col-md-3"  style="padding:0px;">
		<div class="panel panel-default" style="background-color: #4E96B3;">
			<form id="periodorentaform" >
				
  			<div class="panel-body">
  				
  				<h4 class="whitetext">Período de renta</h4>

					<div class="input-daterange" id="datepicker">

					    <div class="form-group">
				            <div class="input-group input-append date" >
					            <input type="text" class="form-control" name="fechainiciotxt" id="fechainiciotxt" placeholder="Inicio" <?php echo ($FechaI>""?"value='".$FechaI."'":"") ?> style="width:140px">
			     				<span class="input-group-addon" style="width:auto"><span class="glyphicon glyphicon-calendar"></span></span>
					            
	
			     				<span class="input-group-btn">
			        				<div class="btn btn-primary" id="fechainicio_Hora_btn" >a.m.</div>
			     				</span>
		     				</div>
   						</div><!-- /input-group -->
			
			
					    <div class="form-group">
				            <div class="input-group input-append date">
					            <input type="text" class="form-control" name="fechafintxt"   id="fechafintxt" placeholder="Fin" <?php echo ($FechaF>""?"value='".$FechaF."'":"") ?> style="width:140px">
			     				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					            
	
			     				<span class="input-group-btn">
			        				<div class="btn btn-primary" id="fechafin_Hora_btn" >a.m.</div>
			     				</span>
		     				</div>		     				
   						</div><!-- /input-group -->
					</div>
		            
		            	<span style="visibility: hidden; position: absolute;">
							<input type="text" id="fechainicio_Hora" value="a.m.">
							<input type="text" id="fechafin_Hora" value="a.m.">
						</span>
		            
		           
		           
  			</div>
  			<div class="panel-body">
  				

  				<!--Kilometraje-->
  				<h4 class="whitetext">Kilometraje total estimado</h4>

  				<div class="form-group">
  					<div class="input-group">
  						<?php echo form_dropdown('kilometraje', $Kilometrajerenta,'0','class="form-control" id="kilometraje"'); ?>
  					</div>
  				</div>


  					
  			</div>
	  			<div class="panel-footer">
	  				<h1 class="text-center"> <span id="costopordia" class="colortext">$<?php echo $coche->Precio?></span><br><small>al día </small></h1>
	  				
	  				<h3 class="text-center"><span id="costototal">$<?php echo $coche->Precio?></span><small> Total</small></h3>
	  				
	  				<!--Rentar-->


	  				<div id="panelRenta">
	  					<!-- Si el usuario ha iniciado sesion -->
		  				<?php if($miId>''):?>	
						
							<button type="submit" class="btn btn-primary btn-block <?php echo ($permitirRenta||$miId==''?'enabled':'disabled')?>" name="botonagregar" id="botonagregar" >Rentar</button>
				  			
				  		<!-- Si no ha iniciado sesion -->
		  				<?php else: ?>

			  				<a href="<?php echo base_url().'autoanunciologin/'.$coche->IdCoche?>" class="btn btn-primary btn-block " 
			  					role="button" >Iniciar sesion y rentar</a>

		  				<?php endif; ?>
	  				</div>


	  				<div id="panelRentaError" class="text-center" style="display:none;">

			  			<h2 style="color: #D31;"><span class="glyphicon glyphicon-warning-sign"></h2>
			  				El auto no se encuentra disponible en estas fechas<br><br>

			  			<a href="<?php echo base_url()?>buscador" class="btn btn-warning btn-block " 
		  					role="button" >Buscar otros resultados</a>
			  		</div>

  				</div>

  			</form>




  			<!-- MODAL para rentar -->		
  			<div class="modal fade" id="modalRentar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  				<div class="modal-dialog">
  					<div class="modal-content">

  						<div class="modal-header">
  							<button type="button" class="close" data-dismiss="modal">&times;</button>
  							<h4 class="modal-title colortext">Rentar</h4>
  						</div>

  						<div class="modal-body">
  							<!-- Formulario-->
  							<form id="periodorentaformModal" name="periodorentaform" method="post" action="<?php echo base_url(); ?>autoanuncio/solicitarrenta">
  								<!--Condiciones de renta-->
  								Te recordamos las condiciones de renta<br><br>

  								<p>
  								<!--<?php echo $condiciones['1']?$iconString." Tu tarjeta esta bien!":
  								$iconStringWarn." Tu tarjeta debe estar a tu Nombre";?>
  								 <br>-->

  								 <?php echo $condiciones['2']?$iconString." Has provisto de toda la informacion sobre tu licencia!":
  								$iconStringWarn." Falta informacion sobre tu licencia";?>
  								 .<br>

  								 <?php echo $condiciones['3']?$iconString." Tu licencia de manejo tiene al menos 2 años de antiguedad!":
  								$iconStringWarn." Tu licencia de manejo no tiene al menos 2 años de antiguedad";?>
  								 .<br>


  								<!--condiciones personales-->
  								<?php if($coche->CondicionPersonal>""):?>	  								

  									<br>Y las condiciones dadas por el propietario<br>
  									<p><?php echo $coche->CondicionPersonal;?></p>

  								<?php endif; ?>	

  								<div class="form-group">
  										<input type="text" class="form-control"  id="condicionesCumplidasModal" name="condicionesCumplidasModal"
  										value="<?php echo ($condiciones['2']&&$condiciones['3']?"ok":"")?>"
  										style="visibility: hidden;">
  									</div>

  								<span class="text-<?php echo ($condiciones['1']&&$condiciones['2']&&$condiciones['3']?"muted":"danger")?>">
  									Si no cumples con estas condiciones no puedes rentar. Gracias por tu comprensión.</span>

  								<hr>

  								<!--Período-->

  								<div class="row">

  									<div class="col-md-6">

  										Período de renta<br>

  										<div class="input-daterange input-group" id="datepickerModal">

  											<div class="form-group">
  												<div class="date" id="fechainicioModal">
  													<input type="text" class="form-control" name="inicioModal" id="fechainiciotxtModal"  placeholder="Inicio" style="width:200px" readonly>
  													<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>


  													<span class="input-group-btn">
  														<div class="btn btn-primary" id="fechainicio_Hora_btnModal" >a.m.</div>
  													</span>
  												</div>
  											</div><!-- /input-group -->

  											<div class="form-group">
  												<div class="date" id="fechafinModal">
  													<input type="text" class="form-control" name="finModal" id="fechafintxtModal"  placeholder="Fin" style="width:200px" readonly>
  													<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>


  													<span class="input-group-btn">
  														<div class="btn btn-primary" id="fechafin_Hora_btnModal" >a.m.</div>
  													</span>
  												</div>
  											</div><!-- /input-group -->

  											<span style="visibility: hidden; position: absolute;">
  												<input type="text" id="fechainicio_HoraModal" name="fechainicio_HoraModal" value="a.m.">
  												<input type="text" id="fechafin_HoraModal" name="fechafin_HoraModal" value="a.m.">
  											</span>

  										</div>

  										Kilometraje total estimado
  										<div class="form-group">
  											<div class="input-group">
  												<?php echo form_dropdown('kilometrajeModal', $Kilometrajerenta,'0','class="form-control" id="kilometrajeModal" readonly'); ?>
  											</div>
  										</div>

  									</div>

  									<div class="col-md-6">

  										<h1 class="text-center"> <span id="costopordiaModal" name="costopordia" class="colortext">$<?php echo $coche->Precio?></span><small> al día </small></h1>

  										<h3 class="text-center"><span id="costototalModal" name="costototal">$<?php echo $coche->Precio?></span><small> Total</small></h3>
  									</div>

  								</div>

  								<hr>

  								<!--Mensaje-->
  								<h5>Mensaje para el Propietario</h5>
  								<textarea class="form-control" name="Mensaje" placeholder="Saludos <?php echo $usuario->Nombre." ".$usuario->Apellido?> deseo rentar tu coche..." 
  									cols="27" style="resize:none;" maxlength="250"></textarea>	<br>

  									<p class="text-muted">Explica lo que va a hacer con el vehículo, las horas y el lugar en donde quieres encontrar al propietario, etc. Todo esto para dar
  										seguridad y confianza al propietario.<p><br>
  										<hr>

  										<!--Submit-->
  										<input  type="submit" name="submitpeticion" id="submitpeticion" value="Mandar solicitud" class="btn btn-primary btn-block">






  									</form>
  								</div><!-- termina modal body-->

  							</div>
  						</div><!-- /.modal-dialog -->
  					</div><!-- /.modal -->



  				</div>

  				<!--Informacion sobre el propietario-->
  				<div class="panel panel-default" style="margin:0px; padding: 0px;">
  					<div class="panel-body" style="margin:0px; padding: 0px;">

  						<row>		
  							<div class="col-md-12"><h4 class="text-center">Propietario</h4></div>
  						</row>
  						<!-- Imagen -->
  						<img src="<?php echo base_url().($usuario->FotoPerfil>''?'uploads/'.$usuario->FotoPerfil:'img/userpic.gif');?>"
  						class="img-responsive center-block" onError="<?php echo base_url(); ?>img/userpic.gif"  style="max-width:200px;border-radius: 8px;">

					<row>
					<div class="col-md-12"><h3 class="colortext text-center"><?php echo $usuario->Nombre?></h3></div>
					</row>
				
				</div>
				
			<!--Añadir comentario-->
			
			<!--
				<div class="panel-body" style="margin:0px;">
				<form>
					<div class="form-group">
						<label class="sr-only" for="comentario">Comentario:</label>
						<textarea class="form-control" id="comentario" placeholder="Ingresa un comentario..." 
							cols="27" style="resize:none;" maxlength="50"></textarea>	
					</div>
					
					<div class="form-group">
						 <button type="button" class="btn btn-default btn-block">Comentar</button>
					</div>
				</form>
				</div>
			-->

			</div>
			
			<!--Porcentaje de contestacion y tiempo medio de respuesta-->
			<div class="panel panel-default" style="margin:0px; padding: 0px;">

				<div class="panel-heading">
					<?php if($usuario->PorcentajeContestacion>-1):?>
					Responde a un <b><span class="colortext"><?php echo $usuario->PorcentajeContestacion;?>%</span></b> de sus conversaciones.

					<?php else: ?>
					<span class="text-muted">Nadie le ha hecho una pregunta.</span>
					<?php endif; ?>	
				</div>


				<div class="panel-heading">
					<?php if($usuario->TiempoMedioRespuesta>""):?>
					Respuesta en <b><span class="colortext"><?php echo $usuario->TiempoMedioRespuesta_string;?></span></b> aproximadamente

					<?php else: ?>
					<span class="text-muted">No ha tenido la oportunidad de responder.</span>
					<?php endif; ?>	
				</div>
				<div class="panel-body"></div>

			</div>


			<!--Comentarios-->
			<div class="panel panel-default" style="margin:0px; padding: 0px;">
				<div class="panel-heading">Últimos comentarios</div>
				<div class="panel-body"></div>
			</div>
  		
  		
	</div>
	
	
	
</div>
	

		
	

<!-- Propiedades -->
<span style="visibility: hidden">
	<input type="hidden" id="base_url" value="<?php echo base_url()?>">
	<input type="hidden" id="Lat" value="<?php echo $coche->Lat?>">
	<input type="hidden" id="Lng" value="<?php echo $coche->Lng?>">
	
	<input type="hidden" id="Precio" value="<?php echo $coche->Precio?>">
	<input type="hidden" id="CostoPrimerDiaRenta" value="<?php echo $coche->CostoPrimerDiaRenta?>">
	<input type="hidden" id="CostoSegundoDiaRenta" value="<?php echo $coche->CostoSegundoDiaRenta?>">
	<input type="hidden" id="PrecioKilometro" value="<?php echo $coche->PrecioKilometro?>">
	
</span>



</div><!--termina container-->
<script>
    	$(document).ready(function () {
        	$('.input-daterange').datepicker({
                    todayBtn: "linked"
            });
        });	
</script>