 <script>deleteMarkers();</script>
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

		