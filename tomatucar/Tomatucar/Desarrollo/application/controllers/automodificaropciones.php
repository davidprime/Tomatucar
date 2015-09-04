<?php

class Automodificaropciones extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Coche');
        $this->load->helper('url');
        $this->load->helper('form');
		$this->load->library('image_lib');
	}
	function index($id= "0"){
		if($this->session->userdata('nombre'))
		{
			$detallecoche = $this->Coche->select_opcionesauto($id);
			
			$data['Titulo'] = 'Modificar Opciones';
			$data['detallecoche'] = $detallecoche;
			$this->load->view('templates/header', $data);
			$this->load->view('automodificaropciones',$data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('/login');			
		}
	}
	function subirInformacion(){
		if($this->session->userdata('nombre'))
		{
		date_default_timezone_set('America/Mexico_City');
		$fecha = date('Y-m-d H:i:s');
		
		$data = array(
			'idusuario' =>$this->session->userdata('identificador'),
			'idcoche' =>$this->input->post('cocheid'),
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
			'fechamodificado' =>$fecha,
			'idiomafrances'=>$this->input->post('frances') ? "1" : "0",
			'idiomaaleman'=>$this->input->post('aleman') ? "1" : "0",
			'idiomaingles'=>$this->input->post('ingles') ? "1" : "0",
			'idiomaespaniol'=>$this->input->post('espanol') ? "1" : "0",
			'descripcionpersonal'=>trim($this->input->post('descripcioncoche')),
			'condicionpersonal'=>trim($this->input->post('condicionpersonal'))
		);		
			if($this->Coche->updateopciones($data))
			{
				redirect('automodificaropciones/'.$this->input->post('cocheid'), 'refresh');
			}			
		}
		else {
			redirect('/login');			
		}		
	}
}
?>