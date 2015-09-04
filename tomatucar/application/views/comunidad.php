<!--comienza el contenido-->
<div class="container">
<div id="contendidocomunidad">
<div id="headComunidad" class="media">
           <a class="pull-left">
              <img src="img/porque1.png" class="media-object" width="80px" height="80px" alt="imagen">
           </a>
           <div class="media-body">
             <h2 id="titulocomunidad" class="media-heading"><strong> ¡Comunidad TomatuCAR!</strong></h2>
           </div>
           <br>
           <div id="subComunidad"><h4><p class="verdeFuerte">¡Condiciones TomatuCAR para rentar un coche entre particulares!</p></h4></div>
           <br>
        </div>

        <div id="contenedorComunidad">
        <div  class="">
        	<a class="pull-left">
              <span class="glyphicon glyphicon-ok"></span>
           </a>
           <div class="media-body" id="item">
             <h5  class="media-heading" >&nbsp;&nbsp;Debes tener mínimo 21 años.</h5>
           </div>
           <a class="pull-left">
              <span class="glyphicon glyphicon-ok"></span>
           </a>
           <div class="media-body" id="item">
             <h5 class="media-heading" >&nbsp; &nbsp;Debes ser el titular de la licencia de conducir con 2 años de experiencia(se rechaza un certificado de perdida).</h5>
           </div>
           <a class="pull-left">
              <span class="glyphicon glyphicon-ok"></span>
           </a>
           <div class="media-body">
             <h5  class="media-heading" id="item">&nbsp; &nbsp;No ser responsable de un accidente dentro de los 24 últimos meses.</h5>
           </div>
           <a class="pull-left">
              <span class="glyphicon glyphicon-ok"></span>
           </a>
           <div class="media-body">
             <h5  class="media-heading" id="item">&nbsp; &nbsp;No tener la licencia de conducir retirada dentro de los 24 últimos meses.</h5>
           </div>
           <a class="pull-left">
              <span class="glyphicon glyphicon-ok"></span>
           </a>
           <div class="media-body" id="item">
             <h5  class="media-heading">&nbsp; &nbsp;No tener negación del seguro dentro de los 5 últimos años.</h5>
           </div>
           <a class="pull-left">
              <span class="glyphicon glyphicon-ok"></span>
           </a>
           <div class="media-body" id="item">
             <h5  class="media-heading">&nbsp; &nbsp;No tener una incapacidad mental o física al conducir.</h5>
           </div>
           <a class="pull-left">
              <span class="glyphicon glyphicon-ok"></span>
           </a>
           <div class="media-body" id="item">
             <h5  class="media-heading">&nbsp; &nbsp;Respetar el Reglamento de Tránsito</h5>
           </div>
           <a class="pull-left">
              <span class="glyphicon glyphicon-ok"></span>
           </a>
           <div class="media-body" id="item">
             <h5 class="media-heading">&nbsp; &nbsp;Sera necesaria una foto de su licencia de conducir y de la credencial oficial para reservar un coche. Las fotos son indispensables para estar asegurado durante la renta.</h5>
           </div>
			
		<br>
        </div>
       </div> 

       <div id="contenidoComunuidad2">
		<div id="video">
			<iframe class="center-block" width="400" height="320" src="//www.youtube.com/embed/v95blrlQ7-M" frameborder="0" allowfullscreen></iframe>
		</div><!-- aqui termina div de video -->

       	<div id="botonesA">	
				<?php if($this->session->userdata('nombre')){?>
				<div id="b5"><a href="<?php echo base_url(); ?>auto" class="btn btn-success btn-lg" role="button"><strong>Rentar mi vehículo</strong></a></div>
	    <?php }else{ ?>
				<div id="b5"><a href="<?php echo base_url(); ?>login" class="btn btn-success btn-lg" role="button"><strong>Rentar mi vehículo</strong></a></div>
		<?php } ?>
				</div>
				<div id="b6"><a class="btn btn-primary btn-lg " href="<?php echo base_url(); ?>buscador" role="button"><strong>Necesito un vehículo</strong></a></div>	  	
			</div><!-- aqui termina el div de los botones -->	
       </div>
</div>
</div>