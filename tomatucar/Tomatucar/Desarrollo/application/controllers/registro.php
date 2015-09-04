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
			if(!$this->Usuario->verificar_email($_POST['email'])){
				$data['mensaje'] = '<div  class="alert alert-warning"><strong><span class="glyphicon glyphicon-ok"></span></strong> Este correo ya ha sido registrado.</div>';
				$data['Titulo'] = 'Registro';
				$this->load->view('templates/header',$data);
				$this->load->view('registro',$data);
				$this->load->view('templates/footer');	
			}
			else {
				if($this->Usuario->insert_usuario($_POST)){
					$data['mensaje'] = '<div  class="alert alert-success"><strong><span class="glyphicon glyphicon-ok"></span></strong>Te hemos enviado un correo para verificar tu usuario.</div>';
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
		  'smtp_host' => 'ssl://smtp.gmail.com',
		  'smtp_user' => 'casertillo@gmail.com',
		  'smtp_pass' => 'Mex1Can0\Go',
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
		$mensaje = '¡'.$datos['nombre'].' Bienvenid(a) a Tomatucar! <br> <br> Este correo se ha generado automáticamente para confirmar tu correo. <br><br> Porfavor da click en el siguiente link: <a href="'.$link.'">'.$link.'</a>';
		$this->email->from('casertillo@gmail.com', 'Administrador Tomatucar');
		$this->email->to('searchca@hotmail.com');
		$this->email->subject('Confirmacion de Correo');
		$this->email->message($mensaje);
		
		$this->email->send();
		
	}
}

?>