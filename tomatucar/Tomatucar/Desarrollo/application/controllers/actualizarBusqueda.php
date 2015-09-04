<?php
 class ActualizarBusqueda extends CI_Controller
 {
 	function __construct() 
	{
		parent::__construct();
		$this->load->model('Coche');
		$this->load->model('Rentas');
	}
	function index()
	{
		$Precio=$this->input->post('precioS'); 
		//echo print_r($_POST); 
		$KM=$this->input->post('km');	
		
		if($this->input->post('Tipo'))
		{$Tipo=$this->input->post('Tipo');}
		else{$Tipo="";}
		
		if($this->input->post('Extras'))
		{$Extras=$this->input->post('Extras');}	
		else{$Extras="";}
		
		$lat=$this->input->post('lat');
		$lng=$this->input->post('lng');
		
		$coches = "";
		$coches = $this->Coche->select_Buscadorauto($Precio,$KM,$Tipo,$Extras,$lat,$lng);
		$data['coches'] = $coches;
		
		if($coches)
		{$this->load->view('buscadorResultados', $data);}
		else{	$this->load->view('ErrorBuscador', $data);}
		
	}
	
	function Rentas()
	{
		//echo print_r($_POST);
		$IDCoche=$this->input->post('Coche');
		$Fecha=$this->input->post('FechaBusqueda');
		$IDStatus=$this->input->post('Status');
		$id=$this->session->userdata('identificador');
		$radio=$this->input->post('TipoRenta');
		$renta="";
		$renta = $this->Rentas->select_BusquedaRenta($IDCoche,$Fecha,$IDStatus,$id,$radio);
		$data['rentas'] = $renta;
		
		if($renta)
		{$this->load->view('buscadorRentaResultados', $data);}
		else{	$this->load->view('ErrorBuscador', $data);}
		
	}
	
 }
?>