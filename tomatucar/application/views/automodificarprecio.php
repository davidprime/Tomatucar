<script src="<?php echo base_url(); ?>js/bootstrap.touchspin.js"></script>

<link href="<?php echo base_url(); ?>formvalidation/dist/css/formValidation.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>formvalidation/dist/js/formValidation.js"></script>	
<script src="<?php echo base_url(); ?>formvalidation/dist/js/framework/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>js/preciovalidations.js"></script>
<style type="text/css">
.fv-form-bootstrap .fv-icon-no-label
{
	right: -25px;
}
</style>
<!--comienza el contenido-->
<div class="container">
	<div id="linknuevo"><a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>auto"><strong>+ </strong>Agregar un nuevo vehiculo</a></div>
<div id="contenidocuenta_preciocoche" class="panel panel-default">
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
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificaropciones/<?php echo $item['IdCoche'];?>">Opciones</a></li>
				    <li class="active nav_item"><a class="nav_item_link" href="<?php echo current_url(); ?>">Precio</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autopromocionar/<?php echo $item['IdCoche'];?>">Promocionar</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autoborrar/<?php echo $item['IdCoche'];?>">Borrar / desactivar</a></li>
				</ul>
			</div><!--termina menu vertical-->
<form id="precioform" name="precioform" method="post" action="<?php echo base_url(); ?>automodificarprecio/subirInformacion">
      <input name="cocheid" id="cocheid" type="text" value="<?php echo $item['IdCoche'];?>" hidden/>
      <div id="contenido_precio_coche">
      <div id="subComunidad"><h4 id="sub_precio_coche" class="text-center"><p style="padding-top:133px">Precio de renta del coche</p></h4></div>
        <hr>
        <div class="alert alert-info"> Todos los precios en tomatucar son libre. Puedes poner tu coche al precio que quieras</div>
      <div id="controles_precio_auto">
          <div  class="list-group">
        <h4 class="titulos" class="text-left"><p>Primer dia de renta: <span id="ex4CurrentSliderValLabel" ><span id="valrenta1" ><?php echo $item['CostoPrimerDiaRenta'];?></span>$ pesos</span> </p></h4>
        <div class="form-group">
        <div class="input-group">
        	<input name="renta1" id="renta1" type="text" value="<?php echo $item['CostoPrimerDiaRenta'];?>"readonly/> 
        </div>
        </div>
        <br>
        <div  class="list-group">
        <h4 class="titulos" class="text-left"><p>A partir del segundo dia de renta: <span id="ex5CurrentSliderValLabel"><span id="valrenta2" ><?php echo $item['CostoSegundoDiaRenta'];?></span>$ pesos</span> </p></h4>
        <div class="form-group">
        <div class="input-group">
        <input name="renta2" id="renta2" type="text" value="<?php echo $item['CostoSegundoDiaRenta'];?>" readonly/> 
        </div>
        </div>
        </div>        
        <h4 class="titulos" class="text-left"><p>Precio por Km: <span id="ex6CurrentSliderValLabel"><span id="valrentakm" ><?php echo $item['PrecioKilometro'];?></span>$ pesos</span></p></h4>
        <div class="form-group">
        <div class="input-group">
        <input name="rentakm" id="rentakm" type="text" value="<?php echo $item['PrecioKilometro'];?>" readonly/> 
        </div>
        </div>
        </div>  

        <div id="valor3">
        <h1><span id="ex3CurrentSliderValLabel" > <span class="text-primary" id="resulTotal"><?php echo $item['DiaPromedio'];?></span><span class="text-primary">$ pesos / Día </span><span class="verdeTitulo">(por 20km / Día)</span></h1>
        </div> 
        </div>
        <input name="totaldiaprom" id="totaldiaprom" type="text" hidden/>
         <div class="form-group">
		  		<button type="submit" class="btn btn-primary btn-lg" name="botonagregar" id="botonagregar" style="margin-left: 350px; margin-top: 10px">Salvar</button>
		</div> 
      </form>
<?php endforeach; ?> 
        <hr>


      </div>
</div><!--termina contenido cuenta-->
</div><!--termina container-->