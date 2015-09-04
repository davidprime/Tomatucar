<!--aqui termina el header de la pagina-->
    <link href="<?php echo base_url(); ?>formvalidation/dist/css/formValidation.css" rel="stylesheet"/>
    <script src="<?php echo base_url(); ?>formvalidation/dist/js/formValidation.js"></script>	
    <script src="<?php echo base_url(); ?>formvalidation/dist/js/framework/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/formvalidations.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
 <script type="text/javascript">     
            $(document).ready(function() { 
                $("#idpaisdireccion").change(function(){
                     /*dropdown post */
                    if($(this).val() != '141')
                    {
                    	var idselectEstado = document.getElementById('idestadodireccion');
    					var idselectCiudad = document.getElementById('idciudaddireccion');	
                    	var selectEstado = document.getElementById('estadodireccion');
    					var selectCiudad = document.getElementById('ciudaddireccion');	

    					if(idselectEstado.style.display == 'block')
    					{
	    					idselectEstado.style.display = 'none';
	    					idselectCiudad.style.display = 'none';
	    					selectEstado.style.display = 'block';
	    					selectCiudad.style.display = 'block';
    					}
    					else
    					{
	    					idselectEstado.style.display = 'block';
	    					idselectCiudad.style.display = 'block';
	    					selectEstado.style.display = 'none';
	    					selectCiudad.style.display = 'none';
    					}
                    }
                    else
                    {
                    	var idselectEstado = document.getElementById('idestadodireccion');
    					var idselectCiudad = document.getElementById('idciudaddireccion');	
                    	var selectEstado = document.getElementById('estadodireccion');
    					var selectCiudad = document.getElementById('ciudaddireccion');	
                    	
                    	if(idselectEstado.style.display != 'block')
    					{
	    					idselectEstado.style.display = 'block';
	    					idselectCiudad.style.display = 'block';
	    					selectEstado.style.display = 'none';
	    					selectCiudad.style.display = 'none';
    					}

	                    $.ajax({
	                    url:"<?php echo base_url(); ?>perfil/crearDDEstados",    
	                    data: {pais: $(this).val()},
	                    type: "POST",
	                    success: function(data){     
	                      $("#idestadodireccion").html(data);
	                    }
	                    });
                    }
                    
                });
            });
            $(document).ready(function() { 
                $("#idestadodireccion").change(function(){
                     /*dropdown post */
                    
                    $.ajax({
                    url:"<?php echo base_url(); ?>perfil/crearDDCiudades",    
                    data: {estado: $(this).val()},
                    type: "POST",
                    success: function(data){     
                      $("#idciudaddireccion").html(data);
                    }
                    });
                    
                });
            });
            $(document).ready(function() { 
                $("#perfil").change(function(){                    
					         $.ajax({
			                data: new FormData($('#perfilform')[0]),
			                processData: false,
			    			contentType: false,
			                url:   '<?php echo base_url(); ?>perfil/subirfotos',
			                type:  'post',
			                success:  function (data) 
			                {
			                	if(data == '1')
			                	{
			                		$('#foto-exito').modal('show');
			                		$("#perfil").val('');
			                		
			                	}
			                }
			     		   });
			    $("#cerrar" ).click(function() {
			    		$('#foto-exito').modal('hide');
  						location.reload();
					});
                    
                });
            });
            $(document).ready(function() { 
                $("#licencia").change(function(){                    
					         $.ajax({
			                data: new FormData($('#perfilform')[0]),
			                processData: false,
			    			contentType: false,
			                url:   '<?php echo base_url(); ?>perfil/subirfotos',
			                type:  'post',
			                success:  function (data) 
			                {
			                	if(data == '1')
			                	{
			                		$('#foto-exito').modal('show');
			                		$("#licencia").val('');
			                	}
			                }
			     		   });
                });
			    $("#cerrar" ).click(function() {
			    		$('#foto-exito').modal('hide');
  						location.reload();
					});
            });
 </script>    
 <style>
 	.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
 </style>
<!--comienza el contenido-->
<div class="container">
	<div id="linknuevo"><a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>auto"><strong>+ </strong>Agregar un nuevo vehiculo</a></div>
<div id="contenidocuentaUsuario" class="panel panel-default">
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
							<a href="cuenta_misrentas.html">
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
				    <li class="active nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>perfil">Modificar mi perfil</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>modificarcorreo">Parametro de cuenta</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>modificarcuenta">Cuenta bancaria</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>ahijados">Ahijados</a></li>
				</ul>
			</div><!--termina menu vertical-->



