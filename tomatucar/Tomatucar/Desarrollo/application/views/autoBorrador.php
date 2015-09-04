<!--radio button--> 
<link href="<?php echo base_url(); ?>css/botonesradio.css" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>css/radios.css" rel="stylesheet"/>
<!-- price slider -->
<script src="<?php echo base_url(); ?>js/bootstrap.touchspin.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDnPDroLgoimf7Y6gJ3JHYrRPD7NwTxBIM&sensor=false&amp;libraries=places"><script src="<?php echo base_url(); ?>js/jquery.geocomplete.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.geocomplete.js"></script>

<link href="<?php echo base_url(); ?>formvalidation/dist/css/formValidation.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>formvalidation/dist/js/formValidation.js"></script>	
<script src="<?php echo base_url(); ?>formvalidation/dist/js/framework/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>js/autovalidations.js"></script>
<script src="<?php echo base_url(); ?>js/map.js"></script>

<script>
 $(document).ready(function(){
var $jq = jQuery.noConflict();  

      	//marca script para traer todos los modelos de cada marca
	$jq("#marca").change(function(){                    
                    $jq.ajax({
                    	url:"<?php echo base_url(); ?>auto/creadDDModelo",    
                    	data: {marca: $jq(this).val()},
                    	type: "POST",
                    	success: function(data){     
                      		$jq("#modelo").html(data);
                    	}
                    });
                    
	});
	//termina script de marca
$jq('#salvarborrador').click(function(){
     /* when the submit button in the modal is clicked, submit the form */
    $jq("#autoform").attr("action", "<?php echo base_url(); ?>auto/subirborrador");
    $jq('#autoform').formValidation('enableFieldValidators', 'cartype', false);
    $jq('#autoform').formValidation('enableFieldValidators', 'direccion', false);
    $jq('#autoform').formValidation('enableFieldValidators', 'matricula', false);
    $jq('#autoform').formValidation('enableFieldValidators', 'renta1', false);
    $jq('#autoform').formValidation('enableFieldValidators', 'renta2', false);
    $jq('#autoform').formValidation('enableFieldValidators', 'rentakm', false);
    $jq('#autoform').submit();
});	
	
});

     
</script>
<script>
 function MarcaUpdate()
   {
   		var $jq = jQuery.noConflict();  
   	     $jq("#direccion").trigger("geocode");
   }
</script>

<body onload="MarcaUpdate()">
<!--comienza el contenido-->
<div class="container">
				<h2 class="text-center"><strong class="verdeTitulo">Registra tu auto es muy facil solo completa los pasos</strong></h2>
