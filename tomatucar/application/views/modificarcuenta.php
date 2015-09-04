    <link href="<?php echo base_url(); ?>formvalidation/dist/css/formValidation.css" rel="stylesheet"/>
    <script src="<?php echo base_url(); ?>formvalidation/dist/js/formValidation.js"></script>	
    <script src="<?php echo base_url(); ?>formvalidation/dist/js/framework/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/cambiarvalidations.js"></script>
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
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>modificarcorreo">Parametro de cuenta</a></li>
				    <li class="active nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>modificarcuenta">Cuenta bancaria</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>ahijados">Ahijados</a></li>
				</ul>
			</div><!--termina menu vertical-->

      <div id="contenido_parametro">
       <div id="subComunidad"><h4 id="sub_mod_correo" class="text-left"><p style="padding-top:133px">Modificar mi Cuenta Bancaria</p></h4></div>

<!--CAMBIAR CORREO --->
       <div id="formulario_correo">
        <form action="<?php echo base_url(); ?>modificarcuenta/cambiarcuenta" method="post" id="cambiarcuentaform">
            <div class="form-group">
            <label class="pull-left" >Nueva Cuenta Bancaria:</label>
            <div class="input-group">
            <input type="text" class="form-control" name="cambiarcuenta"placeholder="18 dígitos CLABE">
            <!-- David 06/05/2015 -->
            <!-- Imagen de banco -->
            <span class="input-group-addon"><image src="<?php echo base_url();?>img/glyphicon bank.png" width="18px" height="18px"></span>
            </div>
            </div>

            <div class="form-group">
            <label class="pull-left" >Contraseña:</label>
            <div class="input-group">
            <input type="password" class="form-control" name="contrasenacuenta" placeholder="Ingresa tu contraseña">
            <span class="input-group-addon"><span class="glyphicon glyphicon-wrench"></span></span>
            </div>
            </div>     
      	<div class="form-group">
		  	<button type="submit" class="btn btn-primary btn-lg pull-right" name="botonagregar" id="botonagregar">Guardar</button>
		</div>
      </form>     
      <br>
      
       </div><!--termina div formulariocorreo-->  

      </div><!--termina contenido parametro-->
      
</div><!--termina contenido cuenta-->
</div><!--termina container-->