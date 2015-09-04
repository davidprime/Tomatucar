<!--aqui termina el header de la pagina-->
	
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDnPDroLgoimf7Y6gJ3JHYrRPD7NwTxBIM&sensor=false&amp;libraries=places"/>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
	
	<style>
	body{
		padding-top: 50px;
	}
	.HeaderPad{
		background-color: rgba(126, 189, 98, 0.48);;
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
					<input type="text" class="form-control" name="direccion" id="direccion"  placeholder="Direccion" size="75" value="<?php echo $Direccion;?>" >
					<input name="lat" id="lat" type="text" value="<?php echo $lat;?>"  hidden>
			        <input name="lng" id="lng" type="text" value="<?php echo $lng;?>"  hidden>
					<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
				</div>
			</div>
				<div class="input-daterange" id="datePicker" >
					<div class="col-md-2">
				           <div class="form-group-lg">
				           		<div class="input-group input-append date " >
								<input type="date" id="FechaPickup" class="form-control" maxlength="20" size="18" name="FechaInicio" placeholder="Pickup" style="width: 4cm">
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							    </div>
						   </div>
				    </div>
			   </div>
			   <div class="input-daterange" id="datePicker" >
					<div class="col-md-2">
				           <div class="form-group-lg">
				           		<div class="input-group input-append date " >
								<input type="date" id="FechaReturn" class="form-control" maxlength="20" size="18" name="FechaFin" placeholder="Return" style="width: 4cm">
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							    </div>
						   </div>
				    </div>
			   </div>
			   
	</div>
<div class="row HeaderPad" style="padding-bottom: 20px;">
	<div class="col-md-1"></div>	
	<div class="col-md-11" >
				<div class="col-md-2" style="padding-right: 0px; padding-left: 0px;">
				<?php echo form_dropdown('km', $kilometros,0,'class="form-control" id="km size="15" onChange="Actualizarbusqueda(); " '); ?>		
				</div>	
					<div class="col-md-2" style="padding-right: 0px; padding-left: 0px;">
					<div class="input-group">
					<span class="input-group-addon">Precio</span><input type="range"  min="0" max="10000" class="form-control" name="precioS" id="precioS" value="10000" onChange="ValueText(this.value)" step="1"/>
					</div>
					</div>
					<div class="col-md-2" style="padding-right: 0px; padding-left: 0px;">
					<div class="input-group">
					<span class="input-group-addon">$</span><input type="text" name="PrecioT" class="form-control" id="PrecioT" value="10000" size="5" onChange="ValueText(this.value)" />
					<span class="input-group-addon">por Dia</span>
					</div>
					</div>
					<div class="col-md-5" style="padding-right: 0px; padding-left: 0px;">
				 <select name="Tipo[]" id="Tipo" multiple="multiple" onChange="Actualizarbusqueda(); ">
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
					<select name="Extras[]" id="Extras" multiple="multiple" size="17" onChange="Actualizarbusqueda();">
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
					</select>
					</div>
<!--Scripts para funcionalidades de los elementos del form class="navbar-form navbar-left"  -->
<script type="text/javascript">
function ValueText(newValue)
{
	//document.getElementById("PrecioS").innerHTML="menos de "+newValue+"/dia";
	if(newValue>10000)
		{newValue=10000;}
	if(newValue<0)
		{newValue=0;}
	if(isNaN(newValue))
		{newValue=10000;}
	document.getElementById("PrecioT").value=newValue;
	document.getElementById("precioS").value=newValue;
	Actualizarbusqueda();
}
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#Extras').multiselect();
        $('#Tipo').multiselect();
    });
</script>
<!--//////////////////////////////////////////////-->
		</div>
		</div>
