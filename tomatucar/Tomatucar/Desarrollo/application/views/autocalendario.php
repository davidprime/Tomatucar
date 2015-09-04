<!--comienza el contenido-->
<link href="<?php echo base_url(); ?>css/jquery-ui-1.10.4.custom.css" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>css/jquery-ui-1.10.4.custom.min.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>js/jquery-ui-1.11.1.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-ui.multidatespicker.js"></script>
<!-- mdp demo code -->
		<script type="text/javascript">
		<!--			
			$(function() {
								
				// Run Demos
				$('.demo .code').each(function() {
					eval($(this).attr('title','NEW: edit this code and test it!').text());
					this.contentEditable = true;
				}).focus(function() {
					if(!$(this).next().hasClass('test'))
						$(this)
							.after('<button class="test">test</button>')
							.next('.test').click(function() {
								$(this).closest('.demo').find('.hasDatepicker').multiDatesPicker('destroy');
								eval($(this).prev().text());
								$(this).remove();
							});
				});
			});
		// -->
		</script>

<style>
/*.ui-datepicker .ui-datepicker-calendar .ui-state-highlight a {
  background: rgba(255,255,62,0.2);
  color: black;
}*/
.clasey a::before {
  width: 15px;
}
.clasex a{background: rgba(103,213,0,0.2); border: 1px solid #743620; font-weight: bold; color: black;}
.clasey a{background: rgba(0,255,0,0.5); border: 1px solid #743620;}
.clasez a{background: rgba(0,0,255,0.2); border: 1px solid #743620;}
.clasew a{background: rgba(0,0,0,0.2); border: 1px solid #743620;}
.default a{border: 1px solid #a9a089; background-color: rgba(103,213,0,0.2); font-weight: bold; color: black;}
</style>
<div class="container">
	<div id="linknuevo"><a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>auto"><strong>+ </strong>Agregar un nuevo vehiculo</a></div>
<div id="contenidocuenta" class="panel panel-default">
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
				    <li class="active nav_item"><a class="nav_item_link" href="<?php echo current_url(); ?>">Calendario</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificaropciones/<?php echo $item['IdCoche'];?>">Opciones</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificarprecio/<?php echo $item['IdCoche'];?>">Precio</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autopromocionar/<?php echo $item['IdCoche'];?>">Promocionar</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autoborrar/<?php echo $item['IdCoche'];?>">Borrar / desactivar</a></li>
				</ul>
			</div><!--termina menu vertical-->
			<div id="contenido_tus_autos">
				
						<li class="demo full-row">
							<div id="full-year" class="box"></div>
						<div class="code-box">

						<script type="text/javascript">
							
							$(document).ready(function(){
							    $('input').on('click', function()
							    {
							        	var apartamentos;
							        	if($('#NotDayAll').prop('checked'))
							        	{
							                apartamentos = '0';
							            }
							        	if($('#DayAll').prop('checked'))
							        	{
							                apartamentos = '1';
							            }
							            else if($('#DayPost').prop('checked'))
							            {
							                apartamentos = '2';	
							            }
							            else if($('#DayPre').prop('checked'))
							            {
							                apartamentos = '3';
							            }
							            console.log("apartados: "+apartamentos);
							    });
							});

							document.addEventListener("click", function()
							{
    							document.getElementById("demo").innerHTML = "Hello World!";
							});

						var today = new Date();
						var y = today.getFullYear();//var d = today.getDate(); 	//var m = today.getMonth();
						function fechasColores(fecha, idf)
						{
							this.fecha = fecha;
							this.idf = idf;
						}

						$('#full-year').multiDatesPicker({
							dateFormat: "dd/mm/yy",
							minDate:0,
							maxDate: new Date(y, 12 -1, 31),
							numberOfMonths: [2,3],
							defaultDate: today				
						});
						
						</script> 
						</div>
						<div style="margin-left:50px;">
						      <label style="margin-left:25px;" for="1">Antes de medio dia</label>
						      <input name="radio" type="radio" class="raido-btn" id="DayPre" value="3" />
						      <label style="margin-left:25px;" for="2">Despues de medio dia</label>
						      <input name="radio" type="radio" class="raido-btn" id="DayPost" value="2" />
						      <label style="margin-left:25px;" for="3">Disponible</label>
						      <input name="radio" type="radio" class="raido-btn" id="DayAll" value="1"/>
						      <label style="margin-left:25px;" for="4">No disponible</label>
						      <input name="radio" type="radio" class="raido-btn" id="NotDayAll" value="0" checked/>
						</div>
					</li>

				
			</div>
</div><!--termina contenido cuenta-->
</div><!--termina container-->
<?php endforeach; ?>
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