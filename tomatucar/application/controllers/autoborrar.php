<?php

class Autoborrar extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Coche');
        $this->load->helper('url');
        $this->load->helper('form');
	}
	function index($id= "0"){
		if($this->session->userdata('nombre'))
		{
			$detallecoche = $this->Coche->select_detalleauto($id);
			
			$data['Titulo'] = 'Borrar/Desactivar Auto';
			$data['detallecoche'] = $detallecoche;
			$this->load->view('templates/header', $data);
			$this->load->view('autoborrar',$data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('/login');			
		}
	}
	function activarDesactivar()
	{
		$data = array(
			'idcoche' => $this->input->post('idcoche'),
			'activado' => $this->input->post('activado'),			
		);
		if($this->Coche->activarDesactivar($data))
		{
			echo TRUE;
			exit;
		}
		else {
			echo FALSE;
			exit;
		}
	}
	function eliminar()
	{
		$data = array(
			'idcoche' => $this->input->post('idcoche'),
			'idrazonborrado' => $this->input->post('razon'),			
		);
		if($this->Coche->eliminar_coche($data))
		{
			echo TRUE;
			exit;
		}
		else {
			echo FALSE;
			exit;
		}
	}
}
?>