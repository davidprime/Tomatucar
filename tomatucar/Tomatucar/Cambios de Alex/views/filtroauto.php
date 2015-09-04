   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
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

   <div id="contenido_tus_autos">
   <?php foreach ($coches as $item): ?>	
   <div id="cuadro_borde" >
   	
   	 <!--David Vara 29/04-->
   	<!--Carousel   Se define un id unico para cada carousel segun los ids de los coches-->
   	<div id="carCarousel_<?php echo $item['IdCoche'];?>" class="carousel slide" data-interval="false" style="width:350px">
  <!-- "Bolitas blancas" -->
  <ol class="carousel-indicators">
    <li data-target="#carCarousel_<?php echo $item['IdCoche'];?>" data-slide-to="0" class="active"></li>
    <li data-target="#carCarousel_<?php echo $item['IdCoche'];?>" data-slide-to="1"></li>
    <li data-target="#carCarousel_<?php echo $item['IdCoche'];?>" data-slide-to="2"></li>
  </ol>

  <!-- Items del carousel-->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
    	<?php if($item['Foto1'] > ""):?>	
      		<img  src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto1'];?>" alt="..." class="img-thumbnail" width="350px" height="240px" style="max-height: 240px; max-width: 350px; min-height: 240px; min-width: 350px">
    	<?php else: ?>
    		<img  src="<?php echo base_url(); ?>img/ford.jpg" alt="..." class="img-thumbnail" width="350px" height="240px" style="max-height: 240px; max-width: 350px; min-height: 240px; min-width: 350px">
    	<?php endif; ?>		
    </div>

    <div class="item">
    	<?php if($item['Foto2'] > ""):?>	
      		<img  src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto2'];?>" alt="..." class="img-thumbnail" width="350px" height="240px" style="max-height: 240px; max-width: 350px; min-height: 240px; min-width: 350px">
    	<?php else: ?>
    		<img  src="<?php echo base_url(); ?>img/ford.jpg" alt="..." class="img-thumbnail" width="350px" height="240px" style="max-height: 240px; max-width: 350px; min-height: 240px; min-width: 350px">
    	<?php endif; ?>	
    </div>

    <div class="item">
    	<?php if($item['Foto3'] > ""):?>	
      		<img  src="<?php echo base_url(); ?>uploads/<?php echo $item['Foto3'];?>" alt="..." class="img-thumbnail" width="350px" height="240px" style="max-height: 240px; max-width: 350px; min-height: 240px; min-width: 350px">
    	<?php else: ?>
    		<img  src="<?php echo base_url(); ?>img/ford.jpg" alt="..." class="img-thumbnail" width="350px" height="240px" style="max-height: 240px; max-width: 350px; min-height: 240px; min-width: 350px">
    	<?php endif; ?>	
    </div>

  </div>

  <!-- Controles de izquierda y derecha-->
  <a class="left carousel-control" href="#carCarousel_<?php echo $item['IdCoche'];?>" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="right carousel-control" href="#carCarousel_<?php echo $item['IdCoche'];?>" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
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
        <!--fin de cambios-->
        </p></h4>

        <p><?=$item['Direccion']?></p>
          <p>Evaluacion</p>        
        <div id="dm2" class="divValoracion">
            <div class="estrella_1 estrellasValoracion"></div>
            <div class="estrella_2 estrellasValoracion"></div>
            <div class="estrella_3 estrellasValoracion"></div>
            <div class="estrella_4 estrellasValoracion"></div>
            <div class="estrella_5 estrellasValoracion"></div>
            <div class="votosTotales">Datos de votación</div>
        </div>
          <div id="otros_datos">
            <p><span>0</span> Contacto</p> 
            <p><span>0</span> Consultas</p> 
            <p><span>0</span> Rentas</p> 
          </div>

           
           <?php 
           if($item['Status']!=1) 
		   {
           ?>
           <div id="gestionar_auto"><a href="<?php echo base_url(); ?>autoinfogeneral/<?php echo $item['IdCoche'];?> " class="btn btn-primary btn-lg">Gestionar auto</a></div>
           <div id="calendario"><a href="#" class="btn btn-success btn-lg">Calendario</a></div>
           <div id="ver_anuncio"><a href="#" class="btn btn-info btn-lg">Ver anuncio</a></div>
      <?php } else{ ?><div id="gestionar_auto"><a href="<?php echo base_url(); ?>autoBorrador/<?php echo $item['IdCoche'];?>" class="btn btn-primary btn-lg">Seguir Editando</a></div><?php }?>
         </div>
      </div>
	  <?php endforeach; ?>
   </div>
   </div>


</div><!--termina contenido cuenta-->
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