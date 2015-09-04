<?php

class Login extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Usuario');
	}
	function index()
	{	
		if($_POST)
		{
			if($this->Usuario->login_usuario($_POST))
			{
				redirect('/perfil');				
			}	
			else {
				$data['Titulo'] = 'Login';
				$data['mensaje'] = '<div  class="alert alert-danger"><strong><span class="glyphicon glyphicon-ok"></span></strong> Usuario o contraseña inválido.</div>';
				$this->load->view('templates/header',$data);
				$this->load->view('login');
				$this->load->view('templates/footer');					
			}			
		}
		else {
			$data['Titulo'] = 'Login';
			$data['mensaje'] = '';
			$this->load->view('templates/header',$data);
			$this->load->view('login');
			$this->load->view('templates/footer');	
		}

	}

}