
<link href="<?php echo base_url(); ?>formvalidation/dist/css/formValidation.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>formvalidation/dist/js/formValidation.js"></script>	
<script src="<?php echo base_url(); ?>formvalidation/dist/js/framework/bootstrap.min.js"></script>



<script type="text/javascript">



//Enviar un nuevo mensaje
function EnviarMensaje()
{

	//verificar que haya un mensaje
	if($('#mensaje').val()>"")
	{

		//Mostrar barra de progreso e indicar que el mensaje se esta enviando, bloquear el boton para enviar
		$('#progressBarContainer').removeClass("hidden");
		$('#progressBar').addClass("active");

		var $btn = $('#enviarMensajeBtn').button('loading')


      	$.ajax({
      		data: new FormData($('#mensajeForm')[0]),
      		processData: false,
      		contentType: false,
      		url:   '<?php echo base_url(); ?>autodetallerenta/enviarMensaje',
      		type:  'post',
      		success:  function (response) 
      		{
      			var container = $('#messageContainer');
      			if(response)
      			{
                		container.html(response);

                		//Desactivar barra de progreso, limpiar textbox, etc
                		$('#progressBarContainer').addClass("hidden");
                		$('#progressBar').removeClass("active");
                		$btn.button('reset')
                		$('#mensaje').val("");
                	}
                }
            });

	}
	else
	{
	}
}

</script>


<style>


.whitetext
{
	color:#FFF;	
}	

.colortext
{
	color:#2272C0;
}


</style>






