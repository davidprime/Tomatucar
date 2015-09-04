<!--comienza el contenido-->
<div class="container">
	<div id="headComunidad" class="media">
           <a class="pull-left">
              <img src="img/patrocinador.png" class="media-object" width="80px" height="80px" alt="imagen">
           </a>
           <div class="media-body">
             <h2 id="titulocomunidad" class="media-heading"><strong> ¡Promociona TomatuCAR!</strong></h2>
           </div>
           <br>
           <div id="subpatrocinador"><h4><p >¡Si tu ahijado gana 10 000$ pesos, ganas 500$ pesos!</p></h4></div>
           <div id="subpatrocinador2"><h4><p >¡5% de las rentas durante un año!</p></h4></div>
           <br>
     </div>

     <div id="contenidopromociona">
     <div id="lista3">
     	<a class="pull-left">
              <img src="img/1.png" alt="Vuelve al inicio" class="img-responsive" class="img-rounded" width="40px" height="40px">
           </a>
           <div class="media-body" id="item2">
             <h5  class="media-heading" > Puedes usar las redes sociales como Facebook, twitter. Si una persona da un clic en el link en tu muro y se registra en el sitio TomatuCAR, ya eres su padrino durante un año y ganas 5% de todas sus rentas sin hacer nada más.</h5>
           </div>

           <a class="pull-left">
              <img src="img/2.png" alt="Vuelve al inicio" class="img-responsive" class="img-rounded" width="40px" height="40px">
           </a>
           <div class="media-body" id="item2">
             <h5  class="media-heading" > Puedes mandar un mail a tus amigos, si abren el sitio a partir de tu mail ya eres sus padrino!</h5>
           </div>

           <a class="pull-left">
              <img src="img/3.png" alt="Vuelve al inicio" class="img-responsive" class="img-rounded" width="40px" height="40px">
           </a>
           <div class="media-body" id="item2">
             <h5  class="media-heading" > Cuando tu ahijado se inscribe en el sitio, tiene la posibilidad de agregar tu mail y así hacer de usted su padrino para que  ganes 5% de todas sus rentas durante un año.</h5>
           </div>
	</div><!-- aqui termina la lista -->
	</div>

	<div id="contenidopatrocinaDER">
	
	<div id="imagenes">
	 <div id="img1"><a href=""><img src="img/comFace.png"  class="img-responsive" class="img-rounded" height="40px" width="300px" alt=""></div>
	 <div id="img2"><a href=""><img src="img/comTwiter.png"  class="img-responsive" class="img-rounded" height="40px" width="300px" alt=""></div>
	</div><!-- el dive de las imagenes -->
	<?php if($this->session->userdata('nombre')){?>
			<div id="b7"><a href="<?php echo base_url(); ?>auto"class="btn btn-primary btn-lg" role="button"><strong>¡Gana dinero ya!</strong></a></div>
    <?php }else{ ?>
			<div id="b7"><a href="<?php echo base_url(); ?>login"class="btn btn-primary btn-lg" role="button"><strong>¡Registra tu auto ya!</strong></a></div>
	<?php } ?>	

	</div>
   	
     </div>
</div>