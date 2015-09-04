<?php
class Modeloauto extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	function select_modelosautos($idMarcaAuto='0'){
		
		$query = $this->db->query("SELECT * FROM modelosautos where idMarcaAuto=".$idMarcaAuto);
		$modeloauto[''] = 'Seleccionar...';
		foreach ($query->result() as $row)
		{
			$modeloauto[$row->idModeloAuto] = $row->Nombre;
		}
		
		return $modeloauto;
	}
}
?>