<!--comienza el contenido-->
<div class="container">

<div id="headComunidad" class="media">
    <a class="pull-left"><img src="img/ea.png" class="media-object" width="80px" height="80px" alt="imagen"></a>

     <div class="media-body">
        <h2 id="titulocomunidad" class="media-heading"><strong> ¿Quieres rentar un auto?</strong></h2>
     </div>

    <br>

    <div id="subComunidad">
      <h4><p class="verdeFuerte">¿Cómo rentar un coche gracias a TomatuCAR?</p></h4>
    </div>
    <br>
</div>

 <div id="partearrendadorIZQ">
 <div class="media">
           <a href="#" class="pull-left">
              <img src="img/arrendador1.png" class="media-object" width="80px" height="80px" alt="imagen">
           </a>
        
          <h4 id="titulosarrendador" class="media-heading">1 Inscribirse</h4>
         
           <div class="pequecontenido">
             <h5>¡Es gratis!</h5>
              <h5>Minimo 18 años y licencia de conducir vigente</h5>
              <h5>2 años de esperiencia de manejo</h5>
              <h5>Fotografia de licencia de conducir</h5>
              <h5>Fotografia de IFE</h5>
           </div>
        </div>

        <div class="media">
           <a href="#" class="pull-left">
              <img src="img/arrendador2.png" class="media-object" width="80px" height="80px" alt="imagen">
           </a>
        
          <h4 id="titulosarrendador" class="media-heading">3 Validaci&oacute;n</h4>
         
           <div class="pequecontenido">
             <h5>Haz una pre- reservaci&oacute;n del coche.</h5>
              <h5>Paga  la renta antes de iniciar el servicio.</h5>
              <h5>El d&iacute;a de renta, re&uacute;nete con el propietario y firma el contrato de renta.</h5>
              <h5>Haz una revisi&oacute;n general del coche (Da&ntilde;os f&iacute;sicos y de mantenimiento).</h5>
           </div>
        </div>
   
 </div><!-- aqui termina e div parte arrendador izquierda --> 


 <div id="partearrendadorDER">

 <div class="media">
           <a href="#" class="pull-left">
              <img src="img/arrendador3.png" class="media-object" width="80px" height="80px" alt="imagen">
           </a>
        
          <h4 id="titulosarrendador" class="media-heading">2 Reservar</h4>
         
           <div class="pequecontenido">
             <h5>Busca una ciudad.</h5>
              <h5>Haz una propuesta a los propietarios (d&iacute;as y km).</h5>
              <h5>Los propietarios contestar&aacute;n lo m&aacute;s r&aacute;pido posible.</h5>
           </div>
        </div>

        <div class="media">
           <a href="#" class="pull-left">
              <img src="img/arrendador4.png" class="media-object" width="80px" height="80px" alt="imagen">
           </a>
        
          <h4 id="titulosarrendador" class="media-heading">4 Conducir</h4>
         
           <div class="pequecontenido">
             <h5>Toma las llaves.</h5>
              <h5>Eres responsable del coche y de las multas.</h5>
              <h5>Incluye un seguro de todos los riesgos.</h5>
              <h5>No hagas pagos en efectivo.</h5>
           </div>
        </div>
 </div><!-- aqui termina e div parte arrendador derecha --> 



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
      </div><!-- aqui termina el div de los botones -->
      <div id="b6"><a class="btn btn-primary btn-lg " href="<?php echo base_url(); ?>buscador" role="button"><strong>Necesito un vehículo</strong></a></div>
</div><!-- aqui termina e div comunidad 2 --> 
    <br>
    <br>
</div><!-- aqui termina el div container --> 