<div id="contenidoauto">
	<div class="panel-body">
				
				<p class="tituloscaja"><a href="#" id="mostrar">Paso 1. ¿Qué tipo de coche tienes? </a></p>
				<form id="autoform" name="autoform" method="post" action="<?php echo base_url(); ?>auto/subirinformacion">
				<div id="caja">
				<a href="#" class="close">[Reducir]</a>
				<br>
				
				<?php //echo form_open_multipart('auto/subirInformacion', 'id="autoform" name="autoform"');?>
				<?php foreach ($coches as $item): ?>	
					
				<div class="row">
					<div class="col-md-3">
					<h5 class="titulos" style="margin-left: 15px"><span>Marca y modelo:</span></h5 >
					</div>
					<div class="form-group col-md-3">
						<div class="input-group ">
							<?php echo form_dropdown('marca', $marcas,$item['Marca'],'class="form-control" id="marca" '); ?>
						</div>
					</div>
					<div class="form-group col-md-3">
						<div class="input-group">				
							<?php echo form_dropdown('modelo', $modelos,$item['Modelo'],'class="form-control" id="modelo" '); ?>
						</div>
					</div>	
				</div>							
				<hr class="hr2">
				<h4 class="titulos"><span >Tipo de coche:</span></h4>
				<div id="radios2">
				<div class="form-group">
				<!-- compacto CHECAR ESTE PHP PARA CHECKED-->
				<input type="radio" id="compacto" name="cartype" value="1" <?php if($item['Tipo']==1){echo' checked';}?> /><label for="compacto"><img src='<?php echo base_url(); ?>img/compacto1.png' /></label>	
				<!-- sedan--> 
				<input type="radio" id="sedan" name="cartype" value="2" /><label for="sedan"><img src='<?php echo base_url(); ?>img/sedan1.png'  /></label>	
				<!-- convertible-->
				<input type="radio" id="convertible" name="cartype" value="3" /><label for="convertible"><img src='<?php echo base_url(); ?>img/convertible1.png'  /></label>	
				<!-- familiar-->
				<input type="radio" id="familiar" name="cartype" value="4" /><label for="familiar"><img src='<?php echo base_url(); ?>img/familiar1.png'  /></label>	 
				<br>
				<br>
				<!-- pickup-->
				<input type="radio" id="pickup" name="cartype" value="5" /><label for="pickup"><img src='<?php echo base_url(); ?>img/pickup1.png'  /></label>	
				<!-- todoTerreno-->
				<input type="radio" id="todoterreno" name="cartype" value="6" /><label for="todoterreno"><img src='<?php echo base_url(); ?>img/todoterreno1.png' /></label>	
				<!-- minivan-->
				<input type="radio" id="minivan" name="cartype" value="7" /><label for="minivan"><img src='<?php echo base_url(); ?>img/minivan1.png'  /></label>	
				<!-- furgoneta-->
				<input type="radio" id="furgoneta" name="cartype" value="8" /><label for="furgoneta"><img src='<?php echo base_url(); ?>img/furgoneta1.png' /></label>	 

				<br>
				<br>
				<!-- clasico-->
				<input type="radio" id="clasico" name="cartype" value="9" /><label for="clasico"><img src='<?php echo base_url(); ?>img/clasico1.png' /></label>				
				<!-- deportivo-->
				<input type="radio" id="deportivo" name="cartype" value="10" /><label for="deportivo"><img src='<?php echo base_url(); ?>img/deportivo1.png' /></label>	 
				<!-- otro-->
				<input type="radio" id="otros" name="cartype" value="11" /><label for="otros"><img src='<?php echo base_url(); ?>img/otros1.png' /></label>	 
				</div>
				</div>
				</div>  <!-- Div de la primera caja 1 -->				

				<p class="tituloscaja"><a href="#" id="mostrar2">Paso 2. ¿Cúales son las caracteristicas de tu coche?</a></p>
				<div id="caja2">
				<a href="#" class="close">[Reducir]</a>
				<br>
				
				<div class="row"> 
					<div class="col-md-3">
						<h4 class="titulos"><span >Año de tu coche:</span></h4>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<div class="input-group ">				
								<?php echo form_dropdown('primerAnio', $annios,$item['Annio'],'class="form-control" id="primerAnio"'); ?>
							</div>
						</div>	
					</div>			
				</div>
				<div class="row">
					<div class="col-md-3"><h4 class="titulos"><span >Matricula de tu coche:</span></h4 ></div>
					<div class="col-md-3">
				         <div class="form-group">
								<div class="input-group">
									
								<input type="text" class="form-control" name="matricula" value="<?php echo $item['Matricula']; ?>">

								</div>
				         </div>	
			         </div>
			         <br>
		        </div>
				<hr class="hr2">

				<h4 class="titulos"><span >Caracteristicas generales:</span></h4>
				<div id="Cgenerales">
				<div class="form-group">
					<div class="input-group">	
						<?php echo form_dropdown('Nplazas', $plazas,$item['NumPlaza'],'class="form-control" id="Nplazas"'); ?>	
					</div>
				</div>
				<?php echo form_dropdown('energia', $combustibles,$item['Energia'],'class="form-control" id="energia"'); ?>
				
				<?php echo form_dropdown('km', $kilometros,$item['RangoKilometraje'],'class="form-control" id="km"'); ?>
				
				<?php echo form_dropdown('consumo', $consumos,0,'class="form-control" id="consumo"'); ?>

				</div>

				<div id="Cgenerales2">
					
				<?php echo form_dropdown('Npuertas', $puertas,$item['NumPuertas'],'class="form-control" id="Npuertas"'); ?>
				
				<?php echo form_dropdown('transimicion', $transmisiones,$item['Transmision'],'class="form-control" id="transimicion"'); ?>


				</div>
				</br>
				<hr class="hr2">

				<h4 class="titulos"><span >Caracteristicas especiales DF:</span></h4>
			
	

				<div id="df">
				<?php echo form_dropdown('tengomado', $engomados,0,'class="form-control" id="tengomado"'); ?>
				
				<?php echo form_dropdown('engomado', $colorengomados,$item['Color'],'class="form-control" id="engomado"'); ?>

				<?php echo form_dropdown('terminoplacas', $terminacionplacas,0,'class="form-control" id="terminoplacas"'); ?>
				
				</div>

				<hr class="hr2">
				<h4 class="titulos"><span >Opciones y accesorios:</span></h4>
				<div id="bradios">
					<input type="checkbox" value="1" name="clima" id="Rclima" class="css-checkbox" <?php if($item['AireAc']==1){echo'checked';}?> /><label for="Rclima" class="css-label radGroup2">Aire acondicionado</label>
					<input type="checkbox" value="1" name="direccionasistida" id="Rdireccion" class="css-checkbox" <?php if($item['DireccionA']==1){echo'checked';}?> /><label for="Rdireccion" class="css-label radGroup2">Direccion asistida</label>
					<input type="checkbox" value="1" name="velocidad" id="Rvelocidad" class="css-checkbox" <?php if($item['ReguladorV']==1){echo'checked';}?> /><label for="Rvelocidad" class="css-label radGroup2">Regulador de velocidad</label>
					<input type="checkbox" value="1" name="gps" id="Rgps" class="css-checkbox" <?php if($item['GPS']==1){echo'checked';}?> /><label for="Rgps" class="css-label radGroup2">GPS</label>
					<input type="checkbox" value="1" name="silla" id="sbb" class="css-checkbox" <?php if($item['SillaB']==1){echo'checked';}?> /><label for="sbb" class="css-label radGroup2">Sillitas niño</label>
					<input type="checkbox" value="1" name="cdmp3" id="lcd" class="css-checkbox" <?php if($item['LectorCD']==1){echo'checked';}?> /><label for="lcd" class="css-label radGroup2">Lector de CD/MP3</label>
				</div>
				<div id="bradios2">
					<input type="checkbox" value="1" name="auxiliar" id="audioaux" class="css-checkbox" <?php if($item['EntradaA']==1){echo'checked';}?> /><label for="audioaux" class="css-label radGroup2">Entrada de audio(aux)</label>
					<input type="checkbox" value="1" name="usb" id="usb" class="css-checkbox" <?php if($item['USB']==1){echo'checked';}?> /><label for="usb" class="css-label radGroup2">USB</label>
					<input type="checkbox" value="1" name="bluetooth" id="bluetooth" class="css-checkbox" <?php if($item['BlueT']==1){echo'checked';}?> /><label for="bluetooth" class="css-label radGroup2">Bluetooth</label>
					<input type="checkbox" value="1" name="alarma" id="alarma" class="css-checkbox" <?php if($item['Alarma']==1){echo'checked';}?> /><label for="alarma" class="css-label radGroup2">Alarma</label>
					<input type="checkbox" value="1" name="remolque" id="remol" class="css-checkbox" <?php if($item['EngancheR']==1){echo'checked';}?> /><label for="remol" class="css-label radGroup2">Enganche remolque</label>
					<input type="checkbox" value="1" name="bolsas" id="bolsas" class="css-checkbox" <?php if($item['BolsaA']==1){echo'checked';}?> /><label for="bolsas" class="css-label radGroup2">Bolsas de Aire</label>
				</div>

				<div id="bradios3">

					<input type="checkbox" value="1" name="fumar" id="fumar" class="css-checkbox" /><label for="fumar" class="css-label radGroup2">Permite Fumar</label>
					<input type="checkbox" value="1" name="mascota" id="mascota" class="css-checkbox"/><label for="mascota" class="css-label radGroup2">Permite Mascota</label>
					<input type="checkbox" value="1" name="ingles" id="ingles" class="css-checkbox" <?php if($item['Ingles']==1){echo'checked';}?> /><label for="ingles" class="css-label radGroup2">Hablo Inglés</label>
					<input type="checkbox" value="1" name="espanol" id="esp" class="css-checkbox" <?php if($item['Espaniol']==1){echo'checked';}?> /><label for="esp" class="css-label radGroup2">Hablo Español</label>
					<input type="checkbox" value="1" name="aleman" id="aleman" class="css-checkbox" <?php if($item['Aleman']==1){echo'checked';}?> /><label for="aleman" class="css-label radGroup2">Hablo Alemán</label>
					<input type="checkbox" value="1" name="frances" id="frances" class="css-checkbox" <?php if($item['Frances']==1){echo'checked';}?> /><label for="frances" class="css-label radGroup2">Hablo Frances</label>
				</div>		
				</br>
				</br>
				</br>
				</br>
				</br>
				<hr class="hr2">
				<h4 class="titulos"><span >Descripcion personal del coche:</span></h4>
				<br>	
				<textarea name="descripcioncoche" id="dcoche" class="form-control" rows="5" form="autoform"><?php echo $item['Descripcion']; ?></textarea>
				<br>
				<div class="alert alert-info"><strong>¡Bien hecho!</strong>  has completado el paso dos. </div>
				</div>
				<!-- termina div de la caja 2-->
            								
				<p class="tituloscaja"><a href="#" id="mostrar3">Paso 3. Arma tu renta</a></p>
				
				<div id="caja3">
				<a href="#" class="close">[Reducir]</a>
				<br>
				<div class="row">
					<div class="col-md-3">
						<h4 class="titulos"><span>Direccion de tu coche:</span></h4>
					</div>
					<p><?php echo $item['DireccionC']; ?>123</p>
					<div class="form-group col-md-4">
						<div class="input-group">
							
						<input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingresa la direccion de tu auto" value="<?php echo $item['DireccionC']; ?>">
						<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
						
						</div>
		            </div>	
			     </div>
				
			    <div class="section" id="detallesD"> 
			    <h3 id="direccionC" class="titulos"><span>Esta es tu direccion</span></h3>
			      <ul>
			        <li>Calle: <span id="route"></span></li>
			        <li>Numero: <span id="street_number"></span></li>
			        <li>Codigo postal: <span id="postal_code"></span></li>
			        <li>Locaidad: <span id="locality"></span></li>
			        <li>Pais: <span id="country"></span></li>
			        <li>Estado: <span id="administrative_area_level_1"></span></li>
			        <input name="lat" id="lat" type="text" value="<?php echo $item['Lat']; ?>" data-geo="lat" hidden>
			        <input name="lng" id="lng" type="text" value="<?php echo $item['Lng']; ?>" data-geo="lng" hidden>
			      	<input name="estadodireccion" id="estadodireccion" type="text" hidden>
			      </ul>
				</div>

			    <div class="map_canvas" id="map_canvas" style="width:539px; height:300px; "></div>
			    <br>

			    <hr class="hr2">
			    <h4 class="titulos"><span>Precio de renta del coche:</span></h4>
				<div id="controlradios">
					<h4 class="titulos" class="text-left"><p>Primer dia de renta: <span id="ex4CurrentSliderValLabel" ><span id="valrenta1" ></span>$ pesos</span> </p></h4>
					<div class="row">
						<div class="col-md-3">
							<input name="renta1" id="renta1" type="text" value="<?php echo $item['CostoPD']; ?>" readonly/> 
						</div>
					</div>
				<br>
				<h4 class="titulos" class="text-left"><p>Segundo dia de renta: <span id="ex5CurrentSliderValLabel"><span id="valrenta2" ></span>$ pesos</span> </p></h4>
					<div class="row">
						<div class="col-md-3">
							<input name="renta2" id="renta2" type="text" value="<?php echo $item['CostoSD']; ?>"  readonly/> 
						</div>
					</div>
				<div id="valor2">
				<h1><span id="ex2CurrentSliderValLabel" > <span class="text-primary" id="resulTotal"></span><span class="text-primary">$ pesos / Día </span><span class="verdeTitulo">(por 20km / Día).</span></h1>
				</div>				
				<h4 class="titulos" class="text-left"><p>Precio por Km: <span id="ex6CurrentSliderValLabel"><span id="valrentakm" >0</span>$ pesos</span></p></h4>
					<div class="row">
						<div class="col-md-3">
							<input name="rentakm" id="rentakm" type="text" value="<?php echo $item['PrecioK']; ?>" readonly/> 
						</div>
					</div>						
				</div>	
				<br>
				 <hr class="hr2">
				 <?php endforeach; ?>	

				</div><!-- termina div de la caja 3-->
				<div class="form-group">
		  			<button type="submit" class="btn btn-primary btn-lg pull-right" name="botonagregar" id="botonagregar" >Validar vehiculo y Guardar</button>
					<button type="button" name="borrador" id="borrador" class="btn btn-warning btn-lg" data-toggle="modal" data-target=".bs-example-modal-sm">Salvar en Borrador</button>
				</div>
			
			<input name="totaldiaprom" id="totaldiaprom" type="text" hidden/>

			</form>
				
<!-- Small modal -->		
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Salvar como borrador</h4>
      </div>
      <div class="modal-body">
        <p>¿Estas seguro que quieres salvar este auto como borrador?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" name="salvarborrador" id="salvarborrador" >Salvar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
			
			</div><!-- termina panel body-->
</div><!-- termina panel panel-default-->
</div><!--termina div de container-->
<br>
<br>	

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
