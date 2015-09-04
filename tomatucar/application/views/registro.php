 
      <!-- Form Validation -->
    <link href="<?php echo base_url(); ?>formvalidation/dist/css/formValidation.css" rel="stylesheet"/>
    <script src="<?php echo base_url(); ?>formvalidation/dist/js/formValidation.js"></script>	
    <script src="<?php echo base_url(); ?>formvalidation/dist/js/framework/bootstrap.min.js"></script>

	<!-- reCaptcha2 addon -->
	<script src="<?php echo base_url(); ?>formvalidation/dist/js/addons/reCaptcha2.min.js"></script>


    <script src="<?php echo base_url(); ?>js/registervalidation.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
	<style>
	.override-modal-open.modal-open .modal {
    overflow-y: scroll;
}
	</style>
	
	 <script type="text/javascript"> 
	 //Guarda informacion general
	             $(document).ready(function() {
	             	 
                $("#agregarform").submit(function( event ) {
                     /*dropdown post */
                    $("#infocerrar" ).click(function() {
			    		$('#info-exito').modal('hide');
					});
                    
                });
                
                
                $('#info-exito').on('hidden.bs.modal', function (event) 
                	{
						window.location.href = '<?php echo base_url(); ?>home';
					})
                
            });
            
          
	 </script>
<!--comienza el contenido-->
<div class="container">

	<div><!-- Aqui comienza el div del contenido-->
	<br>
	
	<div id="contenidoRegistro" ><!-- Aqui comienza el div del panel panel-succeess-->
		<div><!-- Aqui comienza el contenido principal-->
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h2 id="tRegistrate" class="text-center"><p class="verdeTitulo">¡Registrate ahora!<small> Es gratis.</small></p></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<hr class="colorgraph">
				</div>
			</div>								
			<form id="agregarform" method="post">	
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<?php echo $mensaje;?>
				</div>
			</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<div class="col-md-6" style="padding-left: 0; padding-right: 0">
								<div class="form-group">
									<div class="input-group input-group" >
										<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
				                        <input type="text" name="nombre"class="form-control" placeholder="Nombre(s)" tabindex="1">
									</div>
								</div>
							</div>
		
							<div class="col-md-6" style="padding-left: 0; padding-right: 0">
								<div class="form-group">
									<div class="input-group input-group" >
										<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
				                        <input type="text"  name="apellidos" class="form-control" placeholder="Apellidos" tabindex="2">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<div class="form-group">
								<div class="input-group input-group" >
									
									 <span class="input-group-addon"><strong>@</strong></span>
			                        <input type="email"  name="email" id="email" class="form-control" placeholder="ejemplo@TomatuCAR.com" tabindex="3">
								</div>
							</div>
						</div>
					</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
					<div class="col-md-6" style="padding-left: 0; padding-right: 0">
						<div class="form-group">
							<div class="input-group input-group" >
								 <span class="input-group-addon"><span class="glyphicon glyphicon-wrench"></span></span>
		                        <input type="password" name="contrasena" class="form-control" placeholder="Contraseña" tabindex="4">
							</div>
						</div>
					</div>

					<div class="col-md-6" style="padding-left: 0; padding-right: 0">
						<div class="form-group">
							<div class="input-group input-group" >
								<span class="input-group-addon"><span class="glyphicon glyphicon-wrench"></span></span>
		                        <input type="password" name="contrasena2" class="form-control" placeholder="Cofirma contraseña" tabindex="5">
							</div>
						</div>
					</div>
		</div>
	</div>	


 <!-- Elemento de Captcha -->
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="col-md-6" style="padding-left: 0; padding-right: 0">
		    <div class="form-group">   

		            <div id="captchaContainer"></div>
	   	 </div>
	</div>
</div>	




	
<div class="row">
	<div class="col-md-6 col-md-offset-3">
				<div class="col-md-6">
						<div class="form-group">
							<span class="button-checkbox">
							<label class="checkbox-inline">
							<input type="checkbox" value="" name="acepto[]" tabindex="6">Acepto</label>
							</span>
						</div>
				</div>
						<div class="col-md-6">
							 Cuando te <strong class="label label-primary">Registras</strong> tu aceptas los <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terminos y condiciones</a> de este sitio, incluyendo el uso de cookies.
						</div>
	</div>
</div>	
					<div id="bregistro">
						
						<button type="submit" class="btn btn-info btn-lg pull-right" tabindex="7">Registrarse</button>
						</div>
				</form>
					<br>
					<br>
					<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Terminos & Condiciones</h4>
			</div>
			<div class="modal-body" style="height: 500px;">
			   <div id="modalcontenido" style="height: 450px;">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>		
                 </div> 
			</div><!-- termina modal body-->
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

		</div><!-- Aqui termina el div del contenido principal-->
		
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<hr class="colorgraph">
				</div>
			</div>	
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="alert alert-warning"><strong><span class="glyphicon glyphicon-home"></span></strong> Si ya tienes una cuenta, inicia tu sesión desde aqui: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <u> <a id="b13" href="<?php echo base_url(); ?>login" role="button">  <strong>Iniciar Sesión</strong></a></u>
				</div>
			</div>
		</div>

	</div><!-- Aqui termina el panel panel-success-->	
</div><!-- Aqui termina el div del contenido-->	
    
   

</div>