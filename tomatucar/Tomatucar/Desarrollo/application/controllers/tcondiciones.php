<?php
class Tcondiciones extends CI_Controller{
		
	function __construct() {
		parent::__construct();
		$this->load->model('Usuario');
		$this->load->helper('url');
	}
	
	function index()
	{
		$data['Titulo'] = 'Terminos y Condiciones';
		$this->load->view('templates/header',$data);
		$this->load->view('tcondiciones');
		$this->load->view('templates/footer');
			
	}
}

?>