
 <div style="overflow: auto; width: 100%; height: 500px">
 <script>
 deleteMarkers();
 ActualizarPagina(<?php echo $nuevoInicio; ?>)
 </script><!--Revisar si aun es necesario deleteMarkers() debido a que esta al principio de la funcion de busqueda NOTA PERSONAL/ ESTA ES LA RAZON POR LA CUAL NO SE ESTABAN BORRANDO CORRECTAMENTE AL NO ENCONTRAR RESULATDOS YA QUE ESTO SOLO SE ACTIVABA CUANDO ENCONTRABA ALGO Y ESTE PEDASO DE CODIGO NO SE ENCUENTRA EN ERRORBUSQUEDA-->
  <?php $markercount=-1; foreach ($coches as $item):  ?>	
 
   <!-- Star Rating -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="<?php echo base_url(); ?>js/star-rating.js" type="text/javascript"></script>

 
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
<!--Enter PANEL TEMPLATE HERE  IMG TO USE=arrendador5.png  -->
<div class="panel panel-default" style="margin-bottom: 0px;">
	<div class="panel-body" >
		<div class="row" >
			<div class="col-md-2"></div>
			<div class="col-md-10">
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
				<button class="btn btn-primary" style="cursor:pointer; width:310px; font-size:1.3em; font-family:sans-serif; letter-spacing:.1em;"  onclick="location.href='<?php echo base_url(); ?>auto';" >¡Registralo Ahora!</button>
			</div>
		</div>
	</div>
</div>
<!--End of PANEL TEMPLATE HERE   -->
</div>
<div class="row" style="padding-left: 15px;">
	<!--Anterior-->
	<?php if($nuevoInicio>0){ ?>
		<button onclick="Paginador(-2)" class="btn btn-primary">Anterior</button>
	<?php } ?>
	
	<?php 
	//Botones de numeros
		$count=0;
		$Inicio=0;
		$morepages=false;
		if(($nuevoInicio-45)<=0)
		{$y=0; $Inicio=0;}
		else
		{$y=($nuevoInicio/15)-3; $Inicio=($nuevoInicio-45);}
		//$nuevoInicio nos muestra la posicion actual del paginador.
		for($x=$Inicio;$x<$numAutos;$x+=15)
		{  $y++;
			if($x>=$nuevoInicio)
			{$count++;}
			
			if($x==$nuevoInicio)
			 {
	?>
		<button onclick="Paginador(<?php echo $x; ?>)" class="btn btn-info"><?php echo $y; ?></button>
		<?php }else{ ?>
		<button onclick="Paginador(<?php echo $x; ?>)" class="btn btn-primary"><?php echo $y; ?></button>
	<?php 
					}
			if($count==4  && $x<$numAutos)
			{$morepages=true; break;}
		}

		if($morepages==true)
		{echo "...";}
	//siguiente
	if(($nuevoInicio+15)<$numAutos){
	?>
		<button onclick="Paginador(-1)" class="btn btn-primary">Siguiente</button>
	<?php } ?>
</div>
		