<?php

class Buscador extends CI_Controller
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Coche');
		$this->load->helper('form');
		$this->load->model('Caracteristicaauto');
	    //checa autoBorrador para obtrener las funciones y los querys
	}
	function index()
    {
   	if($_POST)
		{
			$data['Direccion'] = $this->input->post('direccion');
			$data['lat'] = $this->input->post('lat');
			$data['lng'] = $this->input->post('lng');
			$Precio = 10000;
			$KM = "";
			$Tipo ="";
			$Extras ="";
			$lat =$this->input->post('lat');
			$lng =  $this->input->post('lng');
			$coches = $this->Coche->select_Buscadorauto($Precio,$KM,$Tipo,$Extras,$lat,$lng);
		}
		else {
			$data['Direccion'] = "";
			$data['lat'] = "";
			$data['lng'] = "";	
			$coches = $this->Coche->select_autobuscador();		
		}
			$data['Titulo'] = 'Buscador de Autos';	
			$kilometros = $this->Caracteristicaauto->select_kilometros();
			$data['kilometros'] = $kilometros;
			$data['coches'] = $coches;
			$this->load->view('templates/header', $data);
			$this->load->view('buscador', $data);
			$this->load->view('templates/footer');	
	}
	
}
?>