	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
  
      <!-- Form Validation -->
    <link href="<?php echo base_url(); ?>formvalidation/dist/css/formValidation.css" rel="stylesheet"/>
    <script src="<?php echo base_url(); ?>formvalidation/dist/js/formValidation.js"></script>	
    <script src="<?php echo base_url(); ?>formvalidation/dist/js/framework/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/formvalidations.js"></script>
<!--comienza el contenido-->
<div class="container">

	<div><!-- Aqui comienza el div del contenido-->
	<br>
	
	<div id="contenidoRegistro" ><!-- Aqui comienza el div del panel panel-succeess-->
		<div><!-- Aqui comienza el contenido principal-->

			<h2 id="tRegistrate" class="text-center"><p class="verdeTitulo">¡TOMATUCAR!<small></p></h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<?php echo $mensaje;?>
				</div>
			</div>
			
					<br>
					<br>
					<!-- Modal -->


		</div><!-- Aqui termina el div del contenido principal-->
		
		<hr class="colorgraph">

		<div id="advertenciaAbajo" class="alert alert-warning"><strong><span class="glyphicon glyphicon-home"></span></strong> Si ya tienes una cuenta, inicia tu sesión desde aqui: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <u> <a id="b13" href="login.html" role="button">  <strong>Iniciar Sesión</strong></a></u>
		</div>

	</div><!-- Aqui termina el panel panel-success-->	
</div><!-- Aqui termina el div del contenido-->	
    
   

</div>

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
        <li><a href=""><img src="<?php echo base_url(); ?>img/facebook.png" height="20px" width="30px" alt=""></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>img/twiter.png" height="20px" width="30px" alt=""></a></li>
        <li><a href=""><img src="<?php echo base_url(); ?>img/google.png" height="20px" width="30px" alt=""></a></li>
        </ul>
      </div>  
  </div>  
</div>

<hr>