<?php

class MisRentas extends CI_Controller
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Renta');
		$this->load->model('Coche');
		$this->load->helper('form');
	    
	}
	function index()
    {
		if($this->session->userdata('nombre'))
		{		
			$data['Titulo'] = 'Mis Rentas';
			$id=$this->session->userdata('identificador');
			$rentas = $this->Renta->select_Rentas($id);
			$miscoches=$this->Coche->select_auto();
			$data['coches'] = $miscoches;
			$data['rentas'] = $rentas;
			$data['id']=$id;
			$this->load->view('templates/header', $data);
			$this->load->view('misRentas');
			$this->load->view('templates/footer');	
		}
		else {redirect('/login');}
	}
	
}
?>