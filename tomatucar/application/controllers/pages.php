<?php

class Pages extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Coche');
	}
	function view($page = 'home'){
		
		
		if(!file_exists('application/views/'.$page.'.php'))
		{
			echo $page;
			echo base_url();
			echo current_url();
			show_404();
		}	
		elseif($page == 'home')
		{
			$coches = $this->Coche->select_slideauto();
			$ciudades = $this->Coche->select_autoPorCiudad();
			$data['coches'] = $coches;
			$data['ciudades'] = $ciudades;
			$data['Titulo'] = 'TomaTuCar';
			$this->load->view('templates/header',$data);
			$this->load->view('home', $data);
			$this->load->view('templates/footer');					
		}
		else {
			$data['Titulo'] = $page;
			$this->load->view('templates/header',$data);
			$this->load->view($page, $data);
			$this->load->view('templates/footer');	
		}
	}
	
}
?>