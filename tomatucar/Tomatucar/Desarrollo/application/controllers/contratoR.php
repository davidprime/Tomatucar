<?php
class ContratoR extends CI_Controller{
		
	function __construct() {
		parent::__construct();
		$this->load->model('Usuario');
		$this->load->helper('url');
	}
	
	function index()
	{
		$data['Titulo'] = 'Contrato de Renta';
		$this->load->view('templates/header',$data);
		$this->load->view('contratoR');
		$this->load->view('templates/footer');
			
	}
}

?>