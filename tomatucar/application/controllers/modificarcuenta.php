<?php

class Modificarcuenta extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Usuario');
        $this->load->helper('url');
        $this->load->helper('form');
	}
	function index()
	{
				if($this->session->userdata('nombre'))
				{
					$data['Titulo'] = 'Modificar Cuenta Bancaria';	
					$this->load->view('templates/header', $data);
					$this->load->view('modificarcuenta');
					$this->load->view('templates/footer');
				}	
				else {
					redirect('/login');
				}				
			
	}
	function cambiarcuenta()
	{
				if($this->session->userdata('nombre'))
				{
					$data = array(
						'cuenta' => $this->input->post('cambiarcuenta'),
						'contrasena' => $this->input->post('contrasenacuenta'),
						'id' => $this->session->userdata('identificador')
					);
					
					if($this->Usuario->cambiarcuentab($data))
					{	
						echo '<script>alert("Cuenta agregada con éxito!");</script>';
	               		redirect('modificarcuenta', 'refresh');												
					}
					else {
						echo '<script>alert("No se pudo cambiar la cuenta bancaria");</script>';
	               		redirect('modificarcuenta', 'refresh');		
					}
					

					
				}	
				else {
					redirect('/login');
				}		
	}
}