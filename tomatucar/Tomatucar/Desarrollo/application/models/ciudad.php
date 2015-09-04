<?php
class Ciudad extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	function select_ciudadporestado($idestado='0'){
		
		$query = $this->db->query("SELECT idCiudad,Nombre FROM ciudades where idEstado=".$idestado);
		$ciudad[''] = 'Seleccionar...';
		foreach ($query->result() as $row)
		{
			$ciudad[$row->idCiudad] = $row->Nombre;
		}
		
		return $ciudad;
	}
}
?>