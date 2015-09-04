<style>

.img-rounded2
{
	border: 5px solid #00d2ff;
}

</style>
<!--comienza el contenido-->
<div class="container">
	<div id="linknuevo"><a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>auto"><strong>+ </strong>Agregar un nuevo vehiculo</a></div>
<div id="contenidocuentafoto" class="panel panel-default">
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
				    <li class="active nav_item"><a class="nav_item_link" href="<?php echo current_url(); ?>">Modificar foto</a></li>
<li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autocalendario/<?php echo $item['IdCoche'];?>">Calendario</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificaropciones/<?php echo $item['IdCoche'];?>">Opciones</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificarprecio/<?php echo $item['IdCoche'];?>">Precio</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autopromocionar/<?php echo $item['IdCoche'];?>">Promocionar</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autoborrar/<?php echo $item['IdCoche'];?>">Borrar / desactivar</a></li>
				</ul>
			</div>
			
			<!--termina menu vertical-->
			
      <div id="galeriaFotos">
      <div id="subComunidad"><h4 class="text-center"><p style="padding-top:122px">Agrega o modifica las fotos de tu auto</p></h4></div>

 <form enctype="multipart/form-data" role="form" class="login" id='fotosform' method="post">
 	
<input name="cocheid" id="cocheid" type="text" value="<?php echo $item['IdCoche'];?>" hidden/>
       <div class="example__left4" style="padding-top:100px">
       		<?php if($item['Foto1'] > ""):?>
       			<img class="img-rounded2" id="uploadPreview4" src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto1']; ?>" style="width: 250px; height: 200px;">
       		<?php else: ?>
       			<img class="img-rounded2" id="uploadPreview4" src="<?php echo base_url(); ?>img/<?php echo $item['TipoAuto']; ?>1.png" style="width: 250px; height: 200px;">
       		<?php endif; ?>	
            <div class="js-preview userpic__preview4"></div>
            <div class="btn4 btn-success4 js-fileapi-wrapper">
              <div class="js-browse">
                <span class="btn-txt2"><strong>+</strong>&nbsp;Elegir</span>
                <input id="bcarga4" name="bcarga4" type="file"  />
              </div>
              <div class="js-upload" style="display: none;">
                <div class="progress4 progress-success"><div class="js-progress bar4"></div></div>
                <span class="btn-txt">Subiendo</span>
              </div>
            </div>
          </img>
        </div>
         <div class="example__left5" style="padding-top:100px">
       		<?php if($item['Foto2'] > ""):?>
       			<img class="img-rounded2" id="uploadPreview5" src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto2']; ?>" style="width: 250px; height: 200px;">
       		<?php else: ?>
       			<img class="img-rounded2" id="uploadPreview5" src="<?php echo base_url(); ?>img/<?php echo $item['TipoAuto']; ?>1.png" style="width: 250px; height: 200px;">
       		<?php endif; ?>
            <div class="js-preview userpic__preview5"></div>
            <div class="btn4 btn-success5 js-fileapi-wrapper">
              <div class="js-browse">
                <span class="btn-txt2"><strong>+</strong>&nbsp;Elegir</span>
                <input id="bcarga5"  name="bcarga5" type="file" />
              </div>
              <div class="js-upload" style="display: none;">
                <div class="progress5 progress-success"><div class="js-progress bar5"></div></div>
                <span class="btn-txt">Subiendo</span>
              </div>
            </div>
          </img>
        </div>

         <div class="example__left6" style="padding-top:100px">
       		<?php if($item['Foto3'] > ""):?>
       			<img class="img-rounded2" id="uploadPreview6" src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto3']; ?>" style="width: 250px; height: 200px;">
       		<?php else: ?>
       			<img class="img-rounded2" id="uploadPreview6" src="<?php echo base_url(); ?>img/<?php echo $item['TipoAuto']; ?>1.png" style="width: 250px; height: 200px;">
       		<?php endif; ?>
            <div class="js-preview userpic__preview6"></div>
            <div class="btn6 btn-success6 js-fileapi-wrapper">
              <div class="js-browse">
                <span class="btn-txt2"><strong>+</strong>&nbsp;Elegir</span>
                <input id="bcarga6"  name="bcarga6" type="file"/>
              </div>
              <div class="js-upload" style="display: none;">
                <div class="progress6 progress-success"><div class="js-progress bar6"></div></div>
                <span class="btn-txt">Subiendo</span>
              </div>
            </img>
          </div>
        </div>
      </div><!--termina galeria para agregar al imagenes de auto-->
      <br>
      		
			
<?php endforeach; ?>
 </form>  
     

</div><!--termina contenido cuenta-->
</div><!--termina container-->

<script type="text/javascript"> 
 //Para Foto 4	
 $(document).ready(function(){
 $('#bcarga4').on('change',function(){

					         $.ajax({
			                data: new FormData($('#fotosform')[0]),
			                processData: false,
			    			contentType: false,
			                url:   '<?php echo base_url(); ?>automodificarfoto/subirfotos',
			                type:  'post',
			                success:  function (response) 
			                {
			                	if(response)
			                	{
			                		alert("Foto Actualizada correctamente!");
			                		//alert(response);
			                		$("#bcarga4").val('');
			                		location.reload();
			                	}
			                }
			     		   });
		        
			    });
			}); 
			 //Para Foto 5	
 $(document).ready(function(){
 $('#bcarga5').on('change',function(){

					         $.ajax({
			                data: new FormData($('#fotosform')[0]),
			                processData: false,
			    			contentType: false,
			                url:   '<?php echo base_url(); ?>automodificarfoto/subirfotos',
			                type:  'post',
			                success:  function (response) 
			                {
			                	if(response)
			                	{
			                		alert("Foto Actualizada correctamente!");
			                		//alert(response);
			                		$("#bcarga5").val('');
			                		location.reload();
			                	}
			                }
			     		   });
		        
			    });
			}); 
			 //Para Foto 6
 $(document).ready(function(){
 $('#bcarga6').on('change',function(){

					         $.ajax({
			                data: new FormData($('#fotosform')[0]),
			                processData: false,
			    			contentType: false,
			                url:   '<?php echo base_url(); ?>automodificarfoto/subirfotos',
			                type:  'post',
			                success:  function (response) 
			                {
			                	if(response)
			                	{
			                		alert("Foto Actualizada correctamente!");
			                		//alert(response);
			                		$("#bcarga6").val('');
			                		location.reload();
			                	}
			                }
			     		   });
		        
			    });
			}); 
			
</script>