<?php

class Autocalendario extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Coche');
        $this->load->helper('url');
        $this->load->helper('form');
	}
	function index($id= "0"){
		if($this->session->userdata('nombre'))
		{
			$detallecoche = $this->Coche->select_detalleauto($id);
			
			$data['Titulo'] = 'Calendario Auto';
			$data['detallecoche'] = $detallecoche;
			$this->load->view('templates/header', $data);
			$this->load->view('autocalendario',$data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('/login');			
		}
	}
}
?>