<?php
class Kilometrajerenta extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	function select_kilometrajerenta(){
		$query = $this->db->query("SELECT * FROM Kilometrajerenta");
		$Kilometrajerenta[''] = 'Seleccionar...';
		foreach ($query->result() as $row)
		{
			$Kilometrajerenta[$row->idKilometrajerenta] = $row->kilometraje;
		}
		
		return $Kilometrajerenta;
	}
}
?>