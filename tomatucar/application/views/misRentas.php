<!--aqui termina el header de la pagina-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<!--Scripts if any-->
	<!--scripts para date-->
	    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
		<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
		<script>
		  webshims.setOptions('waitReady', false);
		  webshims.setOptions('forms-ext', {types: 'date'});
		  webshims.polyfill('forms forms-ext');
		</script>
		<script type="text/javascript">
  
      function Actualizarbusqueda()
      {
      	var radio=document.getElementById('TipoRenta').value;
      	if(radio==1){document.getElementById('Coche').disabled = false;}
      	if(radio==3){document.getElementById('Coche').disabled = false;}
      	if(radio==2){document.getElementById('Coche').disabled = true;}
      	
		 $.ajax({
                data: new FormData($('#FormRenta')[0]),
                processData: false,
    			contentType: false,
                url:   '<?php echo base_url(); ?>actualizarRenta',
                type:  'post',
                success:  function (response) 
                {
                	var container = $('#container');
                	if(response)
                	{
                		//alert(response);
                		container.html(response);
                	}
                }
        });
        
		//alert("Im Done");
      }
  </script>
	<!--Fin del codigo para date-->
	
 <script type="text/javascript">     
          
 </script>    
 
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
						<li >
							<a href="<?php echo base_url(); ?>perfil">
								<span class="icon"> 
									<i aria-hidden="true" class="glyphicon glyphicon-user"></i>
								</span>
								<span>Mi perfil</span>
							</a>
						</li>
						<li class="subActivo">
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
				</div>
				</div>
	<!--Fin de menu-->
	<!--Comienza el contenido principal-->
	<div class="row"  style="padding-top: 20px;" >
		<div class="col-md-1" style="padding-left: 130px;">	</div>
		<!--FORM-->	<form id="FormRenta">
		<div class="col-md-2" >		
			<Select id="Coche" name="Coche" class="form-control" placeholder="Buscar por auto" onChange="Actualizarbusqueda();">
			<option value="0">Todos los autos </option>
			<?php foreach ($coches as $item): ?>	
			<option value="<?php echo $item['IdCoche'];?>"><?php echo $item['Marca']." ".$item['Modelo'];?></option>
			<?php endforeach; ?>
			</select>
		</div>
		<div class="col-md-2">
			<input type="date" id="FechaBusqueda" class="form-control" maxlength="20" size="18" name="FechaBusqueda" placeholder="Fecha" onChange="Actualizarbusqueda();">
		</div>
		<div class="col-md-2">
			<Select id="Status" name="Status" class="form-control" placeholder="Buscar por Status" onChange="Actualizarbusqueda();">
				<option value="0">Todos los Status </option>
			<option value="1">En Progreso</option>
			<option value="2">Cancelado</option>
			<option value="3">Confirmado</option>
			</select>
		</div>
		<div class="col-md-2">
			<Select id="TipoRenta" name="TipoRenta" class="form-control" onChange="Actualizarbusqueda();">
			<option value="3" selected>Todos</option>
			<option value="1">Dueño</option>
			<option value="2">Usuario</option>
			</select>
		</div>
		<div class="col-md-3">	</div>
	</div>
	
	
<!--Ventana de busqueda-->
	<div class="row" style="padding-top: 20px; padding-bottom:0px;">
		<div class="col-md-1" style="padding-left: 130px;">	</div>
		<div class="col-md-10">
			<div style="overflow: auto; width: 1080px; height: 300px">
			<div id="container"><!--Este div se utiliza para actualizar la busqueda-->
			   <?php 
			   if($rentas){
			   	foreach ($rentas as $item): 
			   	?>	
			   	<a href="<?php echo base_url(); ?>autodetallerenta/<?php echo $item['idRenta'];?>">
			   <div class="panel panel-default" style="margin-bottom: 0px;">
			   <div class="panel-body">
				<!--Contenido de renta--> 	

				<!--David Vara 05/07/2015 : Añadir Marca y modelo--> 
				<div class="col-md-12">
					<h4> <?php 
					if($item['usuarioD']==$id){echo $item['NombreU'];} else {echo $item['Marca']." ".$item['Modelo'];}?> </h4>
				</div>

				<div class="col-md-2">
				<?php if($item['usuarioD']==$id){?>
					  <?php if($item['FotoA'] > ""):?>	
			      		<img  src="<?php echo base_url(); ?>uploads/<?php echo $item['FotoA'];?>" alt="..." class="img-thumbnail" width="100px" height="100px" style="max-height: 100px; max-width: 100px; min-height: 100px; min-width: 100px">
			    	<?php else: ?><!--ASK IF WE HAVE DEFAULT PROFILE PIC-->
			    		<img  src="<?php echo base_url(); ?>img/userpic.gif" alt="..." class="img-thumbnail" width="100px" height="100px" style="max-height: 100px; max-width: 100px; min-height: 100px; min-width: 100px">
			     	 <?php endif; ?>
				<?php }else{ ?>	
					
			      <?php if($item['FotoU'] > ""):?>	
			      		<img  src="<?php echo base_url(); ?>uploads/<?php echo $item['FotoU'];?>" alt="..." class="img-thumbnail" width="100px" height="100px" style="max-height: 100px; max-width: 100px; min-height: 100px; min-width: 100px">
			      <?php else: ?>
			    		<img  src="<?php echo base_url(); ?>img/userpic.gif" alt="..." class="img-thumbnail" width="100px" height="100px" style="max-height: 100px; max-width: 100px; min-height: 100px; min-width: 100px">
			      <?php endif; ?>
			    <?php } ?>		
			    </div>
			    <div class="col-md-1">
			     <h5> <?php echo $item['NombreU']." ".$item['ApellidoU'];?> </h5>
			    </div>
			    <div class="col-md-5" STYLE="padding-left: 40px; padding-top: 10px;">
			     <h6> Rentado: <?php echo $item['FechaI'];?> a <?php echo $item['FechaF'];?>  </h6>
			     </div>
			     <div class="col-md-2">
			     <h5> Precio: <?php echo $item['Precio'];?>/dia </h5>
			     </div>
			     <div class="col-md-2">
			      <?php if($item['IdStatus']==1){?><h5><font color="orange">En progreso</font></h5> <?php }?>
			      <?php if($item['IdStatus']==2){?><h5><font color="red">Cancelada</font></h5> <?php }?> 
			      <?php if($item['IdStatus']==3){?><h5><font color="green">Confirmada</font></h5> <?php }?>    
			      </div>
			   </div> 
			   </div>
			   </a>
				  <?php endforeach; }
                  else {echo "No tienes ninguna renta";} ?>
				  <!--Div de busqueda-->
			</div>
			</div>
		</div>
	</div>
	<div class="row" style="padding-bottom: 40px;">
	</div>
	</form>
	<!--Fin de Ventana de Busqueda-->
<!--Todo lo demas-->	
