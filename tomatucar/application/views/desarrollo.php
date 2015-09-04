<!--comienza el contenido-->
<div class="container">
	
	 <div id="headComunidad" class="media">
           <a class="pull-left">
              <img src="img/rs.png" class="media-object" width="80px" height="80px" alt="imagen">
           </a>
           <div class="media-body">
             <h2 id="titulocomunidad" class="media-heading"><strong>Reserva simplificada</strong></h2>
           </div>
           <br>
           <div id="subComunidad"><h4><p class="verdeFuerte">¿Comó se desarrolla una renta con TomatuCAR?</p></h4></div>
           <br>
        </div>
		<div id="contenidodesarrollo">	
        <a class="pull-left">
              <span class="glyphicon glyphicon-ok"></span>
           </a>
           <div class="media-body" id="item3">
             <h5  class="media-heading" > <p class="text-justify">&nbsp; &nbsp;El arrendatario manda una reservación al propietario para la renta de un coche.</p></h5>
           </div>

           <a class="pull-left">
              <span class="glyphicon glyphicon-ok"></span>
           </a>
           <div class="media-body" id="item3">
             <h5  class="media-heading" > <p class="text-justify">&nbsp; &nbsp;El arrendatario debe hacer el pago de la renta en el sitio por tarjeta bancaria.</p></h5>
           </div>

           <a class="pull-left">
              <span class="glyphicon glyphicon-ok"></span>
           </a>
           <div class="media-body" id="item3">
             <h5  class="media-heading" ><p class="text-justify">&nbsp; &nbsp;Antes de la renta, el propietario debe imprimir el contrato de renta, los documentos de declaración  de daños y las instrucciones para el arrendatario.</p></h5>
           </div>

           <a class="pull-left">
              <span class="glyphicon glyphicon-ok"></span>
           </a>
           <div class="media-body" id="item3">
             <h5  class="media-heading" ><p class="text-justify">&nbsp; &nbsp;El día de la renta, es el encontró entre el propietario y el arrendatario para la entrega de las llevas, el check-up del coche y la firma del contrato (no olvidar de apuntar el km inicial y la gasolina).</p></h5>
           </div>
          </div>

          <div id="contenidodesarrollo2">	
        <a class="pull-left">
              <span class="glyphicon glyphicon-ok"></span>
           </a>
           <div class="media-body" id="item3">
             <h5  class="media-heading" > <p class="text-justify">&nbsp; &nbsp;Al fin de la renta, el arrendatario debe entregar el coche en el lugar de entrega y firmar el contrato de renta. Ambos partes deben verificar el estado del coche (no olvidar de apuntar el km final y checar la gasolina).</p></h5>
           </div>

           <a class="pull-left">
              <span class="glyphicon glyphicon-ok"></span>
           </a>
           <div class="media-body" id="item3">
             <h5  class="media-heading" > <p class="text-justify">&nbsp; &nbsp;Mandar una foto del contrato a TomatuCAR si hay un pago extra para que nos encarguemos de la transacción (km y daño).</p></h5>
           </div>

           <a class="pull-left">
              <span class="glyphicon glyphicon-ok"></span>
           </a>
           <div class="media-body" id="item3">
             <h5  class="media-heading" > <p class="text-justify">&nbsp; &nbsp;Si hay un pago extra, TomatuCAR tomara el dinero sobre la cuenta el … de la semana siguiente.</p></h5>
           </div>

           <a class="pull-left">
              <span class="glyphicon glyphicon-ok"></span>
           </a>
           <div class="media-body" id="item3">
             <h5  class="media-heading" > <p class="text-justify">&nbsp; &nbsp;Dejar un comentario sobre el propietario.</p></h5>
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