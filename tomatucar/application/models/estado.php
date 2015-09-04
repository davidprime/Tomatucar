<?php
class Estado extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	function select_estadoporpais($idpais='0'){
		
		$query = $this->db->query("SELECT idEstado,Nombre FROM estados where idPais=".$idpais);
		$estados[''] = 'Seleccionar...';
		foreach ($query->result() as $row)
		{
			$estados[$row->idEstado] = $row->Nombre;
		}
		
		return $estados;
	}
}
?>