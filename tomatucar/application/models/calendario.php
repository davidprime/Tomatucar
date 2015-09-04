<?php
class Calendario extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	function insert_disponibilidad($datos){
		$sqldata = array(
			'idcoche' => $datos['idcoche'],
			'fechainicio'  => $datos['fechainicio'],
			'fechainicioampm' => $datos['fechainicioampm'],
			'fechafin'  => $datos['fechafin'],
			'fechafinampm'  => $datos['fechafinampm'],
			'estatus' => $datos['estatus']
		);

		$this->db->insert('disponibilidadcalendario', $sqldata); 
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	function select_calendar($idCoche)
	{
		// Sergio Castillo 5/05/15 En lugar de idStatus cambié por booleano "Salvado" y id del auto en select
		// David Vara 03/06/2015 Añadir consultas, contactos y rentas hechas al query
		$query = $this->db->query("SELECT * FROM disponibilidadcalendario WHERE idcoche = ".$idCoche);
		$coches = "";
		if($query->num_rows > 0)
		{
			$coches = $query->result_array(); 
			return $coches;
		}
		
		return $coches;
	}

	function selectAllDates()
	{
		$query = $this->db->query("SELECT * FROM disponibilidadcalendario");

		$idcalendario=[];
		$i=0;
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		      $idcalendario[$i][0] = $row->fechainicio;
		      $idcalendario[$i][1] = $row->fechainicioampm;
		      $idcalendario[$i][2] = $row->fechafin;
		      $idcalendario[$i][3] = $row->fechafinampm;
		      $i++;
		   }
		}
		else{
			$idcalendario = 0;
		}
		
		return $idcalendario;
	}

	function getDateRange($fi, $ff)
	{
		$query = $this->db->query("SELECT idcalendario FROM disponibilidadcalendario WHERE fechainicio = ".$fi." AND fechafin = ".$ff." ");

		$idcalendario = "";
		
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		      $idcalendario = $row->idcalendario;
		   }
		}
		else{
			$idcalendario = 0;
		}
		
		return $idcalendario;
	}

	/*function select_compareDate($fi, $ff)
	{
		$query = $this->db->query("SELECT (
			CASE 
			WHEN ".date($fi)." < fechainicio AND fechainicio > ".date($ff)." THEN 1
			WHEN ".date($fi)." > fechafin AND fechafin < ".date($ff)."  THEN 1
			WHEN ".date($fi)." < fechainicio AND ".date($ff)." < fechafin THEN idcalendario
			WHEN fechainicio < ".date($fi)." AND fechafin < ".date($ff)." THEN idcalendario
			WHEN fechainicio < ".date($fi)." AND ".date($ff)." < fechafin THEN 0
			WHEN ".date($fi)." < fechainicio AND fechafin < ".date($ff)." THEN idcalendario
			ELSE 0
			END) as idcalendario FROM disponibilidadcalendario");

		$idcalendario = "";
		
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		      $idcalendario = $row->idcalendario;
		      //$idcalendario = $query->num_rows();
		   }
		}
		else{
			$idcalendario = 0;
		}
		
		return $idcalendario;
	}*/

	function update_Dates($id, $datos)
	{
		$data = array(
			'fechainicio'  => $datos['fechainicio'],
			'fechainicioampm' => $datos['fechainicioampm'],
			'fechafin'  => $datos['fechafin'],
			'fechafinampm'  => $datos['fechafinampm'],
			'estatus' => $datos['estatus']
			);

		$this->db->where('idcalendario', $id);
		$this->db->update('disponibilidadcalendario', $data); 

		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}	

	function delete_id_calendar($id)
	{
		$this->db->delete('disponibilidadcalendario', array('idcalendario' => $id)); 
	}	

	function regCount()
	{
		$table_row_count = $this->db->count_all('disponibilidadcalendario');

		$count = false;
		
		if ($table_row_count == 0)
		{
		  $count = true;
		}
		else{
			$count = false;
		}
		
		return $count;
	}
}
?>