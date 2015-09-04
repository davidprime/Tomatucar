<!--comienza el contenido-->
<div class="container">
<div id="contenido1">
    <div class="panelBorde7" class="panel panel-default" >
    <div class="panel-body" >
      <h2 id="tituloporque" class="text-center"><strong>¿Por qué TomatuCAR?</strong></h2>
      <br>
      <br>
      <br>
      <br>
       <div class="media">
              <img class="pull-left" src="img/ptoma1.png" class="media-object" width="80px" height="80px">
           <div class="media-body">
             <h4 class="media-heading">Sharing Economy</h4>
             <p class="text-justify"  >TomatuCAR es un sitio de Sharing Economy es decir, un sistema de consumo compartido de bienes y servicios. TomatuCAR permite relacionar a propietarios y personas que necesitan un auto en cada estado de la República Mexicana.</p>
           </div>
        </div>
        
        <br>

       <div class="media">
              <img class="pull-left" src="img/ptoma2.png" class="media-object" width="80px" height="80px">
           <div class="media-body">
             <h4 class="media-heading">Economía de Proximidad</h4>
             <p class="text-justify"  >El objetivo principal de TomatuCAR es dar a los particulares la posibilidad de favorecer una economía de proximidad, comprometiéndonos a que los propietarios de autos ganen dinero y así mismo, los arrendatarios puedan hacer uso de un vehículo economizando gastos de transporte.</p>
           </div>
        </div>
        
  		</div><!--termina panel panel-success-->
      </div><!--termina pannel body-->
</div><!--termina contenido 1-->


<div id="contenido2">
    <div  class="panelBorde2" class="panel panel-default" >
     
    <div class="panel-body" >
        <div  class="media">
              
           <div class="media-body">
           	<img class="pull-left" src="img/ptoma3.png" class="media-object" width="80px" height="80px">
             <h4 class="media-heading">Optimizar el Auto</h4>
             <p class="text-justify"  >Usted debe saber que 99% del tiempo los autos no son usados y gracias a TomatuCAR, podemos ayudarlos a optimizar esta proporción de una manera eficiente.</p>
           </div>
        </div>
        
        <br>
        <div class="media">
              
           <div class="media-body">
           	<img class="pull-left" src="img/ptoma4.png" class="media-object" width="80px" height="80px">
             <h4 class="media-heading">Asimilar los Gastos</h4>
             <p class="text-justify"  >Según el estudio de ITDP México (Instituto de Políticas para el Transporte y el Desarrollo), tener un coche modelo Mazda 3, año 2009 genera un gasto anual de 38.500 pesos y 7.500 pesos de seguro. En total, el dueño de un auto seminuevo gasta más o menos 45.000 anuales.</p>
           </div>
        </div>
        
       
      <div class="media">
              <img class="pull-left" src="img/ptoma5.png" class="media-object" width="80px" height="80px">
           <div class="media-body">
             <h4 class="media-heading">Consumo Inteligente</h4>
             <p class="text-justify"  >TomatuCAR es una manera diferente, simple e inteligente de consumir un servicio de transporte particular y totalmente asegurado. Como dueño, poner en renta su auto es una forma de rentabilizar y aprovechar con eficiencia los gastos que se generan y por qué no, hacer de estos una ganancia.</p>
           </div>
        </div>
        
	

      </div><!--termina pannel body-->
	
  </div><!--termina panel panel-success-->

</div><!--termina contenido 2-->
        <?php if($this->session->userdata('nombre')){?>
				<a href="<?php echo base_url(); ?>auto" style="margin-left: 10px;" class="btn btn-success btn-lg pull-right" role="button"><strong>Rentar mi vehículo</strong></a>
	    <?php }else{ ?>
				<a href="<?php echo base_url(); ?>login" style="margin-left: 10px;" class="btn btn-success btn-lg pull-right" role="button"><strong>Rentar mi vehículo</strong></a>
		<?php } ?>	
      <a class="btn btn-primary btn-lg pull-right"  href="<?php echo base_url(); ?>buscador" role="button"><strong>Necesito un vehículo</strong></a>	
</div><!--termina container de ontenido-->
<!--termina de contenido-->
<br>