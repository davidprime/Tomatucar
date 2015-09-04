  <!-- Star Rating -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="<?php echo base_url(); ?>js/star-rating.js" type="text/javascript"></script>

<style>
  .carousel-inner .item img{
    height: 240px;
    width: 350px;

  }
</style>

<script> 
	   // var coders = $.parseJSON(<?php //print json_encode(json_encode($coches)); ?>); 
	    //alert(coders.toSource());
	   // for (var i = 0; i < coders.length; i++) { 
    	//	alert(coders[i].Marca +" " +coders[i].Modelo+" " +coders[i].Lat+" " +coders[i].Lng);
	//	}
</script>
    <script src="<?php echo base_url(); ?>js/script.js"></script>
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
<!--comienza el contenido-->
<div class="container">
	<?php echo $mensaje;?>
<div id="linknuevo"><a class="btn btn-default btn-lg" href="<?php echo base_url(); ?>auto"><strong>+ </strong>Agregar un nuevo vehiculo</a></div>
<!-- Override a la altura del objeto, ya que tenia un valor fijo y los elementos dentro no cabian haciendo que el footer se encimara-->
<div id="contenidocuenta" class="panel panel-default" style="height: auto">
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
            <li>
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

   <div id="contenido_tus_autos">
<?php if($coches !=""): ?>
   <?php foreach ($coches as $item): ?>	
   <div id="cuadro_borde" >
   	
   	 <!--David Vara 29/04-->
   	<!--Carousel   Se define un id unico para cada carousel segun los ids de los coches-->
   	<div id="carCarousel_<?php echo $item['IdCoche'];?>" class="carousel slide" data-interval="false" style="width:350px">
  
  <!-- "Bolitas blancas" -->
  <ol class="carousel-indicators">
              <?php if($item['Foto1'] > ""):?>  
              <li data-target="#carCarousel_<?php echo $item['IdCoche'];?>" data-slide-to="0" class="active"></li>
              <?php endif; ?> 
              <?php if($item['Foto2'] > ""):?>  
              <li data-target="#carCarousel_<?php echo $item['IdCoche'];?>" data-slide-to="1"></li>
              <?php endif; ?> 
              <?php if($item['Foto3'] > ""):?>  
              <li data-target="#carCarousel_<?php echo $item['IdCoche'];?>" data-slide-to="2"></li>
              <?php endif; ?> 
            </ol>
            
            <!-- Items del carousel-->
            <div class="carousel-inner" role="listbox" onclick="location.href='<?php echo base_url(); ?>autoanuncio/<?php echo $item['IdCoche'];?>';">
              <div class="item active">
                <?php if($item['Foto1'] > ""):?>  
                  <img  src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto1'];?>" class="img-responsive" >
                <?php else: ?>
                  <img  src="<?php echo base_url(); ?>img/ford.jpg"  class="img-responsive" >
                <?php endif; ?>   
              </div>

              <?php if($item['Foto2'] > ""):?>  
                <div class="item">                
                  <img  src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto2'];?>" class="img-responsive" >
                </div>
              <?php endif; ?>   


              <?php if($item['Foto3'] > ""):?>  
                <div class="item">                
                  <img  src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto3'];?>" class="img-responsive" >
                </div>
              <?php endif; ?>   

            </div>
            
            <!-- Controles de izquierda y derecha, solo han de mostrarse si hay mas de una imagen disponible-->
            <?php if($item['Foto2'] > ""|| $item['Foto3']>""):?>
            <a class="left carousel-control" href="#carCarousel_<?php echo $item['IdCoche'];?>" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="right carousel-control" href="#carCarousel_<?php echo $item['IdCoche'];?>" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Siguiente</span>
            </a>
            <?php endif; ?>

