<?php
class PorqueTomatucar extends CI_Controller{
		
	function __construct() {
		parent::__construct();
		$this->load->model('Usuario');
		$this->load->helper('url');
	}
	
	function index()
	{
		$data['Titulo'] = 'Por que Tomatucar';
		$this->load->view('templates/header',$data);
		$this->load->view('porqueTomatucar');
		$this->load->view('templates/footer');
			
	}
	
	
}

?>