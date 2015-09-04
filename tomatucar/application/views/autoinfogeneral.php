
    <script src="<?php echo base_url(); ?>js/script.js"></script>
<!--comienza el contenido-->
<div class="container" >
	<div id="linknuevo"><a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>auto"><strong>+ </strong>Agregar un nuevo vehiculo</a></div>
<div id="contenidocuenta" class="panel panel-default">
<nav id="menu" class="navsecundario">					
					<ul>
						<li class="subActivo">
							<a href="<?php echo base_url(); ?>filtroauto">
								<span class="icon">
									<i aria-hidden="true" class="glyphicon glyphicon-road"></i>
								</span>
								<span>Mis coches</span>
							</a>
						</li>
						<li >
							<a href="<?php echo base_url(); ?>perfil">
								<span class="icon"> 
									<i aria-hidden="true" class="glyphicon glyphicon-user"></i>
								</span>
								<span>Mi perfil</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>misRentas">
								<span class="icon">
									<i aria-hidden="true" class="glyphicon glyphicon-pencil"></i>
								</span>
								<span>Mis Rentas</span>
							</a>
						</li>   
						<li>
							<a href="cuenta_mispagos.html">
								<span class="icon">
									<i aria-hidden="true" class="glyphicon glyphicon-credit-card"></i>
								</span>
								<span>Pagos e ingresos</span>
							</a>
						</li>
					</ul>
				</nav>
<?php foreach ($detallecoche as $item): ?>
			<div class="menu_vertical">
				<ul class="nav_list">
				    <li class="active nav_item"><a class="nav_item_link" href="<?php echo current_url(); ?>">Info general</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificarfoto/<?php echo $item['IdCoche'];?>">Modificar foto</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autocalendario/<?php echo $item['IdCoche'];?>">Calendario</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificaropciones/<?php echo $item['IdCoche'];?>">Opciones</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificarprecio/<?php echo $item['IdCoche'];?>">Precio</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autopromocionar/<?php echo $item['IdCoche'];?>">Promocionar</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autoborrar/<?php echo $item['IdCoche'];?>">Borrar / desactivar</a></li>
				</ul>
			</div><!--termina menu vertical-->

   <div id="contenido_tus_autos">
   <div id="cuadro_borde" >
  
   	<div id="carCarousel_<?php echo $item['IdCoche'];?>" class="carousel slide" data-interval="false" style="width:350px; margin-left: 270px">
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
      		<img  src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto1'];?>" alt="..." class="img-thumbnail" width="350px" height="240px" style="max-height: 240px; max-width: 350px; min-height: 240px; min-width: 350px">
    	<?php else: ?>
    		<img  src="<?php echo base_url(); ?>img/ford.jpg" alt="..." class="img-thumbnail" width="350px" height="240px" style="max-height: 240px; max-width: 350px; min-height: 240px; min-width: 350px">
    	<?php endif; ?>		
    </div>

    <div class="item">
    	<?php if($item['Foto2'] > ""):?>	
      		<img  src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto2'];?>" alt="..." class="img-thumbnail" width="350px" height="240px" style="max-height: 240px; max-width: 350px; min-height: 240px; min-width: 350px">
    	<?php else: ?>
    		<img  src="<?php echo base_url(); ?>img/ford.jpg" alt="..." class="img-thumbnail" width="350px" height="240px" style="max-height: 240px; max-width: 350px; min-height: 240px; min-width: 350px">
    	<?php endif; ?>	
    </div>

    <div class="item">
    	<?php if($item['Foto3'] > ""):?>	
      		<img  src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto3'];?>" alt="..." class="img-thumbnail" width="350px" height="240px" style="max-height: 240px; max-width: 350px; min-height: 240px; min-width: 350px">
    	<?php else: ?>
    		<img  src="<?php echo base_url(); ?>img/ford.jpg" alt="..." class="img-thumbnail" width="350px" height="240px" style="max-height: 240px; max-width: 350px; min-height: 240px; min-width: 350px">
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

      <span class='post-labels' style="margin-left:200px; margin-top:-225px;"><p style="width:130px;"><?=$item['Precio']?> / dia</p></span>
      <div class="titulo_auto" style="margin-left: 630px">
        <h4 id="" class="text-left"><p style="padding-top:133px"><?=$item['Marca']?> <?=$item['Modelo']?> <?=$item['Annio']?>
        	
        <span style="color: #F00;">&nbsp<?php echo $item['Status']==1?'Borrador':''; ?>  </span>	
        </p></h4>
        <p><?=$item['Direccion']?></p>
          <p>Evaluacion</p>        
        <div id="dm2" class="divValoracion">
            <div class="estrella_1 estrellasValoracion"></div>
            <div class="estrella_2 estrellasValoracion"></div>
            <div class="estrella_3 estrellasValoracion"></div>
            <div class="estrella_4 estrellasValoracion"></div>
            <div class="estrella_5 estrellasValoracion"></div>
            <div class="votosTotales">Datos de votación</div>
        </div>

          <div id="otros_datos">
            <p><span>0</span> Contacto</p> 
            <p><span>0</span> Consultas</p> 
            <p><span>0</span> Rentas</p> 
          </div>
           <div id="calendario" style="margin: -0px 0px 0px 0px"><a href="<?php echo base_url(); ?>autocalendario/<?php echo $item['IdCoche'];?>" class="btn btn-success btn-lg">Calendario</a></div>
           <div id="ver_anuncio" style="margin: -46px 0px 0px 200px"><a href="<?php echo base_url(); ?>autoanuncio/<?php echo $item['IdCoche'];?>" class="btn btn-info btn-lg">Ver anuncio</a></div>
         </div>
      </div>
      <?php endforeach; ?>
   </div>
   </div>

</div><!--termina container-->
</div><!--termina contenido cuenta-->