<div class="contenedorFoto">

         <div id="subComunidad"><h4 class="text-center"><p style="padding-top:122px">Informacion necesaria para rentar tu coche en TomatuCAR</p></h4></div>
        
        <div class="example__left" style="padding-top:33px">
    				<?php if($fotoperfil){ ?>
      				<img src="<?php echo base_url(); ?>uploads/<?php echo $fotoperfil;?>" width="200px" height="200px">
      				<?php }else{ ?>
      				<img src="<?php echo base_url(); ?>img/userpic.gif" width="200px" height="200px">	
      				<?php } ?>
  			</div>		
        
        <div id="formulario_usuario">

          <?php echo form_open_multipart('perfil/subirInformacion', 'id="perfilform"');?>

    		<div class="form-group">
        		<label class="pull-left">Foto de Perfil:</label>
            	<div class="fileUpload btn btn-primary">
    				<span>Subir Imagen</span>
    				<input type="file" class="upload" name="perfil" id="perfil" accept="image/jpg, image/jpeg, image/png, image/JPG, image/JPEG, image/PNG" />
				</div>
    		</div>
            

		  
            <div class="form-group">
            <label class="pull-left" >Nombre:</label>
            <div class="input-group">
            <input type="text" class="form-control" name="nombre" placeholder="Ingresa tu nombre completo" value=<?php echo $nombre;?>>
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            </div>
            </div>

            <div class="form-group">
            <label class="pull-left">Apellidos:</label>
            <div class="input-group">
            <input type="text" class="form-control" name="apellido" placeholder="Ingresa tus apellidos" value="<?php echo $apellido;?>">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            </div>
            </div>

            <div class="form-group">
            <label class="pull-left" >Email:</label>
            <div class="input-group">
            <input type="email" class="form-control" name="email" placeholder="Ingresa tu email" value="<?php echo $correo;?>" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            </div>
             <div id="ayuda">
           <p><a class="tooltip-right" data-tooltip="Si quieres cambiar el email, debes ir al parametro de cuenta, cambiar mi Email"><img src="<?php echo base_url(); ?>img/signo.jpg" width="15px" height="15px" alt=""></a></p>
         </div>
            </div>


            <div class="form-group">
            <label class="pull-left" class="verdeFuerte" for="InputName">Telefono:</label>
            <div class="input-group">
            <input type="text" class="form-control" name="telefono" placeholder="Ingresa tu telefono 1234567890" value="<?php echo $telefono;?>" pattern="^\d{10}$" data-fv-regexp-message="10 digitos sin espacios incluye lada">
            <span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
            </div>
            </div>

            <div class="form-group">
            <label class="pull-left">Fecha de nacimiento:</label>
            <div class="input-group input-append date" id="datePicker">
            <input type="text" class="form-control" name="nacimiento" placeholder="Ingresa tu fecha de naciemiento" value="<?php echo $fechanacimiento;?>">
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            <div id="ayuda">
            <p><a class="tooltip-right" data-tooltip="Para rentar o anunciar un carro debes ser mayor de edad"><img src="<?php echo base_url(); ?>img/signo.jpg" width="15px" height="15px" alt=""></a></p>
            </div>
            </div>

            <div class="form-group">
            <label class="pull-left">Pais de nacimiento:</label>
            <div class="input-group">
			<?php echo form_dropdown('paisnacimiento', $paises,$idpaisnacimiento,'class="form-control"'); ?>
            <span class="input-group-addon"><span class="glyphicon glyphicon-screenshot"></span></span>
            </div>
            </div>

            <div class="form-group">
            <label class="pull-left">Direccion:</label>
            <div class="input-group">
            <input type="text" class="form-control" name="direccion"  placeholder="Ingresa tu direccion" value="<?php echo $calle;?>">
            <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
            </div>
            </div>

            <div class="form-group">
            <label class="pull-left">Codigo postal:</label>
            <div class="input-group">
            <input type="text" class="form-control" name="codigopostal" placeholder="Ingresa tu codigo postal" value="<?php echo $codigopostal;?>">
            <span class="input-group-addon"><span class="glyphicon glyphicon-send"></span></span>
            </div>
            </div>
            
            <div class="form-group">
            <label class="pull-left">Pais:</label>
            <div class="input-group">
			<?php echo form_dropdown('idpaisdireccion', $paises,$idpaisdireccion,'class="form-control" id="idpaisdireccion"'); ?>
            <span class="input-group-addon"><span class="glyphicon glyphicon-screenshot"></span></span>
            </div>
            </div>
              
                         
		  <div class="form-group" >
		    <label class="pull-left">Estado</label>
		    <div class="input-group">
		    <?php if($idestadodireccion > 0) {?>
		     	<?php echo form_dropdown('idestadodireccion', $estados,$idestadodireccion,'class="form-control" id="idestadodireccion"'); ?>	
		    <?php } else{ ?>
			    <select class="form-control" name="idestadodireccion" id="idestadodireccion" placeholder="Estado" style="display:block">
					<option value="">Seleccionar...</option>
				</select>		    
		    <?php } ?>

			<input type="text" class="form-control" name="estadodireccion" id="estadodireccion" placeholder="Nombre de Estado" value="<?php echo $estadodireccion;?>" style="display:none">
			<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
		  </div>
		  </div>              
                       
		  <div class="form-group" >
		    <label class="pull-left">Ciudad</label>
		    <div class="input-group">
		    <?php if($idciudaddireccion > 0) {?>
		    	<?php echo form_dropdown('idciudaddireccion', $ciudades,$idciudaddireccion,'class="form-control" id="idciudaddireccion"'); ?>	
		    <?php } else{ ?>
		    <select class="form-control" name="idciudaddireccion" id="idciudaddireccion" placeholder="Ciudad" style="display:block">
				<option value="">Seleccionar...</option>
			</select>
			<?php } ?>
			<input type="text" class="form-control" name="ciudaddireccion" id="ciudaddireccion" placeholder="Nombre de Ciudad" value="<?php echo $ciudaddireccion;?>" style="display:none">
			<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
		  </div>
		  </div> 
		  
			<div  class="alert alert-warning"><strong></strong> Campos necesarios para rentar un coche.</div> 
            
            <div class="form-group">
            <label class="pull-left">Numero de licencia:</label>
            <div class="input-group">
            <input type="text" class="form-control" name="numerolicencia"  placeholder="Ingresa tu numero de licencia" value="<?php echo $numerolicencia;?>">
            <span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></span>
            </div>
            </div>

            <div class="form-group">
            <label class="pull-left">Antigüedad de licencia:</label>
            <div class="input-group input-append date" id="fechaantiguedad">
            <input type="text" class="form-control" name="antiguedad" placeholder="Ingresa la fecha de antigüedad" value="<?php echo $fechaantiguedad;?>">
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            </div>

            <div class="form-group">
            <label class="pull-left">Expiración de licencia:</label>
            <div class="input-group input-append date" id="fechaexpiracion">
            <input type="text" class="form-control" name="expiracion" placeholder="Ingresa la fecha de antigüedad" value="<?php echo $fechaexpiracion;?>">
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            </div>
			
    		<div class="form-group">
        		<label class="pull-left">Foto de Licencia:</label>
            	<div class="fileUpload btn btn-primary">
    				<span>Subir Imagen</span>
    				<input type="file" class="upload" name="licencia" id="licencia" accept="image/jpg, image/jpeg, image/png, image/JPG, image/JPEG, image/PNG" />
				</div>
    		</div>
    		
        <div class="form-group" style="padding-top:33px">
    				<?php if($fotolicencia){ ?>
      				<img src="<?php echo base_url(); ?>uploads/<?php echo $fotolicencia;?>" width="358px" height="200px">
      				<?php }else{ ?>
      				<img src="<?php echo base_url(); ?>img/licencia.jpg" width="358px" height="200px">	
      				<?php } ?>
         </div> 
         
      	<div class="form-group">
		  	<button type="submit" class="btn btn-primary" name="botonagregar" id="botonagregar">Guardar</button>
		</div>
      

	<?php echo form_close();?>

      </div>
  </div> <!--termina contenedor foto-->      

<!-- Small modal -->		
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" name="foto-exito" id="foto-exito">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Foto Actualizada</h4>
      </div>
      <div class="modal-body">
        <p>¡Foto actualizada correctamente!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="cerrar" name="cerrar">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div><!--termina contenido cuenta-->
</div><!--termina container-->

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
  <script>
			//  The function to change the class
			var changeClass = function (r,className1,className2) {
				var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");
				if( regex.test(r.className) ) {
					r.className = r.className.replace(regex,' '+className2+' ');
			    }
			    else{
					r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"),' '+className1+' ');
			    }
			    return r.className;
			};	
 </script>
