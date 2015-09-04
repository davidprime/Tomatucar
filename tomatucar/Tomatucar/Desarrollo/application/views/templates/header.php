<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
	<title><?php echo $Titulo;?></title>
	 <!-- Estilos CSS vinculados -->
	<script src="<?php echo base_url(); ?>js/jquery-latest.min.js"></script>
	<link rel="stylesheet" src="//normalize-css.googlecode.com/svn/trunk/normalize.css" /> 
	<link href='http://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url(); ?>css/estilo.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
  	<script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
  	<script src="<?php echo base_url(); ?>js/responsive.js"></script>
  <script src="<?php echo base_url(); ?>js/modernizr.custom.js" type="text/javascript"></script> 
</head>

<body class="body">
<!--aqui comienza el header de la pagina-->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a id="logo" class="navbar-brand" href="<?php echo base_url(); ?>home"><img src="<?php echo base_url(); ?>img/logo.png" alt="Vuelve al inicio" class="img-rounded" width="180px" height="40px"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          	<?php if($this->session->userdata('nombre')){?>

             <?php }else{ ?>
             	<li><a href="patrocinador.html">!Gana dinero ya!</a></li>
          	 	<li><a href="aviso.html">RENTAR MI VEHÍCULO</a></li> 
             <?php } ?>	
             <?php if($this->session->userdata('nombre')){?>
              <li class="dropdown">
             <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $this->session->userdata('nombre')?><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url(); ?>filtroauto"><span class="glyphicon glyphicon-list-alt"></span> Mis Coches</a></li>
                <li><a href="<?php echo base_url(); ?>rentas"><span class="glyphicon glyphicon-list-alt"></span> Mis Rentas</a></li>
                <li><a href="<?php echo base_url(); ?>pagos"><span class="glyphicon glyphicon-list-alt"></span> Mis Pagos</a></li> 
              	<li><a href="<?php echo base_url(); ?>perfil"><span class="glyphicon glyphicon-wrench"></span>Perfil</a></li> 
              </ul></li>
             <li class="dropdown">
             <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">¿Cómo funciona?<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url(); ?>propietario"><span class="glyphicon glyphicon-list-alt"></span> Para propietario</a></li>
                <li><a href="<?php echo base_url(); ?>arrendador"><span class="glyphicon glyphicon-list-alt"></span> Para arrendador</a></li>
                <li><a href="<?php echo base_url(); ?>preguntas"><span class="glyphicon glyphicon-wrench"></span> ¿Ayuda?</a></li> 
              </ul></li>
              <?php }else{ ?>
             <li class="dropdown">
             <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">¿Cómo funciona?<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url(); ?>propietario"><span class="glyphicon glyphicon-list-alt"></span> Para propietario</a></li>
                <li><a href="<?php echo base_url(); ?>arrendador"><span class="glyphicon glyphicon-list-alt"></span> Para arrendador</a></li>
                <li><a href="<?php echo base_url(); ?>preguntas"><span class="glyphicon glyphicon-wrench"></span> ¿Ayuda?</a></li> 
              </ul></li>
            <li><a href="<?php echo base_url(); ?>registro"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
			<?php } ?>	
			<?php if($this->session->userdata('nombre')){?>
			<li><a href="<?php echo base_url(); ?>logout"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
          	<?php }else{ ?>
          	<li><a href="<?php echo base_url(); ?>login"><span class="glyphicon glyphicon-log-in"></span> Conectarse</a></li>	
          	<?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div><!--aqui termina el container del nav -->
    </nav><!--aqui termina el nav completo -->

<!--aqui termina el header de la pagina-->