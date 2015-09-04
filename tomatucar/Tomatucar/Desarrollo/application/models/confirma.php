<?php
class Confirma extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	function confirmarEmail($clave){
		$query = $this->db->query("SELECT idUsuarios, Nombre, Apellido, Email from usuarios where confirmado = 0");
		foreach ($query->result() as $row)
		{	
			$confirm  = hash('sha256', $row->Nombre.$row->Apellido.$row->Email); 
			if($clave == $confirm)
			{
				$this->confirmarUsuario($row->idUsuarios);
				return true;
			}
		}
		return false;
	}
	
	function confirmarUsuario($id)
	{
		$data = array(
               'confirmado' => 1
            );

		$this->db->where('idusuarios', $id);
		$this->db->update('usuarios', $data);
	}
	
	// David Vara 25/05/2015 - Verificar si la clave para cambiar contraseña es valida
	function confirmarCambioPass($clave)
	{
		//verificar hash de clave para obtener el mail de un usuario, y ver si este coincide con alguno registrado
		$query = $this->db->query("SELECT idUsuarios, Email from usuarios");
		foreach ($query->result() as $row)
		{	
			$confirm  = hash('sha256', $row->Email); 
			if($clave == $confirm)
			{
				//$this->confirmarUsuario($row->idUsuarios);
				return $row->Email;
			}
		}
		return "";
	}
}
?>