<link href="<?php echo base_url(); ?>css/botonesradio.css" rel="stylesheet">
<!--comienza el contenido-->
<div class="container">
	<div id="linknuevo"><a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>auto"><strong>+ </strong>Agregar un nuevo vehiculo</a></div>
<div id="contenidocuenta_opciones" class="panel panel-default">
<nav id="menu" class="navsecundario">					
					<ul>
						<li class="subActivo">
							<a href="<?php echo base_url(); ?>filtroauto">
								<span class="icon">
									<i aria-hidden="true" class="glyphicon glyphicon-road"></i>
								</span>
								<span>Mis coches</span>
							</a>
						</li>
						<li >
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

<?php foreach ($detallecoche as $item): ?>
			<div class="menu_vertical">
				<ul class="nav_list">
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autoinfogeneral/<?php echo $item['IdCoche'];?>">Info general</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificarfoto/<?php echo $item['IdCoche'];?>">Modificar foto</a></li>
<li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autocalendario/<?php echo $item['IdCoche'];?>">Calendario</a></li>
				    <li class="active nav_item"><a class="nav_item_link" href="<?php echo current_url(); ?>">Opciones</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificarprecio/<?php echo $item['IdCoche'];?>">Precio</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autopromocionar/<?php echo $item['IdCoche'];?>">Promocionar</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autoborrar/<?php echo $item['IdCoche'];?>">Borrar / desactivar</a></li>
				</ul>
			</div><!--termina menu vertical-->
   
      <div id="contenido_opciones">
      <div id="subComunidad"><h4 id="sub_opciones" class="text-left"><p style="padding-top:133px">Condiciones TomatuCAR</p></h4></div>
      <br>
      <div class="recuadro">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, molestias?</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, molestias?</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, molestias?</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, molestias?</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, molestias?</p>
      </div> 

      <div id="subComunidad"><h4 id="sub_opciones" class="text-left"><p style="padding-top:10px">Condiciones personales</p></h4></div>
      <br>
      <form id="opcionesform" name="opcionesform" method="post" action="<?php echo base_url(); ?>automodificaropciones/subirInformacion">
      <input name="cocheid" id="cocheid" type="text" value="<?php echo $item['IdCoche'];?>" hidden/>
      <div id="texto_personal_op">
        <textarea name="condicionpersonal" id="condicionpersonal" form="opcionesform"><?php echo $item['CondicionPersonal'];?></textarea>
      </div>  

       <div id="subComunidad"><h4 id="sub_opciones" class="text-left"><p style="padding-top:10px">Opciones y accesorios</p></h4></div>
      		<div class="row">
				<div id="bradios2" class="col-md-3" style="width: 25%">
					<input type="checkbox" value="1" name="clima" id="Rclima" class="css-checkbox" <?php echo $item['AireAcondicionado']==1?'Checked':''; ?>/><label for="Rclima" class="css-label radGroup2">Aire acondicionado</label>
					<input type="checkbox" value="1" name="direccionasistida" id="Rdireccion" class="css-checkbox" <?php echo $item['DireccionAsistida']==1?'Checked':''; ?>/><label for="Rdireccion" class="css-label radGroup2">Direccion asistida</label>
					<input type="checkbox" value="1" name="velocidad" id="Rvelocidad" class="css-checkbox" <?php echo $item['ReguladorVelocidad']==1?'Checked':''; ?>/><label for="Rvelocidad" class="css-label radGroup2">Regulador de velocidad</label>
					<input type="checkbox" value="1" name="gps" id="Rgps" class="css-checkbox" <?php echo $item['GPS']==1?'Checked':''; ?>/><label for="Rgps" class="css-label radGroup2">GPS</label>
					<input type="checkbox" value="1" name="silla" id="sbb" class="css-checkbox" <?php echo $item['SillaBebe']==1?'Checked':''; ?>/><label for="sbb" class="css-label radGroup2">Sillitas niño</label>
					<input type="checkbox" value="1" name="cdmp3" id="lcd" class="css-checkbox" <?php echo $item['LectorCdMp3']==1?'Checked':''; ?>/><label for="lcd" class="css-label radGroup2">Lector de CD/MP3</label>
				</div>
				<div id="bradios2" class="col-md-3" style="width: 25%">
					<input type="checkbox" value="1" name="auxiliar" id="audioaux" class="css-checkbox" <?php echo $item['EntradaAuxiliar']==1?'Checked':''; ?>/><label for="audioaux" class="css-label radGroup2">Entrada de audio(aux)</label>
					<input type="checkbox" value="1" name="usb" id="usb" class="css-checkbox" <?php echo $item['USB']==1?'Checked':''; ?>/><label for="usb" class="css-label radGroup2">USB</label>
					<input type="checkbox" value="1" name="bluetooth" id="bluetooth" class="css-checkbox" <?php echo $item['Bluetooth']==1?'Checked':''; ?>/><label for="bluetooth" class="css-label radGroup2">Bluetooth</label>
					<input type="checkbox" value="1" name="alarma" id="alarma" class="css-checkbox" <?php echo $item['Alarma']==1?'Checked':''; ?>/><label for="alarma" class="css-label radGroup2">Alarma</label>
					<input type="checkbox" value="1" name="remolque" id="remol" class="css-checkbox" <?php echo $item['EngancheRemolque']==1?'Checked':''; ?>/><label for="remol" class="css-label radGroup2">Enganche remolque</label>
					<input type="checkbox" value="1" name="bolsas" id="bolsas" class="css-checkbox" <?php echo $item['BolsaAire']==1?'Checked':''; ?>/><label for="bolsas" class="css-label radGroup2">Bolsas de Aire</label>
				</div>

				<div id="bradios3" class="col-md-3" style="width: 25%">

					<input type="checkbox" value="1" name="fumar" id="fumar" class="css-checkbox" <?php echo $item['Fumar']==1?'Checked':''; ?>/><label for="fumar" class="css-label radGroup2">Permite Fumar</label>
					<input type="checkbox" value="1" name="mascota" id="mascota" class="css-checkbox" <?php echo $item['Mascota']==1?'Checked':''; ?>/><label for="mascota" class="css-label radGroup2">Permite Mascota</label>
					<input type="checkbox" value="1" name="ingles" id="ingles" class="css-checkbox" <?php echo $item['idiomaIngles']==1?'Checked':''; ?>/><label for="ingles" class="css-label radGroup2">Hablo Inglés</label>
					<input type="checkbox" value="1" name="espanol" id="esp" class="css-checkbox" <?php echo $item['idiomaEspaniol']==1?'Checked':''; ?>/><label for="esp" class="css-label radGroup2">Hablo Español</label>
					<input type="checkbox" value="1" name="aleman" id="aleman" class="css-checkbox" <?php echo $item['idiomaAleman']==1?'Checked':''; ?>/><label for="aleman" class="css-label radGroup2">Hablo Alemán</label>
					<input type="checkbox" value="1" name="frances" id="frances" class="css-checkbox" <?php echo $item['idiomaFrances']==1?'Checked':''; ?>/><label for="frances" class="css-label radGroup2">Hablo Frances</label>
				</div>
			</div>
      <div id="subComunidad"><h4 id="sub_opciones" class="text-left"><p style="padding-top:0px">Descripcion personal del coche</p></h4></div>
      <br>
      <div id="descripcion_personal">
        <textarea name="descripcioncoche" id="dcoche" class="form-control"  form="opcionesform"><?php echo $item['DescripcionPersonal'];?></textarea>
      </div> 
      		<div class="form-group">
		  		<button type="submit" class="btn btn-primary btn-lg" name="botonagregar" id="botonagregar" style="margin-left: 350px; margin-top: 10px">Salvar</button>
			</div>  
      </form> 
<?php endforeach; ?> 
      </div><!--termina contenido opciones-->
</div><!--termina contenido cuenta-->
</div><!--termina container-->