<!--comienza el contenido-->
<div class="container">
	

	<div style="height: auto;margin: 0px 23px 71px 39px;">

		<!--Menu de navegacion superior-->
		<nav id="menu" class="navsecundario">         
			<ul>
				<li >
					<a href="<?php echo base_url(); ?>filtroauto">
						<span class="icon">
							<i aria-hidden="true" class="glyphicon glyphicon-road"></i>
						</span>
						<span>Mis coches</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>perfil">
						<span class="icon"> 
							<i aria-hidden="true" class="glyphicon glyphicon-user"></i>
						</span>
						<span>Mi perfil</span>
					</a>
				</li>
				<li class="subActivo">
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


		<!--Fila suerior-->
		<div class="row" style="margin:0px;">


			<!--Columna izquierda, fechas y otros datos-->
			<div class="col-md-9" style="padding:0px;">
				

				<div class="panel panel-default" style="margin:15px;">
					<div class="panel-body">
						<div class="row" style="margin:0px;">

							<!--Imagen izquierda-->
							<div class="col-md-3" style="padding:15px;">
								<h1 class="text-center">
									<span class="glyphicon glyphicon-calendar " style="color:#AAA;"></span>
								</h1>
							</div>



							<div class="col-md-6" style="padding:0px;">

								<!--Fecha Inicio-->
								<div class="input-group">
									<span class="input-group-addon">Desde la fecha: <?php echo $detalleRenta->FechaInicio." ".($detalleRenta->FechaInicioAntesPm?"a.m.":"p.m.");?></span>
									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								</div>

								<!--Fecha fin-->
								<div class="input-group">
									<span class="input-group-addon">Hasta la fecha: <?php echo $detalleRenta->FechaFin." ".($detalleRenta->FechaFinAntesPm?"a.m.":"p.m.");?></span>
									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								</div>

								<br>

								<!--Kilometraje-->
								<div class="input-group">
									<span class="input-group-addon">Kilometraje estimado: <?php echo $detalleRenta->KilometrosUsuario;?></span>
									<span class="input-group-addon"><span class="glyphicon glyphicon-road"></span></span>
								</div>

							</div>


							<!--Imagen derecha-->
							<div class="col-md-3" style="padding:15px;">
								<h1 class="text-center">
									<span class="glyphicon glyphicon-road " style="color:#AAA;"></span>
								</h1>
							</div>

						</div>
					</div>
				</div>

				<!--Cuanto gana-->
				<div class="panel panel-default" style="margin:15px;">
					<div class="panel-body" style="">

						<div class="row text-center" style="margin:0px;" >
							

							<!--Cuanto gana el propietario-->
							<?php if($miTipo==1):?>	
							<h1 > <small>Tu ganas: </small><br>
								<span  class="colortext">$<?php echo $detalleRenta->TotalPagar?>!</span></h1>
							<?php endif; ?>	


							<!--Total a pagar-->
							<h3 ><small> Total a pagar: </small><span >$<?php echo $detalleRenta->TotalRenta?></span></h3>



							<div class="col-md-d-12" style="padding:15px;">
								<span class="text-muted">
								Precio indicativo que se recalcula al final de la renta con arreglo de los kilómetros
								</span>
							</div>
						</div>


					</div>


				</div>
			</div>


			<!--Columna derecha: imagen de perfil y otros datos-->
			<div class="col-md-3" style="padding:0px;">
				<div class="panel panel-default" style="margin:15px; padding: 0px;">
					<div class="panel-body text-center" style="margin:0px; padding: 0px;">

						<!--Si se es el propietario, ver informacion de quien desea rentar, de lo contrario ver informacion del propietario-->

						<div class="col-md-12">
							<!--Si no es el propietario el que ve-->
							<h4 class="text-center"><?php echo $miTipo==1?"Interesado":"<b>Propietario</b>";?></h4>
						</div>


						<!-- Imagen -->

						<?php if($miTipo==1):?>	

						<img src="<?php echo base_url().($usuario->FotoPerfil>''?'uploads/'.$usuario->FotoPerfil:'img/userpic.gif');?>"
						class="img-responsive center-block" onError="<?php echo base_url(); ?>img/userpic.gif"  style="max-width:200px;border-radius: 8px;">


						<?php else: ?>

						<img src="<?php echo base_url().($duenio->FotoPerfil>''?'uploads/'.$duenio->FotoPerfil:'img/userpic.gif');?>"
						class="img-responsive center-block" onError="<?php echo base_url(); ?>img/userpic.gif"  style="max-width:200px;border-radius: 8px;">

						<?php endif; ?>	




						<div class="col-md-12">
							<h3 class="colortext text-center"><?php echo $miTipo==1?($usuario->Nombre." ".$usuario->Apellido):
							($duenio->Nombre." ".$duenio->Apellido);?></h3>
						</div>

						<div class="col-md-12"><span class="colortext"><?php echo "0";?></span> Rentas</div>
						<div class="col-md-12"><span class="colortext"><?php echo "0";?></span> Valoraciones</div>

					</div>
				</div>
			</div>	


		</div>


		<!--Cuando la renta esta Confirmada-->

		<?php if($detalleRenta->idStatusRenta ==1):?>
		
		<div class="panel panel-default" style="margin:20px;">

			<div class="panel-body text-center" style="margin:0px;">			
				La renta esta confirmada. Puedes imprimir el contrato de renta y encontrar al propietario
			</div>			

		</div>

		<?php endif; ?>	


		<!--Confirmar o cancelar la renta-->
		<div class="panel panel-default" style="margin:20px;">

			<div class="panel-body text-center" style="margin:0px;">
				<input type="button" class="btn btn-success" value="Aceptar la Renta">
				<input type="button" class="btn btn-danger" value="Cancelar la Renta">
			</div>
		</div>







