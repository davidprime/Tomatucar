<!--comienza el contenido-->
<div class="container">
	
	 <div id="headComunidad" class="media">
           <a class="pull-left">
              <img src="img/fs.png" class="media-object" width="80px" height="80px" alt="imagen">
           </a>
           <div class="media-body">
             <h2 id="titulocomunidad" class="media-heading"><strong>Sistema de pago</strong></h2>
           </div>
           <br>
           <div id="subComunidad"><h4><p class="verdeFuerte">TomatuCAR se encarga de las transacciones entre arrendatario y propietario</p></h4></div>
           <br>
        </div>
		<div id="contenidodesarrollo">	
        <a class="pull-left">
              
           </a>
           <div class="media-body" id="item3">
            <h4 class="media-heading">TomatuCAR asegura tu pago</h4>
             <h5  class="media-heading" > <p class="text-justify">TomatuCAR es un sitio de Sharing Economy es decir, un sistema de consumo compartido de bienes y servicios. TomatuCAR permite relacionar a propietarios y personas que necesitan un auto en cada estado de la República Mexicana.</p></h5>
           </div>

           <a class="pull-left">
  
           </a>
           <div class="media-body" id="item3">
            <h4 class="media-heading">¿Cómo estoy pagando cuando pongo mi coche en renta?</h4>
             <h5  class="media-heading" > <p class="text-justify">TomatuCAR es un sitio de Sharing Economy es decir, un sistema de consumo compartido de bienes y servicios. TomatuCAR permite relacionar a propietarios y personas que necesitan un auto en cada estado de la República Mexicana.</p></h5>
           </div>

          </div>

          <div id="contenidopago">	
        <a class="pull-left">
              
           </a>
           <div class="media-body" id="item3">
            <h4 class="media-heading">Encontrar un buen precio de renta</h4>
             <h5  class="media-heading" > <p class="text-justify">TomatuCAR es un sitio de Sharing Economy es decir, un sistema de consumo compartido de bienes y servicios. TomatuCAR permite relacionar a propietarios y personas que necesitan un auto en cada estado de la República Mexicana.</p></h5>
           </div>

           <a class="pull-left">
              
           </a>
           <div class="media-body" id="item3">
            <h4 class="media-heading">¿Cómo estoy pagando en caso de daño o accidente?</h4>
             <h5  class="media-heading" > <p class="text-justify">TomatuCAR es un sitio de Sharing Economy es decir, un sistema de consumo compartido de bienes y servicios. TomatuCAR permite relacionar a propietarios y personas que necesitan un auto en cada estado de la República Mexicana.</p></h5>
           </div>

          </div>

          <div id="botonera">	
				<?php if($this->session->userdata('nombre')){?>
				<div id="b9"><a href="<?php echo base_url(); ?>auto" class="btn btn-success btn-lg" role="button"><strong>Rentar mi vehículo</strong></a></div>
	    <?php }else{ ?>
				<div id="b9"><a href="<?php echo base_url(); ?>login" class="btn btn-success btn-lg" role="button"><strong>Rentar mi vehículo</strong></a></div>
		<?php } ?>
				</div>
				<div id="b10"><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>buscador" role="button"><strong>Necesito un vehículo</strong></a></div>	  	
			</div><!-- aqui termina el div de los botones -->	
	

</div>