      <!-- Form Validation -->
    <link href="<?php echo base_url(); ?>formvalidation/dist/css/formValidation.css" rel="stylesheet"/>
    <script src="<?php echo base_url(); ?>formvalidation/dist/js/formValidation.js"></script>	
    <script src="<?php echo base_url(); ?>formvalidation/dist/js/framework/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/registervalidation.js"></script>
<!--comienza el contenido-->
<div class="container">

	<div><!-- Aqui comienza el div del contenido-->
	<br>
	<!-- Aqui comienza el div del panel panel-succeess-->
		<div><!-- Aqui comienza el contenido principal-->
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h2 id="tRegistrate" class="text-center"><p class="verdeTitulo">Iniciar Sesión</p></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<hr class="colorgraph">
				</div>
			</div>								
			<form id="iniciarform" method="post">	
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<?php echo $mensaje;?>
				</div>
			</div>
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="form-group">
								<div class="input-group input-group" >
									 <span class="input-group-addon"><strong>@</strong></span>
			                        <input type="email"  name="email" class="form-control" placeholder="Correo Electrónico" tabindex="1">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="form-group">
								<div class="input-group input-group" >
									 <span class="input-group-addon"><span class="glyphicon glyphicon-wrench"></span></span>
			                        <input type="password" name="contrasena" class="form-control" placeholder="Contraseña" tabindex="2">
								</div>
							</div>
						</div>
					</div>
					            <!--David 06/05 -->
            <!-- Modal de contraseña -->            
					<div class="row">
						<div class="col-md-4 col-md-offset-4 text-center">
            				<a href="#" data-toggle="modal" data-target=".bs-example-modal-sm" >¿Olvidaste tu contraseña?</a>
						</div>
					</div>            

            <!--Termina modal de contraseña-->	
            <br>
            
					<div class="row">
						<div class="col-md-4 col-md-offset-4 text-center">					
							<button type="submit" class="btn btn-info btn-lg pull-center" tabindex="3">Entrar</button></div>
						</div>
				</form>
  <!-- MODAL SI SE OLVIDO CONTRASEÑA -->		
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    
        <div class="modal-content">
        	
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <br>
        <div class="alert alert-info"><h4 class="modal-title" id="myModalLabel">¿Deseas cambiar tu contraseña?</h4></div>
      </div>
      
      <div class="modal-body">
      <form id="olvidarpassform" name="olvidarpassform" method="post" action="<?php echo base_url(); ?>reestablecerpass">
      <div class="form-group">
            <label class="verdeFuerte" for="InputName">Envianos tu correo:</label>
            <div class="input-group">
            <input type="email" class="form-control" name="email" placeholder="ejemplo@TomatuCAR.com" required>
            <span class="input-group-addon"><span class="glyphicon glyphicon-wrench"></span></span>
            </div><span class="help-block"><p class="text-left" class="verdeFuerte">No te preocupes, te enviaremos los pasos necesarios para restablecerla.</p></span>
              </div>
       
          <input  type="submit" name="olvidarpass" id="olvidarpass" value="enviar" class="btn btn-primary">
      </form>
            
      </div><!-- termina modal body-->
      
    </div><
    
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
      <!--fin David 06/05 -->
		</div><!-- Aqui termina el div del contenido principal-->
		
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<hr class="colorgraph">
				</div>
			</div>	
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="alert alert-warning"><strong><span class="glyphicon glyphicon-home"></span></strong> Si no tienes una cuenta, registrate aqui: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <u> <a id="b13" href="<?php echo base_url(); ?>registro" role="button">  <strong>Registro</strong></a></u>
				</div>
			</div>
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
