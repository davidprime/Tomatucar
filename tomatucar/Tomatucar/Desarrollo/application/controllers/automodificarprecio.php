<?php

class Automodificarprecio extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Coche');
        $this->load->helper('url');
        $this->load->helper('form');
	}
	function index($id= "0"){
		if($this->session->userdata('nombre'))
		{
			$detallecoche = $this->Coche->select_precioauto($id);
			
			$data['Titulo'] = 'Modificar Precio';
			$data['detallecoche'] = $detallecoche;
			$this->load->view('templates/header', $data);
			$this->load->view('automodificarprecio',$data);
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
				'idcoche' =>$this->input->post('cocheid'),
				'costoprimerdiarenta'=>$this->input->post('renta1'),
				'costosegundodiarenta'=>$this->input->post('renta2'),
				'preciokilometro'=>$this->input->post('rentakm'),
				'diapromedio'=>$this->input->post('totaldiaprom'),
				'fecha'=>$fecha
			);		
				if($this->Coche->updateprecio($data))
				{
					redirect('automodificarprecio/'.$this->input->post('cocheid'), 'refresh');
				}			
		}
		else {
			redirect('/login');			
		}		
	}
}
?>