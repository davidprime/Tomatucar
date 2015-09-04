<?php

class Modificarcorreo extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Usuario');
		$this->load->model('Pais');
		$this->load->model('Estado');
		$this->load->model('Ciudad');
        $this->load->helper('url');
        $this->load->helper('form');
		$this->load->library('image_lib');
	}
	function index()
	{
				if($this->session->userdata('nombre'))
				{
					$data['Titulo'] = 'Modificar Correo';	
					$this->load->view('templates/header', $data);
					$this->load->view('modificarcorreo');
					$this->load->view('templates/footer');
				}	
				else {
					redirect('/login');
				}				
			
	}
	function cambiarcorreo()
	{
				if($this->session->userdata('nombre'))
				{
					$data = array(
						'email' => $this->input->post('cambiaremail'),
						'contrasena' => $this->input->post('contrasenaemail'),
						'id' => $this->session->userdata('identificador')
					);
					
					if($this->Usuario->verificar_email($this->input->post('cambiaremail')))
					{
						if($this->Usuario->cambiarcorreo($data))
						{
							echo '<script>alert("Usuario Actualizado correctamente!");</script>';
							$this->session->sess_destroy();
							redirect('', 'refresh');
						}
						else{
							echo '<script>alert("Contraseña Incorrecta!");</script>';
	               			redirect('modificarcorreo', 'refresh');						
						}						
					}
					else {
						echo '<script>alert("Correo ocupado!");</script>';
	               		redirect('modificarcorreo', 'refresh');		
					}
					

					
				}	
				else {
					redirect('/login');
				}		
	}
	function cambiarcontrasena()
	{
		if($this->session->userdata('nombre'))
		{
			$data = array(
				'contrasenavieja' => $this->input->post('cambiarcontrasena'),
				'contrasenanueva' => $this->input->post('contrasenanueva'),
				'id' => $this->session->userdata('identificador')
			);
			if($this->Usuario->cambiarcontrasena($data))
			{
				echo '<script>alert("Contrasena cambiada con exito!\n Favor de ingresar con la nueva contrasena");</script>';
				$this->session->sess_destroy();
				redirect('', 'refresh');				
			}
			else {
				echo '<script>alert("Ocurrió un error al intentar cambiar el contraseno");</script>';
				redirect('modificarcorreo', 'refresh');	
			}
			
		}	
		else {
			redirect('/login');
		}		
	}
	function eliminarcuenta()
	{
		if($this->session->userdata('nombre'))
		{
			$data = array(
				'contrasena' => $this->input->post('eliminarcontrasena'),
				'id' => $this->session->userdata('identificador')
			);
			if($this->Usuario->eliminarcuenta($data))
			{
				echo '<script>alert("Cuenta eliminada con exito!\n Vuelve pronto!");</script>';
				$this->session->sess_destroy();
				redirect('', 'refresh');				
			}
			else {
				echo '<script>alert("Ocurrio un error al intentar cambiar la contrasena");</script>';
				redirect('modificarcorreo', 'refresh');	
			}
			
		}	
		else {
			redirect('/login');
		}		
	}
}