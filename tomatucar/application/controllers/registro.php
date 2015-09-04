<?php

class Registro extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Usuario');
		$this->load->helper('url');
	}
	function index()
	{	
		if($_POST)
		{
			$data['correo']="";
			if(!$this->Usuario->verificar_email($_POST['email'])){
				$data['mensaje'] = '<div  class="alert alert-warning"><strong><span class="glyphicon glyphicon-ok"></span></strong> Este correo ya ha sido registrado.</div>';
				$data['Titulo'] = 'Registro';
				$this->load->view('templates/header',$data);
				$this->load->view('registro',$data);
				$this->load->view('templates/footer');	
			}
			else {
				if($this->Usuario->insert_usuario($_POST)){
					$data['mensaje'] = "
						 <script> 
	             $(document).ready(function() { 
                    $('#info-exito').modal('show');
                    $('#infocerrar' ).click(function() {
			    		$('#info-exito').modal('hide');
					});

            });
            
          
	 </script>";
					$data['correo']=$_POST['email']; 
					$data['Titulo'] = 'Registro';
					$this->load->view('templates/header',$data);
					$this->load->view('registro',$data);
					$this->load->view('templates/footer');
					$this->enviarCorreo($_POST);
				}
				else {
					$data['mensaje'] = '<div  class="alert alert-danger"><strong><span class="glyphicon glyphicon-ok"></span></strong>Ha ocurrido un error intentalo mas tarde.</div>';
					$data['Titulo'] = 'Registro';
					$this->load->view('templates/header',$data);
					$this->load->view('registro',$data);
					$this->load->view('templates/footer');	
				}
				
			}
		}
		else {
	
			$data['mensaje'] = '';
			$data['Titulo'] = 'Registro';
			$this->load->view('templates/header',$data);
			$this->load->view('registro',$data);
			$this->load->view('templates/footer');
	
}
	}
	function enviarCorreo($datos)
	{
		
		$config = array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://servidor3303.tl.controladordns.com',
		  'smtp_user' => 'administrador@dev.tomatucar.com.mx',
		  'smtp_pass' => 'Admin.123',
		  'smtp_port' => 465,
		  'crlf' => "\r\n",
		  'newline' => "\r\n",
		  'smtp_timeout' => 5,
		  'charset' => 'utf-8',
		  'validate' => TRUE,
		  'mailtype' => 'html'
		);
		$this->load->library('email', $config);
		$confirm  = hash('sha256', $datos['nombre'].$datos['apellidos'].$datos['email']); 
		$link = base_url().'confirmacion/'.$confirm;
		$mensaje = '<h4>¡'.$datos['nombre'].' Bienvenid(a) a TomatuCAR! </h4> <br> Gracias por sumarte a nuestra comunidad de movilidad inteligente,
		 ahora es momento de confirmar tu cuenta de correo electrónico dando click al siguiente link: <br> <a href="'.$link.'">Confirmar correo</a>
		 <br> ¡Ya eres parte de TomatuCAR!, no olvides terminar tu perfil y descubre la filosofi�a del compartir, rentar y viajar.
		 <br><br>
		 <div style="width:100%; background-color: rgb(22, 222, 227);"><img src="'.base_url().'img/logo.png"></div>';
		$this->email->from('administrador@dev.tomatucar.com.mx', 'Administrador Tomatucar');
		$this->email->to($datos['email']);
		$this->email->subject('Confirmacion de Correo');
		$this->email->message($mensaje);
		
		$this->email->send();
		
	}
}

?>