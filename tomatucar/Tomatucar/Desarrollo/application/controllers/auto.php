<?php

class Auto extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Marcaauto');
		$this->load->model('Modeloauto');
		$this->load->model('Annio');
		$this->load->model('Caracteristicaauto');
		$this->load->model('Coche');
		$this->load->helper('form');
	}
	function index(){
		if($this->session->userdata('nombre'))
		{
			$marcas = $this->Marcaauto->select_marcasautos();
			$annios = $this->Annio->select_annios();
			$plazas = $this->Caracteristicaauto->select_plazas();
			$combustibles = $this->Caracteristicaauto->select_energias();
			$kilometros = $this->Caracteristicaauto->select_kilometros();
			$consumos = $this->Caracteristicaauto->select_consumos();
			$puertas = $this->Caracteristicaauto->select_puertas();
			$transmisiones = $this->Caracteristicaauto->select_transmisiones();
			$engomados = $this->Caracteristicaauto->select_tipoengomados();
			$colorengomados = $this->Caracteristicaauto->select_colorengomados();
			$terminacionplacas = $this->Caracteristicaauto->select_terminacionplacas();
			
			$data['Titulo'] = 'Nuevo Auto';
			
			$data['marcas'] = $marcas;
			$data['annios'] = $annios;
			$data['plazas'] = $plazas;
			$data['combustibles'] = $combustibles;
			$data['kilometros'] = $kilometros;
			$data['consumos'] = $consumos;
			$data['puertas'] = $puertas;
			$data['transmisiones'] = $transmisiones;
			$data['engomados'] = $engomados;
			$data['colorengomados'] = $colorengomados;
			$data['terminacionplacas'] = $terminacionplacas;
			
			$this->load->view('templates/header', $data);
			$this->load->view('auto', $data);
			$this->load->view('templates/footer');	
		}
		else {
			redirect('/login');
		}
	}
	function creadDDModelo(){
		$idmarca = $this->input->post('marca',TRUE);
		
		$modelos = $this->Modeloauto->select_modelosautos($idmarca);
		$output = "";
        foreach ($modelos as $key=>$a)
        {
            //here we build a dropdown item line for each query result
            $output .= "<option value='".$key."'>".$a."</option>";
        }		
		
		echo $output;
	}
	function subirInformacion()
	{
		date_default_timezone_set('America/Mexico_City');
		$fecha = date('Y-m-d H:i:s');

		$estado = $this->input->post('estadodireccion');
		
		$data = array(
			'idusuario' =>$this->session->userdata('identificador'),
			'idmarca' => $this->input->post('marca'),
			'idmodelo' => $this->input->post('modelo'),
			'idtipocoche' => $this->input->post('cartype'),
			'idannios'=>$this->input->post('primerAnio'),
			'idnumeroplaza'=>$this->input->post('Nplazas'),
			'idtipoenergia'=>$this->input->post('energia'),
			'idrangokilometraje'=>$this->input->post('km'),
			'idnumeropuerta'=>$this->input->post('Npuertas'),
			'idtipotransmision'=>$this->input->post('transimicion'),
			'idcolorengomado'=>$this->input->post('engomado'),
			'idholograma'=>$this->input->post('tengomado'),
			'aireacondicionado'=>$this->input->post('clima') ? "1" : "0",
			'direccionasistida'=>$this->input->post('direccionasistida') ? "1" : "0",
			'reguladorvelocidad'=>$this->input->post('velocidad') ? "1" : "0",
			'gps'=>$this->input->post('gps') ? "1" : "0",
			'sillabebe'=>$this->input->post('silla') ? "1" : "0",
			'lectorcdmp3'=>$this->input->post('cdmp3') ? "1" : "0",
			'entradaauxiliar'=>$this->input->post('auxiliar') ? "1" : "0",
			'usb'=>$this->input->post('usb') ? "1" : "0",
			'bluetooth'=>$this->input->post('bluetooth') ? "1" : "0",
			'alarma'=>$this->input->post('alarma') ? "1" : "0",
			'engancheremolque'=>$this->input->post('remolque') ? "1" : "0",
			'bolsaaire'=>$this->input->post('bolsas') ? "1" : "0",
			'mascota'=>$this->input->post('mascota') ? "1" : "0",
			'fumar'=>$this->input->post('fumar') ? "1" : "0",
			'idstatus'=>"1",
			'fechaagregado' =>$fecha,
			'idiomafrances'=>$this->input->post('frances') ? "1" : "0",
			'idiomaaleman'=>$this->input->post('aleman') ? "1" : "0",
			'idiomaingles'=>$this->input->post('ingles') ? "1" : "0",
			'idiomaespaniol'=>$this->input->post('espanol') ? "1" : "0",
			'descripcionpersonal'=>$this->input->post('descripcioncoche'),
			'direccioncoche'=>$this->input->post('direccion'),
			'estado'=>$estado,
			'lat'=>$this->input->post('lat'),
			'lng'=>$this->input->post('lng'),
			'costoprimerdiarenta'=>$this->input->post('renta1'),
			'costosegundodiarenta'=>$this->input->post('renta2'),
			'preciokilometro'=>$this->input->post('rentakm'),
			'diapromedio'=>$this->input->post('totaldiaprom'),
			'matriculacoche'=>$this->input->post('matricula'),
			'salvado'=>0
		);		
		if($this->Coche->insert_auto($data))
		{
			redirect('/filtroauto');
		}
		else {
			redirect('/filtroauto');
		}
		
	}
	function subirborrador()
	{
		date_default_timezone_set('America/Mexico_City');
		$fecha = date('Y-m-d H:i:s');
		
		$estado = $this->input->post('estadodireccion');
		$data = array(
			'idusuario' =>$this->session->userdata('identificador'),
			'idmarca' => $this->input->post('marca'),
			'idmodelo' => $this->input->post('modelo'),
			'idtipocoche' => $this->input->post('cartype'),
			'idannios'=>$this->input->post('primerAnio'),
			'idnumeroplaza'=>$this->input->post('Nplazas'),
			'idtipoenergia'=>$this->input->post('energia'),
			'idrangokilometraje'=>$this->input->post('km'),
			'idnumeropuerta'=>$this->input->post('Npuertas'),
			'idtipotransmision'=>$this->input->post('transimicion'),
			'idcolorengomado'=>$this->input->post('engomado'),
			'idholograma'=>$this->input->post('tengomado'),
			'aireacondicionado'=>$this->input->post('clima') ? "1" : "0",
			'direccionasistida'=>$this->input->post('direccionasistida') ? "1" : "0",
			'reguladorvelocidad'=>$this->input->post('velocidad') ? "1" : "0",
			'gps'=>$this->input->post('gps') ? "1" : "0",
			'sillabebe'=>$this->input->post('silla') ? "1" : "0",
			'lectorcdmp3'=>$this->input->post('cdmp3') ? "1" : "0",
			'entradaauxiliar'=>$this->input->post('auxiliar') ? "1" : "0",
			'usb'=>$this->input->post('usb') ? "1" : "0",
			'bluetooth'=>$this->input->post('bluetooth') ? "1" : "0",
			'alarma'=>$this->input->post('alarma') ? "1" : "0",
			'engancheremolque'=>$this->input->post('remolque') ? "1" : "0",
			'bolsaaire'=>$this->input->post('bolsas') ? "1" : "0",
			'mascota'=>$this->input->post('mascota') ? "1" : "0",
			'fumar'=>$this->input->post('fumar') ? "1" : "0",
			'idstatus'=>"1",
			'fechaagregado' =>$fecha,
			'idiomafrances'=>$this->input->post('frances') ? "1" : "0",
			'idiomaaleman'=>$this->input->post('aleman') ? "1" : "0",
			'idiomaingles'=>$this->input->post('ingles') ? "1" : "0",
			'idiomaespaniol'=>$this->input->post('espanol') ? "1" : "0",
			'descripcionpersonal'=>$this->input->post('descripcioncoche'),
			'direccioncoche'=>$this->input->post('direccion'),
			'estado'=>$estado,
			'lat'=>$this->input->post('lat'),
			'lng'=>$this->input->post('lng'),
			'costoprimerdiarenta'=>$this->input->post('renta1'),
			'costosegundodiarenta'=>$this->input->post('renta2'),
			'preciokilometro'=>$this->input->post('rentakm'),
			'diapromedio'=>$this->input->post('totaldiaprom'),
			'matriculacoche'=>$this->input->post('matricula'),
			'salvado'=>1
		);		
		if($this->Coche->insert_auto($data))
		{
			redirect('/filtroauto');
		}
		else {
			redirect('/filtroauto');
		}
		
	}
}
?>