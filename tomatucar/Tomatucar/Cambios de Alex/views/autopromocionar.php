<!--comienza el contenido-->
<meta property="og:title" content="My awesome site" />
<div class="container">
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
				    <li class=" nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autocalendario/<?php echo $item['IdCoche'];?>">Calendario</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificaropciones/<?php echo $item['IdCoche'];?>">Opciones</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>automodificarprecio/<?php echo $item['IdCoche'];?>">Precio</a></li>
				    <li class="active nav_item"><a class="nav_item_link" href="<?php echo current_url(); ?>">Promocionar</a></li>
				    <li class="nav_item"><a class="nav_item_link" href="<?php echo base_url(); ?>autoborrar/<?php echo $item['IdCoche'];?>">Borrar / desactivar</a></li>
				</ul>
			</div>
<?php endforeach; ?>
			<!--termina menu vertical-->
			

      <div id="contenido_promo_auto">
       <div id="subComunidad"><h4 id="sub_promo_auto" class="text-center"><p style="padding-top:133px">Promociona tu auto</p></h4></div>
        <hr>
       <p><u>Promocionar en las redes sociales.</u></p>

 <br>

      
         
       <div id="btn_enviar_mail"><a href="mailto:Ejemplo@Ejemplo.com?subject=Hola, Ahora tu puedes rentar mi auto&amp;body=Entra a este link para poder ver mis autos en renta y muchos otros: http://localhost/Desarrollo/autopromocionar/5" class="btn btn-primary btn-lg" role="button">Mail</a></div>
<!-- <a href="https://www.facebook.com/sharer/sharer.php?u=example.org" target="_blank">Share on Facebook</a>-->
        <div id="img5"><img src="<?php echo base_url(); ?>img/comFace.png"  class="img-responsive" class="img-rounded" height="30px" width="200px" alt="" onclick="ShareFacebook();"></div>
        <div id="img6"><a href="https://twitter.com/share" class="twitter-share-button"><img src="<?php echo base_url(); ?>img/comTwiter.png"  class="img-responsive" class="img-rounded" height="30px" width="200px" alt=""></a></div>
        <br>


        <p>Puedes publicar el anuncio de tu coche en la redes sociales o mandarlo a tus amigos o conocidos, porque ellos seran los primeros en estar interesados. </p>
        <br>

      </div><!--termina contenido promo auto-->

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
<!--Scripts-->

<script>
!function(d,s,id)
{var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
if(!d.getElementById(id))
{js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
fjs.parentNode.insertBefore(js,fjs);
}
}
document, 'script', 'twitter-wjs');
</script>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1105442282805728',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
    
 <script type="text/javascript">  
  function ShareFacebook()
    {
       alert("Entre a Facebook");
FB.ui(
 {
  method: 'share',
  href: 'http://stackoverflow.com/questions/1947263/using-an-html-button-to-call-a-javascript-function'
}, function(response){});

	}
 </script>
