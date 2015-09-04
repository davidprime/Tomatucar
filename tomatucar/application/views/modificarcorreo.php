    <link href="<?php echo base_url(); ?>formvalidation/dist/css/formValidation.css" rel="stylesheet"/>
    <script src="<?php echo base_url(); ?>formvalidation/dist/js/formValidation.js"></script>	
    <script src="<?php echo base_url(); ?>formvalidation/dist/js/framework/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/cambiarvalidations.js"></script>
    
     <!--David 11/05 -->
      <!-- jq para reestablecer contraseña -->
    <script type="text/javascript">
 $(document).ready(function(){
 	
 	$('#olvidarpass').click(function(){
     /* when the submit button in the modal is clicked, submit the form */
    $("#olvidarpassform").attr("action", "<?php echo base_url(); ?>auto/reestablecerpass");
    $('#olvidarpassform').formValidation('enableFieldValidators', 'email', false);
    $('#olvidarpassform').submit();
});	
	
});

//New ajax functions for cleaner submits

function ModificarEmail()
{
	$.ajax({
                data: new FormData($('#cambiaremailform')[0]),
                processData: false,
    			contentType: false,
                url:   '<?php echo base_url(); ?>modificarcorreo/cambiarcorreo',
                type:  'post',
                success:  function (response) 
                {
                	alert("Su correo a sido cambiado exitosamente");
                	location.reload();
                }
        });
}

function ModificarPass()
{
	$.ajax({
                data: new FormData($('#cambiarcontrasenaform')[0]),
                processData: false,
    			contentType: false,
                url:   '<?php echo base_url(); ?>modificarcorreo/cambiarcontrasena',
                type:  'post',
                success:  function (response) 
                {
                	alert("Su contraseña ha sido modificada exitosamente");
                	location.reload();
                }
        });
}

function BorrarPerfil()
{
	$.ajax({
                data: new FormData($('#eliminarcuentaform')[0]),
                processData: false,
    			contentType: false,
                url:   '<?php echo base_url(); ?>modificarcorreo/eliminarcuenta',
                type:  'post',
                success:  function (response) 
                {
                	alert("Su perfil ha sido borrado exitosamente");
                	location.reload();
                }
        });
}




</script>
<!--fin David 06/05 -->
    
<!--comienza el contenido-->
<div class="container">
	<div id="linknuevo"><a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>auto"><strong>+ </strong>Agregar un nuevo vehiculo</a></div>
<div id="contenidocuentaparametro" class="panel panel-default">
<nav id="menu" class="navsecundario">					
					<ul>
						<li>
							<a href="<?php echo base_url(); ?>filtroauto">
								<span class="icon">
									<i aria-hidden="true" class="glyphicon glyphicon-road"></i>
								</span>
								<span>Mis coches</span>
							</a>
						</li>
						<li class="subActivo">
							<a href="<?php echo base_url(); ?>perfil">
								<span class="icon"> 
									<i aria-hidden="true" class="glyphicon glyphicon-user"></i>
								</span>
								<span>Mi perfil</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>misRentas">
								<span class="icon">
									<i aria-hidden="true" class="glyphicon glyphicon-pencil"></i>
								</span>
								<span>Mis Rentas</span>
							</a>
						</li>   
						<li>
							<a href="cuenta_mispagos.html">
								<span class="icon">
									<i aria-hidden="true" class="glyphicon glyphicon-credit-card"></i>
								</span>
								<span>Pagos e ingresos</span>
							</a>
						</li>
					</ul>
				</nav>

			<div class="menu_vertical">
				<ul class="nav_list">
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>perfil">Modificar mi perfil</a></li>
				    <li class="active nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>modificarcorreo">Parametro de cuenta</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>modificarcuenta">Cuenta bancaria</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>ahijados">Ahijados</a></li>
				</ul>
			</div><!--termina menu vertical-->

      <div id="contenido_parametro">
       <div id="subComunidad"><h4 id="sub_mod_correo" class="text-left"><p style="padding-top:133px">Modificar mi Email</p></h4></div>

<!--CAMBIAR CORREO --->
       <div id="formulario_correo">
        <form enctype="multipart/form-data" role="form" method="post" id="cambiaremailform">
            <div class="form-group">
            <label class="pull-left" >Nuevo mail:</label>
            <div class="input-group">
            <input type="email" class="form-control" name="cambiaremail"placeholder="ejemplo@tomatuCAR.com">
            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            </div>
            </div>

            <div class="form-group">
            <label class="pull-left" >Contraseña:</label>
            <div class="input-group">
            <input type="password" class="form-control" name="contrasenaemail" placeholder="Ingresa tu contraseña">
            <span class="input-group-addon"><span class="glyphicon glyphicon-wrench"></span></span>
            </div>
            </div>    
            
            <!--David 06/05 -->
            <!-- Modal de contraseña -->            
            
            <div name="borrador" id="borrador"><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm" >
            	¿Olvidaste tu contraseña?</a></div>
            <!--Termina modal de contraseña-->	
            	       
      	<div class="form-group">
	<input onClick="ModificarEmail();" type="button" class="btn btn-primary btn-lg pull-right" value="Guardar">
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
      
<!--CAMBIAR CORREO --->      
      <br>
      
       </div><!--termina div formulariocorreo-->  

        <div id="subComunidad"><h4 id="sub_mod_correo" class="text-left"><p style="padding-top:15px">Modificar mi Contraseña</p></h4></div>


       <div id="formulario_correo">
        <form enctype="multipart/form-data" role="form" method="post" id="cambiarcontrasenaform">
            <div class="form-group">
            <label class="pull-left">Contraseña anterior:</label>
            <div class="input-group">
            <input type="password" class="form-control" name="cambiarcontrasena" placeholder="Ingresa tu contraseña anterior">
            <span class="input-group-addon"><span class="glyphicon glyphicon-wrench"></span></span>
            </div>
            </div>

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
<input onClick="ModificarPass();" type="button" class="btn btn-primary btn-lg pull-right" value="Guardar">
		</div>
      </form> 
<br>
</div>
        <div id="subComunidad"><h4 id="sub_mod_correo" class="text-left"><p style="padding-top:15px">Borrar mi perfil</p></h4></div>


       <div id="formulario_correo">
        <form enctype="multipart/form-data" role="form" method="post" id="eliminarcuentaform">
            <div class="form-group">
            <label class="pull-left">Contraseña:</label>
            <div class="input-group">
            <input type="password" class="form-control" name="eliminarcontrasena" placeholder="Ingresa tu contraseña" required>
            <span class="input-group-addon"><span class="glyphicon glyphicon-wrench"></span></span>
            </div>
            </div>     

      	
<input onClick="BorrarPerfil();" type="button" class="btn btn-danger btn-lg pull-right" value="Borrar"> 
		</div>
      </form>
       </div><!--termina div formulariocorreo-->  



      </div><!--termina contenido parametro-->
      
</div><!--termina contenido cuenta-->
</div><!--termina container-->