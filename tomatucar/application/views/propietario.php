	<!--Slider-->
	<script src="<?php echo base_url(); ?>js/bootstrap-slider.js"></script>
	<link href="<?php echo base_url(); ?>css/bootstrap-slider.css" rel="stylesheet">
	
<!--comienza el contenido-->
<div class="container">

  <div id="headComunidad" class="media">
    <a class="pull-left"><img src="img/ep.png" class="media-object" width="80px" height="80px" alt="imagen"></a>

     <div class="media-body">
        <h2 id="titulocomunidad" class="media-heading"><strong> ¿Eres un propietario?</strong></h2>
     </div>

    <br>

    <div id="subComunidad">
      <h5><p class="verdeFuerte">Gracias a TomatuCAR puedes ganar dinero poniendo tu coche en renta en la comunidad</p></h5>
    </div>
    <br>
</div>

  <div id="contenidopropietario">
    <h4 id="titulopropietario"><p class="verdeClaro">¿Hacemos un calculo rapido?</p></h4>
    <br>
    <div class="list-group">
            <h5 class="text-left"><p>Precio de compra de tu coche: <span id="ex1CurrentSliderValLabel" ><span id="valSliderAuto" >50,000</span>$</span></p></h5>
            <input id="valorAuto" type="text" data-slider-min="50000" data-slider-max="1000000" data-slider-step="25000" data-slider-value="1"/> 
            <br>
            <h5 class="text-justify"><p> Puedo rentar mi coche <span id="ex2CurrentSliderValLabel"><span id="valSliderDias">1</span><span> dia(s) por mes</span></span></p></h5>
            
            <input id="Ndias" type="text" data-slider-min="1" data-slider-max="30" data-slider-step="1" data-slider-value="1"/>
            
       </div><!--aqui termina list group-->  

       <div id="valor">
            <h5><span id="ex3CurrentSliderValLabel" >¡TU GANAS HASTA! :<span id="resulTotal">1500</span><span>$ por año</span></h5>
      </div>
              <br>

            <h4 class="text-justify"><p class="verdeClaro">¡Renta tu coche con toda seguridad!</p></h4>

            <h5 class="text-justify"><p >-Seguro de todo riesgo</p></h5>
            <h5 class="text-justify"><p >-Asistencia en accidente</p></h5>
            <h5 class="text-justify"><p >-Bonos personales de seguro protegido</p></h5>
           
            <br>
            <h4 class="text-justify"><p class="verdeClaro">Manten el control</p></h4>

            <h5 class="text-justify"><p >-Decides el precio de renta</p></h5>
            <h5 class="text-justify"><p >-Gestiona la disponiblilidad de tu auto</p></h5>
            <h5 class="text-justify"><p >-Eres libre de aceptar o rechazar propuestas</p></h5>      

  </div><!-- aqui termina e div contenidopropietario -->
    
 <div id="contenidopropietario2">
 
     <div id="video">
        <iframe class="center-block" width="400" height="320" src="//www.youtube.com/embed/v95blrlQ7-M" frameborder="0" allowfullscreen></iframe>
     </div><!-- aqui termina div de video -->

      <div id="botonesA"> 
				<?php if($this->session->userdata('nombre')){?>
				<div id="b5"><a href="<?php echo base_url(); ?>auto" class="btn btn-success btn-lg" role="button"><strong>Rentar mi vehículo</strong></a></div>
	    <?php }else{ ?>
				<div id="b5"><a href="<?php echo base_url(); ?>login" class="btn btn-success btn-lg" role="button"><strong>Rentar mi vehículo</strong></a></div>
		<?php } ?>	
      </div><!-- aqui termina el div de los botones -->
      <div id="b6"><a class="btn btn-primary btn-lg " href="<?php echo base_url(); ?>buscador" role="button"><strong>Necesito un vehículo</strong></a></div>
</div><!-- aqui termina e div comunidad 2 -->   

</div>
  <!-- Js vinculados -->  
  <!-- funciones js --> 
  <script type='text/javascript'>
      $(document).ready(function() {// funcio para el primer input radius
      
      $("#valorAuto").slider(); //con este codigo creo un elemento de entrada
      $("#valorAuto").on('slide', function(slideEvt) {
        $("#valSliderAuto").text(slideEvt.value);
      });     

      });
    </script>

    <script type='text/javascript'>
      $(document).ready(function() { //funcion para el 2° input radius
        
      
      $("#Ndias").slider();//con este codigo creo un elemento de entrada
      $("#Ndias").on('slide', function(slideEvt) { //con este codigo creo la funcion que va a responder a un evento
        $("#valSliderDias").text(slideEvt.value); //con este codigo muestro el valor en el label
      });     

      });
    </script>


    <script type'text/javascript'>
    $(document).ready(function(){// funcion que realiza el calculo y lo muestra en un label

      var actualiza = function() {
            $('#resulTotal').text((valorAutos.getValue()) / 400 * (ndias.getValue()) * 12);
          };
        
      
      var valorAutos = $("#valorAuto").slider().on('slide',actualiza).data('slider');
      var ndias= $("#Ndias").slider().on('slide',actualiza).data('slider');
      
    
    });//termina la funcion ready
    </script>   