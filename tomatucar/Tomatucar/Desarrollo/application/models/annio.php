<?php
class Annio extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	function select_annios(){
		
		$query = $this->db->query("SELECT * FROM annios");
		$annio[''] = 'Seleccionar...';
		foreach ($query->result() as $row)
		{
			$annio[$row->idAnnio] = $row->Annio;
		}
		
		return $annio;
	}
}
?>