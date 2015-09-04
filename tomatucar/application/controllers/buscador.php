<?php

class Buscador extends CI_Controller
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Coche');
		$this->load->helper('form');
		$this->load->model('Caracteristicaauto');
		$this->load->library('session');	
	    //checa autoBorrador para obtrener las funciones y los querys
	}
	function index()
    {
    	$data['fechaf']="";
		$data['fechai']="";
		$data['ciudad']="";
		$numAutos=0;
   	if($_POST)
		{
			$data['Direccion'] = $this->input->post('direccion');
			if($this->input->post('lat')=="" && $this->input->post('lng')=="")
			{
				$data['lat'] = 19.432608;
				$data['lng'] = -99.133208;
				$lat =19.432608;
				$lng = -99.133208;
			}
			else
			{
				$data['lat'] = $this->input->post('lat');
				$data['lng'] = $this->input->post('lng');
				$data['ciudad']=$this->input->post('estadodireccion');
				$lat =$this->input->post('lat');
				$lng =  $this->input->post('lng');
			}
			
			if($this->input->post('fechainicio')!="")
			{
				$data['fechai']= $this->input->post('fechainicio'); 
				if($this->session->set_userdata('FechaI'))
				{$this->session->set_userdata('FechaI', $this->input->post('fechainicio'));}
			}			
			if($this->input->post('fechafin')!="")
			{
					
				$data['fechaf']= $this->input->post('fechafin');
				if($this->session->set_userdata('FechaF'))
				 {$this->session->set_userdata('FechaF', $this->input->post('fechafin'));}
			}

			//ELEMENTOS VACIOS PORQUE ES DE HOME A BUSCADOR
			$Precio = 2000;
			$Tipo ="";
			$Extras ="";
			$coches = $this->Coche->select_Buscadorauto($Precio,$Tipo,$Extras,$lat,$lng,0);//CUANDO SEA TIEMPO ACTUALIZAR PARA INCLUIR FECHAS
			$numAutos=$this->Coche->select_ContadorBuscadorauto($Precio,$Tipo,$Extras,$lat,$lng);
		}
		else {
			$data['Direccion'] = "";
			$data['lat'] = "";
			$data['lng'] = "";	
			$coches = $this->Coche->select_autobuscador(0);		
			$numAutos= $this->Coche->countAutos();
		}
		
			if (strpos($this->input->post('direccion') ,'Mexico') !== false || strpos($this->input->post('direccion') ,'México') !== false) 
		{ $data['fueraDeRegion'] = false; }
		else{$data['fueraDeRegion'] = true;}

		
		
		
			$data['numAutos']=$numAutos;
			$data['Titulo'] = 'Buscador de Autos';	
			$data['coches'] = $coches;
			$data['posinicio']=0;
			$this->load->view('templates/header', $data);
			$this->load->view('buscador', $data);
			$this->load->view('templates/footer');	
	
	}
	
}
?>