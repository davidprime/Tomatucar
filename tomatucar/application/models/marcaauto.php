<?php
class Marcaauto extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	function select_marcasautos(){
		
		$query = $this->db->query("SELECT * FROM marcasautos");
		$marcaauto[''] = 'Seleccionar...';
		foreach ($query->result() as $row)
		{
			$marcaauto[$row->idMarcaAuto] = $row->Nombre;
		}
		
		return $marcaauto;
	}
}
?>