<!--PAnel de tabs-->
		<div class="panel panel-default" style="margin:20px;">

			<div class="panel-body" style="margin:0px;">


				<!--Control de tabs-->
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#sectionA">Contrato de Renta</a></li>
					<li><a data-toggle="tab" href="#sectionB">Check-List</a></li>
					<li><a data-toggle="tab" href="#sectionC">Mensajes</a></li>
					<li><a data-toggle="tab" href="#sectionD">Servicio al Cliente</a></li>
				</ul>



				<!--Contenido de tabs-->
				<div class="tab-content">
					<div id="sectionA" class="tab-pane fade in active">
						<h3 class="colortext">Contrato de Renta</h3>
						<p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
					</div>



					<div id="sectionB" class="tab-pane fade">
						<h3 class="colortext">Check-List</h3>
						<p>Antes de la renta</p>
							<ul>
							<li>&bull; Para rentar tu coche necesitas tener la revision tecnica y mantenimiento actualilzado del coche, nivel de aceite y se necesita checar los neumáticos.</li>
							<li>&bull; Hacer Una cita antes y al final de rentar.</li>
							<li>&bull; Imprimir el contrato de renta.</li>
							<li>&bull; Hacer una fotocopia de la carta del cocge y guardar el original</li>
							<li>&bull; Si es necesario, llenar de combustible (1/4 del tanque mínimo) y dar una limpieza rápida.</li>
							</ul>

							Inicio
							<ul>
							<li>&bull; Revisar la terjeta de crédito: El arrendador debe presentar su tarjeta. El nombre y número de la cuenta bancaria debe coincidir
								con lo que está escrito en el contrato. No deben aceptar una renta su no hay el nombre completo que esta escrito en la cuenta
								bancaria, incluso si los números coinciden</li>
							<li>&bull; Verificar que la licencia de manejo es la original (no una copia o una declaracíon de pérdida o de robo). Debe tener 21 años y
								al menos 2 años de experiencia como mínimo, el nombre y número idéntico al contrato. Toma una fotografía de la licencia si no
								está ya incluida en el sitio.</li>
							<li>&bull; No le debes de dar las llaves si no se cumplen con estas condiciones.</li>
							<li>&bull; No acepte un amigo para que vaya a recoger el coche en lugar de la persona que lo contactó en el sitio.</li>
							<li>&bull; Un cónyuge, padre o amigo ha pagado con su tarjeta de crédito en lugar de que el inquilino, incluso si está presente al comienzo del
								contrato de arrendamiento</li>
								<li>&bull; Tomen nota con el arendador sobre el estado de su vehículo, tomar tiempo para que o haya duda posible al final de la renta.</li>
								<li>&bull; Firmar el contrato de arrendamiento y entrega de las llaves, una copia de su registro y su certificado de seguro(tarjeta verde) del inquilino.</li>
							</ul>


						</div><!-- ------------------------------------------------------- - Fin de seccion B -->



						<div id="sectionC" class="tab-pane fade">
							<!-- Seccion de Mensajes -->
							<h3 class="colortext">Mensajes</h3>


							<div >

								<!-- Contenedor de mensajes-->

								<div id="messageContainer" style="max-height: 500px; overflow-y: visible; overflow-x: hidden;">

									<!-- No hay mensajes-->
									<?php if($mensajes==""):?>	

									<p class="text-muted">No hay ningun mensaje en esta conversación.<p>


									<?php else: ?>
									<!-- iterar en los mensajes-->
									<?php foreach ($mensajes as $item): ?>

									<div class="row message-row" style="padding:15px;height:180px;<?php echo $item['idRemitente']==$miId?'Background-color: #E7EFE4;':'';?>">
										<!-- Imagen y nombre-->
										<div class="col-md-2">
											<img src="<?php echo base_url();?>uploads/<?php echo $item['FotoPerfil'];?>"
											class="img-responsive center-block"  style="max-height:180px;border-radius: 8px;">
											<h4 class="colortext text-center"><?php echo $item['Nombre']." ".$item['Apellido'];?></h4>
										</div>
										<!-- Mensaje -->
										<div class="col-md-10">
											<div class="panel panel-default" style="margin:0px; height:130px">
												<div class="panel-body" style="">
													<?php echo $item['Mensaje'];?>
												</div>
											</div>
										</div>

									</div>

								<?php endforeach; ?>

							<?php endif; ?>	

						</div>

					</div>



					<br>


				<!-- Control para escribir un nuevo comentario-->
				

			<form id="mensajeForm">
				<div class="form-group">
					<a name="inputMensaje">
					<textarea class="form-control" id="mensaje" name="Mensaje" placeholder="Ingresa un comentario..." 
					cols="27" style="resize:none;" maxlength="500"></textarea>	
					</a> 
				</div>

				<div class="form-group">
					<button type="button" class="btn btn-default" id="enviarMensajeBtn" data-loading-text="Enviando mensaje..." onclick="EnviarMensaje()">Comentar</button>
				</div>




				<!-- indicador de progreso -->
					<div class="progress hidden" id="progressBarContainer" style="margin:0px;">
						<div class="progress-bar progress-bar-info progress-bar-striped"  id="progressBar" role="progressbar" 
						aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%; height:10px;">
						</div>
					</div>


				<span style="visibility: hidden">
					<input type="text" name="idUsuarioRecibe" value="<?php echo  $miTipo==1?($usuario->idusuarios):($duenio->idusuarios);?>">
					<input type="text" name="idUsuarioEnvia" value="<?php echo  $miTipo==2?($usuario->idusuarios):($duenio->idusuarios);?>">
					<input type="text" name="idCoche" value="<?php echo $detalleRenta->idCoche?>">
					<input type="text" name="idRenta" value="<?php echo $detalleRenta->idRenta?>">
					<input type="text" name="email" value="<?php echo  $miTipo==1?($usuario->Email):($duenio->Email);?>">
					<input type="text" name="remitente" value="<?php echo  $miTipo==2?($usuario->Nombre." ".$usuario->Apellido):($duenio->Nombre." ".$duenio->Apellido);?>">
				</span>

			</form>
				



			</div><!-- ------------------------------------------------------- - Fin de seccion C -->








			<div id="sectionD" class="tab-pane fade">
				<h3 class="colortext">Servicio al Cliente</h3>

				<br>
				<h3><small>Pedir un Pago de Km, de gazolina o de acuerdo amistoso</small></h3>
				<p>
					Para pedir un pago de los Km que no pago el usuario y la gasolina, mandar una archivo del contrato de renta, en las primeras 24
					horas después de la renta
				</p>
				<a href="#" class="btn btn-info pull-right" role="button" data-toggle="modal" data-target="#ModalPedirPago" >Pedir un Pago</a>


				<!-- MODAL par pedir pago -->		
				<div class="modal fade" id="ModalPedirPago" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title colortext">Pedir pago</h4>
							</div>

							<div class="modal-body">
								<!-- Formulario-->
								<form id="olvidarpassform" name="olvidarpassform" method="post" action="<?php echo base_url(); ?>reestablecerpass">
									<!--Archivo-->
									Contrato de renta<br>
									<button type="button" class="btn btn-default ">Buscar el archivo</button><br>
									<!--Comentario-->
									<h5>Comentario</h5>
									<textarea class="form-control" placeholder="Ingresa un comentario..." 
									cols="27" style="resize:none;" maxlength="250"></textarea>	<br>
									<!--Submit-->
									<input  type="submit" name="olvidarpass" id="olvidarpass" value="Enviar" class="btn btn-primary">
								</form>
							</div><!-- termina modal body-->

						</div>
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->



				<br>
				<h3><small>Declarar un siniestro</small></h3>
				<p>
					Declarar un accidente ocurrido durante la renta y mandar los documentos para que nos encarguemos del siniestro.
				</p>
				<a href="#" class="btn btn-info pull-right" role="button" data-toggle="modal" data-target="#ModalHacerDeclaracion" >Hacer una declaración</a>


				<!-- MODAL par pedir pago -->		
				<div class="modal fade" id="ModalHacerDeclaracion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title colortext">Hacer una declaración</h4>
							</div>

							<div class="modal-body">
								<!-- Formulario-->
								<form id="olvidarpassform" name="olvidarpassform" method="post" action="<?php echo base_url(); ?>reestablecerpass">
									<!--Archivos-->
									<div class="row message-row text-center" style="padding:15px;">
										<div class="col-md-4">
											Carta del coche
											<button type="button" class="btn btn-default ">Buscar el archivo</button><br>
										</div>
										<div class="col-md-4">
											Contrato de renta
											<button type="button" class="btn btn-default ">Buscar el archivo</button><br>
										</div>
										<div class="col-md-4">
											Acta del accidente
											<button type="button" class="btn btn-default ">Buscar el archivo</button><br>
										</div>
									</div>

									<!--Comentario-->
									<h5>Comentario</h5>
									<textarea class="form-control"  placeholder="Ingresa un comentario..." 
									cols="27" style="resize:none;" maxlength="250"></textarea>	<br>
									<!--Submit-->
									<input  type="submit" name="olvidarpass" id="olvidarpass" value="Enviar" class="btn btn-primary">
								</form>
							</div><!-- termina modal body-->

						</div>
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

			</div><!-- ------------------------------------------------------- - Fin de seccion D -->

		</div>
	</div>

		</div>


	</div>



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

<hr>