</form>
<div class="row">
<div class="col-md-1">	</div>	
<div class="col-md-6" style="padding-right: 0px;">
<div style="overflow: auto; width: 100%; height: 500px">
<div id="container"><!--Este div se utiliza para actualizar la busqueda-->
<?php if($coches != ""): ?>
   <?php foreach ($coches as $item): ?>	
		<div class="panel panel-default" style="margin-bottom: 0px;">
			<div class="panel-body" onclick="location.href='<?php echo base_url(); ?>autoanuncio/<?php echo $item['IdCoche'];?>';" style="cursor:pointer;">
				<div class="col-md-5">
					<div id="carCarousel_<?php echo $item['IdCoche'];?>" class="carousel slide" data-interval="false" style="width:200px; height:150px;">
						<!-- "Bolitas blancas" -->
						<ol class="carousel-indicators">
							<li data-target="#carCarousel_<?php echo $item['IdCoche'];?>" data-slide-to="0" class="active"></li>
							<li data-target="#carCarousel_<?php echo $item['IdCoche'];?>" data-slide-to="1"></li>
							<li data-target="#carCarousel_<?php echo $item['IdCoche'];?>" data-slide-to="2"></li>
						</ol>
						
						<!-- Items del carousel-->
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<?php if($item['Foto1'] > ""):?>	
									<img  src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto1'];?>" alt="..." class="img-thumbnail" width="200px" height="150px" style="max-height: 150px; max-width: 200px; min-height: 150px; min-width: 200px">
								<?php else: ?>
									<img  src="<?php echo base_url(); ?>img/ford.jpg" alt="..." class="img-thumbnail" width="200px" height="150px" style="max-height: 200px; max-width: 200px; min-height: 150px; min-width: 200px">
								<?php endif; ?>		
							</div>
							
							<div class="item">
								<?php if($item['Foto2'] > ""):?>	
									<img  src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto2'];?>" alt="..." class="img-thumbnail" width="200px" height="150px" style="max-height: 150px; max-width: 200px; min-height: 150px; min-width: 200px">
								<?php else: ?>
									<img  src="<?php echo base_url(); ?>img/ford.jpg" alt="..." class="img-thumbnail" width="200px" height="150px" style="max-height: 150px; max-width: 200px; min-height: 150px; min-width: 200px">
								<?php endif; ?>	
							</div>
							
							<div class="item">
								<?php if($item['Foto3'] > ""):?>	
									<img  src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto3'];?>" alt="..." class="img-thumbnail" width="200px" height="150px" style="max-height: 150px; max-width: 200px; min-height: 150px; min-width: 200px">
								<?php else: ?>
									<img  src="<?php echo base_url(); ?>img/ford.jpg" alt="..." class="img-thumbnail" width="200px" height="150px" style="max-height: 150px; max-width: 200px; min-height: 150px; min-width: 200px">
								<?php endif; ?>	
							</div>
						</div>
						
						<!-- Controles de izquierda y derecha-->
						<a class="left carousel-control" href="#carCarousel_<?php echo $item['IdCoche'];?>" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Anterior</span>
						</a>
						<a class="right carousel-control" href="#carCarousel_<?php echo $item['IdCoche'];?>" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Siguiente</span>
						</a>
					</div>
				</div>
				<!--Contenido del auto--> 	
				<div class="col-md-3">
					<h4><p><?=$item['Marca']?> <?=$item['Modelo']?> <?=$item['Annio']?></p></h4>
					<p><?=$item['Direccion']?></p>
				</div>
				<div class="col-md-4">
					<span class='post-labels' style="margin-left:25px; margin-top:60px;">
					<p style="width:130px;">$<?=$item['Precio']?> / dia</p></span>         
					<div id="dm2" class="divValoracion" style="margin-left:40px; margin-top:85px;">
						<div class="estrella_1 estrellasValoracion"></div>
						<div class="estrella_2 estrellasValoracion"></div>
						<div class="estrella_3 estrellasValoracion"></div>
						<div class="estrella_4 estrellasValoracion"></div>
						<div class="estrella_5 estrellasValoracion"></div>
					</div>
				</div>            
			</div> 
		</div>
	<?php endforeach; ?>
<?php else: ?>
	<h3> No se encontraron resultados </h3>
<?php endif ?>
	  <!--Div de busqueda-->
</div>
   </div>
   </div>
           <!--MENU VERTICAL-->
	<div class="col-md-3" style="padding-left: 0px;">	
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	 <div class="map_canvas" id="map_canvas" style="width:530px; height:500px; "></div>
	</div>
</div>
			<!--termina menu vertical-->






</div><!--termina contenido cuenta-->
</div><!--termina container-->

<!--LO DEMAS-->
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
        <li><a href=""><img src="img/facebook.png" height="20px" width="30px" alt=""></a></li>
        <li><a href=""><img src="img/twiter.png" height="20px" width="30px" alt=""></a></li>
        <li><a href=""><img src="img/google.png" height="20px" width="30px" alt=""></a></li>
        </ul>
      </div>  
  </div>  
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>js/mapbusqueda.js"></script>
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