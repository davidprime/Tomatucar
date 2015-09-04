<?php

class Autoinfogeneral extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Coche');
	}
	function index($id= "0"){
		if($this->session->userdata('nombre'))
		{
			$detallecoche = $this->Coche->select_detalleauto($id);
			
			$data['Titulo'] = 'Informacion General';
			$data['detallecoche'] = $detallecoche;
			$this->load->view('templates/header', $data);
			$this->load->view('autoinfogeneral',$data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('/login');			
		}
	}
}
?>