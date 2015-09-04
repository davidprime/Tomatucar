<?php

class Autocalendario extends CI_Controller{ 
	function __construct() {
		parent::__construct();
		$this->load->model('Coche');
		$this->load->model('Calendario');
        $this->load->helper('url');
        $this->load->helper('form');
	}
	function index($id= "0"){
		if($this->session->userdata('nombre'))
		{
			$detallecoche = $this->Coche->select_detalleauto($id);
			$paintCalendar = $this->Calendario->select_calendar($id);

			$data['Titulo'] = 'Calendario Auto';
			$data['detallecoche'] = $detallecoche;
			$data['paintCalendar'] = $paintCalendar;
			$data['id_coche'] = $id;
			$this->load->view('templates/header', $data);
			$this->load->view('autocalendario',$data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('/login');			
		}
	}

	function insert_disponibilidad()
	{
		$data['ok'] = true;
		$data['idcoche'] = $_GET['idC'];
		$data['fechainicio']= $_GET['fini'];
		$data['fechainicioampm'] = $_GET['finil'];
		$data['fechafin'] = $_GET['ffin'];
		$data['fechafinampm'] = $_GET['ffinl'];
		$data['estatus'] = $_GET['estado'];

		$this->Calendario->insert_disponibilidad($data);

		echo json_encode($data); 		
	}

	function delete_idcalendar()
	{
		$this->Calendario->delete_id_calendar($_GET['idcalendar']);
		$data['ok']=true;
		echo json_encode($data);
	}

	function update_DatesCalendario()
	{
		$data['fechainicio']= $_GET['fini'];
		$data['fechainicioampm'] = $_GET['finil'];
		$data['fechafin'] = $_GET['ffin'];
		$data['fechafinampm'] = $_GET['ffinl'];
		$data['estatus'] = $_GET['estado'];
		
		$this->Calendario->update_Dates($_GET['idcalendar'], $data);
		$data['ok'] = true;
		echo json_encode($data);
	}

	function getAllDates()
	{
		$fecha=$this->Calendario->selectAllDates();
		$data['fecha'] = $fecha;
		$reg=$this->Calendario->regCount();
		$data['count'] = $reg;
		echo json_encode($data);
	}

	function compareDate()
	{
		$idc = $this->Calendario->getDateRange("'".$_GET['fechaini']."'", "'".$_GET['fechafinal']."'");
		$data['id_calendario'] = $idc;
		echo json_encode($data);
	}



}
?>