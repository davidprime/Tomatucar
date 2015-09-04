	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
  
      <!-- Form Validation -->
    <link href="<?php echo base_url(); ?>formvalidation/dist/css/formValidation.css" rel="stylesheet"/>
    <script src="<?php echo base_url(); ?>formvalidation/dist/js/formValidation.js"></script>	
    <script src="<?php echo base_url(); ?>formvalidation/dist/js/framework/bootstrap.min.js"></script>
     <script src="<?php echo base_url(); ?>js/cambiarvalidations.js"></script>
<!--comienza el contenido-->
<div class="container">

	<div><!-- Aqui comienza el div del contenido-->
	<br>
	
	<div id="contenidoRegistro" ><!-- Aqui comienza el div del panel panel-succeess-->
		<div><!-- Aqui comienza el contenido principal-->

			<h2 id="tRegistrate" class="text-center"><p class="verdeTitulo">¡TOMATUCAR!<small></p></h2>
			
			<hr class="colorgraph">
			
		<div id="formulario_correo">
        <form action="<?php echo base_url(); ?>reestablecerpass/establecerpass" method="post" id="cambiarcontrasenaform">

			<!-- Pasar info del correo -->
			
			
			<span style="visibility: hidden">
			<input type="text" name="email" value="<?php echo $email;?>">
			</span>
			
			

			<!-- Contraseña nueva -->
		
            <div class="form-group">
            <label class="pull-left">Nueva contraseña:</label>
            <div class="input-group">
            <input type="password" class="form-control" name="contrasenanueva" placeholder="Ingresa tu nueva contraseña">
            <span class="input-group-addon"><span class="glyphicon glyphicon-wrench"></span></span>
            </div>
            </div>

            <div class="form-group">
            <label class="pull-left">Confirmar contraseña:</label>
            <div class="input-group">
            <input type="password" class="form-control" name="contrasenanueva2"placeholder="Confirmar contraseña">
            <span class="input-group-addon"><span class="glyphicon glyphicon-check"></span></span>
            </div>
            </div>    
  
      		<div class="form-group">
		  		<button type="submit" class="btn btn-primary btn-lg pull-right" name="botonagregar" id="botonagregar">Guardar</button>
			</div>
      	</form> 
        
		<br><br><br>
		</div>

      <hr class="colorgraph">
			
	</div><!-- Aqui termina el panel panel-success-->	
</div><!-- Aqui termina el div del contenido-->	
    
   

</div>