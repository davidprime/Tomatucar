<?php
 class ActualizarBusqueda extends CI_Controller
 {
 	function __construct() 
	{
		parent::__construct();
		$this->load->model('Coche');
		$this->load->model('Renta');
		$this->load->library('session');
	}
	function index()
	{
		$Precio=$this->input->post('precioS'); 
		
		if($this->input->post('Tipo'))
		{$Tipo=$this->input->post('Tipo');}
		else{$Tipo="";}
		
		if($this->input->post('Extras'))
		{$Extras=$this->input->post('Extras');}	
		else{$Extras="";}
		
		$lat=$this->input->post('lat');
		$lng=$this->input->post('lng');
		$posinicial=$this->input->post('posinicial');
		$direccion=$this->input->post('direccion');
		$numAutos=0;
		
		if($this->input->post('FechaInicio')!="")
		{
			if($this->session->set_userdata('FechaI'))
			{$this->session->set_userdata('FechaI', $this->input->post('FechaInicio'));}
		}			
		if($this->input->post('FechaFin')!="")
		{
			if($this->session->set_userdata('FechaF'))
			{$this->session->set_userdata('FechaF', $this->input->post('FechaFin'));}
		}
			
			
		$coches = "";
		if($direccion=="" && $posinicial>=0)//Testing for the cases where they are using the pages to navigate the default cars and no searching for any
		{
			$coches=$this->Coche->select_autobuscador($posinicial);
			$numAutos= $this->Coche->countAutos();
		}
		else{
			$coches = $this->Coche->select_Buscadorauto($Precio,$Tipo,$Extras,$lat,$lng,$posinicial);
			$numAutos=$this->Coche->select_ContadorBuscadorauto($Precio,$Tipo,$Extras,$lat,$lng);
			}//CUANDO SEA MOMENTO AGREGAR FECHAS DEL FORMULARIO A LA BUSQUEDA
		$data['lat']=$lat;
		$data['lng']=$lng;	
		$data['numAutos']=$numAutos;
		$data['coches'] = $coches;
		$data['nuevoInicio']=$posinicial;
		$data['ciudad']=$this->input->post('estadodireccion');
		//Se revisa que la direccion sea de mexico
		if (strpos($this->input->post('direccion') ,'Mexico') !== false || strpos($this->input->post('direccion') ,'México') !== false) 
		{ $data['tipoerror'] = 1; }
		else{$data['tipoerror'] = 2;}
		
		if($coches)
		{$this->load->view('buscadorResultados', $data);}
		else{	$this->load->view('ErrorBuscador', $data);}
		//falta agregar el contador de resultados tanto para Buscador auto comoautobuscador
		//falta pasarle los parametros a buscador Resultado para que mantega las paginas.
		//falta poner los ... en la predefinida paginador de buscador y en los resultados. prueba con un numero reducido como 3 autos por pagina		
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
		$renta = $this->Renta->select_BusquedaRenta($IDCoche,$Fecha,$IDStatus,$id,$radio);
		$data['rentas'] = $renta;
		$data['id']=$id;
		if($renta)
		{$this->load->view('buscadorRentaResultados', $data);}
		else{$this->load->view('ErrorBuscadorRenta', $data);}
		
	}
	
 }
?>