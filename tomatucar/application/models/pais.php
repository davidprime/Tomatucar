<?php
class Pais extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	function select_pais(){
		$query = $this->db->query("SELECT * FROM paises");
		$paises[''] = 'Seleccionar...';
		foreach ($query->result() as $row)
		{
			$paises[$row->idPais] = $row->Nombre;
		}
		
		return $paises;
	}
}
?>