<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />


<!--comienza el contenido-->
<div class="container">
<div id="contenido4">
    <div class="panelBorde2" class="panel" >
    <div class="panel-body" class="contenedor">
      <h2 id="tituloporque" class="text-center"><strong>Contrato de renta</strong></h2>
      <br>
       <div class="media">
              <img class="pull-left" src="img/contratoR1.png" class="media-object" width="80px" height="80px" alt="Validar Operación">
           <div class="media-body">
             <h4 class="media-heading">Validar la Operación </h4>
             <p class="text-justify"  >Cuando haces una reservación de coche, TomatuCAR te da un contrato de renta para validar la operación.</p>
           </div>
        </div>
        
        <br>

       <div class="media">
              <img class="pull-left" src="img/contratoR2.png" class="media-object" width="80px" height="80px" alt="Acceder al Contrato">
           <div class="media-body">
             <h4 class="media-heading"> Acceder al Contrato </h4>
             <p class="text-justify"  >Una vez el pago realizado, usted tendrá acceso al contrato de renta con la información del arrendatario y deberá completarlo en « mi cuenta »..</p>
           </div>
        </div>
        
        <br>
        
        <div class="media">
              <img class="pull-left" src="img/contratoR3.png" class="media-object" width="80px" height="80px" alt="Imprimir y Entregar">
           <div class="media-body">
             <h4 class="media-heading">Imprimir y Entregar</h4>
             <p class="text-justify"  >El propietario imprime dos copias del contrato de renta que debe llenar con el arrendatario presente, el día de la entrega del auto.</p>
           </div>
        </div>

        <br>

            <div class="media">
              <img class="pull-left" src="img/contratoR4.png" class="media-object" width="80px" height="80px" alt="Verificar Información">
           <div class="media-body">
             <h4 class="media-heading">Verificar la Información</h4>
             <p class="text-justify"  >La información debe ser precisa y verificada para validar el seguro, el número de la tarjeta de crédito y la licencia de manejo del arrendatario.</p>
           </div>
        </div>

        <br>

            <div class="media">
              <img class="pull-left" src="img/contratoR5.png" class="media-object" width="80px" height="80px" alt="Conservar el Contrato">
           <div class="media-body">
             <h4 class="media-heading">Conservar el Contrato</h4>
             <p class="text-justify"  >Se debe conservar el contrato durante un año al final de la renta, porque puede servir de prueba en caso de multas.</p>
           </div>
        </div>

        <br>

            <div class="media">
              <img class="pull-left" src="img/contratoR6.png" class="media-object" width="80px" height="80px" alt="Convenio Seguro">
           <div class="media-body">
             <h4 class="media-heading">Convenio Seguro</h4>
             <p class="text-justify"  >El contrato de renta está cerrado entre el propietario y el arrendatario sin la interferencia de TomatuCAR.</p>
           </div>
        </div>
        
      </div><!--termina pannel body-->
  </div><!--termina panel panel-success-->
</div><!--termina contenido 1-->

<div id="contenido5">
    <div id="contratoContenido">

    <div id="logo3"><a href="C:\Users\pc1\Dropbox\Site tomatucar\documentos\imagen\contrato.pdf"><img src="img/contrato.png" alt="Vuelve al inicio" class="img-responsive" class="img-rounded" width="250px" height="450px"></a></div>

    <div id="borde" class="panel panel-default" >
      <div class="panel-body">
    <p class="text-justify" >Para conocer los términos del contrato de arrendamiento <a href="tcondiciones.html"><strong><u>click aqui</u></strong></a></p> 
      </div>
    </div>


		<?php if($this->session->userdata('nombre')){?>
				<div id="BRV"><a href="<?php echo base_url(); ?>auto" class="btn btn-success btn-lg" role="button"><strong>Rentar mi vehículo</strong></a></div>
	    <?php }else{ ?>
				<div id="BRV"><a href="<?php echo base_url(); ?>login" class="btn btn-success btn-lg" role="button"><strong>Rentar mi vehículo</strong></a></div>
		<?php } ?>	

    <div id="BNV"><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>buscador" role="button"><strong>Necesito un vehículo</strong></a></div>     
    
    </div><!--termina pannel body-->
  </div><!--termina panel panel-success-->
</div><!--termina contenido 2-->