<?php

class Confirmacion extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Confirma');
	}
	
	function index($confirm){
		if($this->Confirma->confirmarEmail($confirm))
		{
			echo "dentro de la confirmacion positiva ".$confirm;
			$data['mensaje'] = '<div  class="alert alert-success"><strong><span class="glyphicon glyphicon-ok"></span></strong>¡FELICIDADES YA ERES PARTE DE TOMATUCAR!.<u> <a id="b13" href="login.html" role="button">  <strong>Iniciar Sesión</strong></a></u></div>';
			$data['Titulo'] = 'Confirmacion';
			$this->load->view('templates/header', $data);
			$this->load->view('confirmacion',$data);
			$this->load->view('templates/footer');
		}
		else {
			echo "\ndentro de la confirmacion negativa \n".$confirm;
			$data['mensaje'] = '<div  class="alert alert-warning"><strong><span class="glyphicon glyphicon-ok"></span></strong> CODIGO EXPIRADO O USADO.</div>';;
			$data['Titulo'] = 'Confirmacion';
			$this->load->view('templates/header', $data);
			$this->load->view('confirmacion', $data);
			$this->load->view('templates/footer');				
		}
	}


}

?>