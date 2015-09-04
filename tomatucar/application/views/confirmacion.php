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

		<div id="advertenciaAbajo" class="alert alert-warning"><strong><span class="glyphicon glyphicon-home"></span></strong> Si ya tienes una cuenta, inicia tu sesión desde aqui: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <u> <a id="b13" href="<?php base_url();?>login" role="button">  <strong>Iniciar Sesión</strong></a></u>
		</div>

	</div><!-- Aqui termina el panel panel-success-->	
</div><!-- Aqui termina el div del contenido-->	
    
   

</div>