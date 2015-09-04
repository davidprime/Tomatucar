<?php

class Login extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Usuario');
		$this->load->library('session');//Incluir session
	}
	function index()
	{
	if($this->session->userdata('nombre'))
		{redirect('/home');	}
	else{	
			if($_POST)
			{
				if($this->Usuario->login_usuario($_POST))
				{
					// David Vara 22/07/2015
					//Antes de redirigir al usuario a perfil, ver si debe redirigirse a otro lado
					$loginRedirect = $this->session->userdata('loginRedirect');
					if($this->session->userdata('autoCheck'))
					{
						if($this->session->userdata('loginRedirect'))
						{$this->session->unset_userdata('loginRedirect');}
						
						$this->session->unset_userdata('autoCheck');
						redirect('/auto');
					}
					
					if($loginRedirect>"")
					{
						//Deshacernos del cookie y redirigir
						$this->session->unset_userdata('loginRedirect');
						redirect('/'.$loginRedirect);//Buscador a auto esta pendiente de resolver
					}
					else
						//O redirigir normalmente
						redirect('/filtroauto');					
				}	
				else {
					$data['Titulo'] = 'Login';
					$data['mensaje'] = '<div  class="alert alert-danger"><strong><span class="glyphicon glyphicon-ok"></span></strong> Usuario o contraseña inválido.</div>';
					$this->load->view('templates/header',$data);
					$this->load->view('login');
					$this->load->view('templates/footer');					
				}			
			}
			else 
			{
				$data['Titulo'] = 'Login';
				$data['mensaje'] = '';
				$this->load->view('templates/header',$data);
				$this->load->view('login');
				$this->load->view('templates/footer');	
			}
		
		}
	}

}