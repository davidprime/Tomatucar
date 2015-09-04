<?php

class Filtroauto extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Coche');
	}
	function index(){
		if($this->session->userdata('nombre'))
		{
			$coches = "";
			
			$coches = $this->Coche->select_auto();
			$data['Titulo'] = 'Mis Autos';
			$data['coches'] = $coches;
			$data['mensaje'] ="";
			if($coches = "")
			{
				$data['mensaje'] = '<div  class="alert alert-warning"><strong><span class="glyphicon glyphicon-ok"></span></strong> No cuentas con ningún auto.</div>';;	
			}
			
			$this->load->view('templates/header', $data);
			$this->load->view('filtroauto',$data);
			$this->load->view('templates/footer');	
		}
		else {
			redirect('/login');
		}
	}
	function borrar($id = "0")
	{
		if($this->Coche->delete_auto($id))
		{
			echo TRUE;
			exit;
		}
		else {
			echo FALSE;
			exit;
		}
	}
}
?>