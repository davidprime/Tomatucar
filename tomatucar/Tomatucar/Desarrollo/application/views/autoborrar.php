<link href="<?php echo base_url(); ?>css/botonesradio.css" rel="stylesheet"> 

<!--comienza el contenido-->
<div class="container">
	<div id="linknuevo"><a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>auto"><strong>+ </strong>Agregar un nuevo vehiculo</a></div>
<div id="contenidocuenta_borrarAnuncio" class="panel panel-default">
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

<?php foreach ($detallecoche as $item): ?>
			<div class="menu_vertical">
				<ul class="nav_list">
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autoinfogeneral/<?php echo $item['IdCoche'];?>">Info general</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificarfoto/<?php echo $item['IdCoche'];?>">Modificar foto</a></li>
				    <li class=" nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autocalendario/<?php echo $item['IdCoche'];?>">Calendario</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificaropciones/<?php echo $item['IdCoche'];?>">Opciones</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificarprecio/<?php echo $item['IdCoche'];?>">Precio</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autopromocionar/<?php echo $item['IdCoche'];?>">Promocionar</a></li>
				    <li class="active nav_item"><a class="nav_item_link" href="<?php echo current_url(); ?>">Borrar / desactivar</a></li>
				</ul>
			</div><!--termina menu vertical-->



  <div id="contenido_borrar_anuncio">
    <div id="subComunidad"><h4 id="sub_borrar_anuncio" class="text-left"><p style="padding-top:133px">Activar/Desactivar anuncio</p></h4></div>
      <hr>
     
		<p>Esta opción permite desactivar tu anuncio del buscador, cuando estes dispuesto a poner en renta de nuevo tu coche, regresa aqui y vuelve a activarlo.</p>
    	<?php if($item['Activado'] == "1"):?>	
    		
    		<div id="desactivar_anuncio"><a href="#" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#confirmar-activar" data-accion="1" data-idcoche="<?php echo $item['IdCoche'];?>">Desactivar anuncio</a></div>
    	<?php else: ?>
    		
    		<div id="desactivar_anuncio"><a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#confirmar-activar" data-accion="0" data-idcoche="<?php echo $item['IdCoche'];?>">Activar anuncio</a></div>
    	<?php endif; ?>	
    	
       
        
       <div id="subComunidad"><h4 id="sub_borrar_anuncio" class="text-left"><p style="padding-top:33px">Borrar anuncio</p></h4></div> 
          <hr>
          <p>¿Por qué deseas eliminar tu anuncio?</p>

          <div id="bradios_porque_descativar">
	          <input type="radio"  name="razonbaja" value="0"/><label >¡He vendido mi coche!</label>
				<br>
	          <input type="radio"  name="razonbaja" value="1"/><label >¡Necesito mi coche!</label>
				<br>
	          <input type="radio"  name="razonbaja" value="2"/><label >¡No tengo suficiente presupuesto!</label>
				<br>
	          <input type="radio"  name="razonbaja" value="3"/><label >¡Tengo demasiado presupuesto!</label>
				<br>
	          <input type="radio"  name="razonbaja" value="4"/><label >¡No me convence el sitio!</label>
				<br>
	          <input type="radio"  name="razonbaja" value="5"/><label >¡Tengo otro anuncio por el mismo coche!</label>
	           	<br>
	          <input type="radio"  name="razonbaja" value="6"/><label >¡Por otras razones!</label>
         </div>
          <hr>
         <button type="button" name="borraranuncio" id="borraranuncio" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#confirmar-eliminar" data-idcoche="<?php echo $item['IdCoche'];?>"disabled>Borrar Anuncio</button>
<?php endforeach; ?>
  </div><!--termina contenido borrar_anuncio-->
</div><!--termina contenido cuenta-->
</div><!--termina container-->

<!-- Small modal -->		
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirmar-activar" name="confirmar-activar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p class="modal-mensaje"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-ok" name="confirmar" id="confirmar" >Confirmar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Small modal -->		
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirmar-eliminar" name="confirmar-activar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p class="modal-mensaje"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-ok" name="confirmareliminar" id="confirmareliminar" >Confirmar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
<script>
		$('#confirmar-eliminar').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var idcoche = button.data('idcoche') // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.modal-mensaje').text('¿Estas seguro que deseas eliminar este auto?')
		  modal.find('.modal-title').text('Eliminar Auto')
		  $('#confirmareliminar').click(function() {
				var razon = $('input[name="razonbaja"]:checked').val();
			    			$.ajax({
			    				data: {idcoche: idcoche, razon: razon},
			                	url:   '<?php echo base_url(); ?>autoborrar/eliminar',
			                	type:  'POST',
			                	success:  function (data) 
			                	{
			                		if(data == '1')
			                		{
										window.location.replace("<?php echo base_url(); ?>filtroauto");
			                		}
			                		else
			                		{
			                			alert('ocurrió un error intentando desactivar el auto');
			                		}
			                	},
								error: function(xhr, status, error) {
									alert(xhr.responseText);
								}
			     		   });
					});				
			});
		
		$('#confirmar-activar').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var idcoche = button.data('idcoche') // Extract info from data-* attributes
		  var accion = button.data('accion') // Extract info from data-* attributes
		  var mensaje = "";
		  if(accion == "0")
		  {
		  	mensaje = "activar";
		  }
		  else
		  {
		  	mensaje = "desactivar";
		  }
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.modal-mensaje').text('¿Estas seguro que deseas '+mensaje+' este auto?')
		  mensaje = mensaje.toLowerCase().replace(/\b[a-z]/g, function(letter) {
    		return letter.toUpperCase();
		 });
		  modal.find('.modal-title').text(mensaje+' auto')
		  $('#confirmar').click(function() {
			    			$.ajax({
			    				data: {idcoche: idcoche, activado: accion},
			                	url:   '<?php echo base_url(); ?>autoborrar/activarDesactivar',
			                	type:  'POST',
			                	success:  function (data) 
			                	{
			                		if(data == '1')
			                		{
			                			$('#confirmar-activar').modal('hide');
			                			location.reload();
			                		}
			                		else
			                		{
			                			alert('ocurrió un error intentando desactivar el auto');
			                		}
			                	},
								error: function(xhr, status, error) {
									alert(xhr.responseText);
								}
			     		   });
					});
		})
	$('input[name=razonbaja]').click(function(){
			$('#borraranuncio').removeAttr('disabled');
		});	
</script>