</div>
   	
   	
   	
     
      <!--David Vara 29/04-->
      <!--Ajustar tamaño y posicion del postlabel que indica el precio de renta-->
      <span class='post-labels' style="margin-left:200px; margin-top:-225px;">
      	<p style="width:130px;"><?=$item['Precio']?> / dia</p></span>
      <div class="titulo_auto">
        <h4 id="" class="text-left"><p style="padding-top:133px"><?=$item['Marca']?> <?=$item['Modelo']?> <?=$item['Annio']?>
        <!--David Vara 29/04-->
      	<!--Añadir etiqueta que diga si se encuentra el auto como borrador-->
      	<!--Cmabié el status del coche, en lugar de 0 a 1 para indicar que es borrador-->
        <span style="color: #F00;">&nbsp<?php echo $item['Status']==1?'Borrador':''; ?>  </span>
        <span style="color: #F00;">&nbsp<?php echo $item['Activado']==1?'':'Desactivado'; ?>  </span>
        <!--fin de cambios-->
        </p></h4>

              <p style="overflow:hidden; text-overflow:ellipsis; white-space: nowrap;"
              title="<?=$item['Direccion']?>">
                <span class="glyphicon glyphicon-map-marker"> </span>
                <?=$item['Direccion']?>
              </p>


          <b style="color: #1594FF;"><?php echo $item['Evaluaciones']?></b> Valoraciones      
       
            <input id="ratingd" value="<?php echo ($item['Evaluacion']>"" ? $item['Evaluacion'] :"5")?>" class="rating rating-loading" min="0" max="5" step="0.1" data-size="xs"
                     data-show-clear="false" data-show-caption="false" disabled>

      
        <!--David Vara 03/06/2015, Despliegue de contactos, consultas y rentas hechas -->
          <div id="otros_datos">
            <p><span><?php echo $item['Contactos']?></span> Contactos</p> 
            <p><span><?php echo $item['Consultas']?></span> Consultas</p> 
            <p><span><?php echo $item['RentasHechas']?></span> Rentas</p> 
          </div>


           <?php 
           if($item['Status']!=1) 
		   {
           ?>
           		<div id="gestionar_auto"><a href="<?php echo base_url(); ?>autoinfogeneral/<?php echo $item['IdCoche'];?> " class="btn btn-primary btn-lg">Gestionar auto</a></div>
           		<div id="calendario"><a href="<?php echo base_url(); ?>autocalendario/<?php echo $item['IdCoche'];?>" class="btn btn-success btn-lg">Calendario</a></div>
           		<div id="ver_anuncio"><a href="<?php echo base_url(); ?>autoanuncio/<?php echo $item['IdCoche'];?>" class="btn btn-info btn-lg">Ver anuncio</a></div>
      		<?php } else{ ?>
      			<div id="gestionar_auto"><a href="<?php echo base_url(); ?>autoBorrador/<?php echo $item['IdCoche'];?>" class="btn btn-primary btn-lg">Seguir Editando</a></div>
      			<div id="eliminarcoche" data-idcoche="<?php echo $item['IdCoche'];?>" data-marca="<?php echo $item['Marca'];?>" data-modelo="<?php echo $item['Modelo'];?>" data-annio="<?php echo $item['Annio'];?>" data-toggle="modal" data-target="#confirmar-eliminar"><a href="#" class="btn btn-danger  btn-lg">Eliminar</a></div>
      		<?php }?>
         </div>
      </div>
	  <?php endforeach; ?>
	  <?php else: ?>
	  	<br>
	  	<h3 class="text-muted">No tienes autos todavia.</h3>
	  	<br>
	  <?php endif ?> 
   </div>
 
   </div>


</div><!--termina contenido cuenta-->
</div><!--termina container-->
<!-- Small modal -->		
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirmar-eliminar" name="confirmar-eliminar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Eliminar Auto</h4>
      </div>
      <div class="modal-body">
        <p class="modal-mensaje"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-ok" name="salvarborrador" id="salvarborrador" >Eliminar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
		$('#confirmar-eliminar').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var idcoche = button.data('idcoche') // Extract info from data-* attributes
		  var marca = button.data('marca') // Extract info from data-* attributes
		  var modelo = button.data('modelo') // Extract info from data-* attributes
		  var annio = button.data('annio') // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.modal-mensaje').text('¿Estas seguro que deseas eliminar el auto marca: ' + marca + ' modelo: '+modelo+' año:' + annio+' que tienes en borrador?')
		  $('#salvarborrador').click(function() {
			    			$.ajax({
			                processData: false,
			    			contentType: false,
			                url:   '<?php echo base_url(); ?>filtroauto/borrar/'+idcoche,
			                type:  'post',
			                success:  function (data) 
			                {
			                	if(data == '1')
			                	{
			                		$('#confirmar-eliminar').modal('hide');
			                		location.reload();
			                	}
			                	else
			                	{
			                		alert('ocurrió un error intentando eliminar la foto');
			                	}
			                }
			     		   });
					});
		})
</script>