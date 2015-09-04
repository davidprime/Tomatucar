<?php
class Mensaje extends CI_Model
{
	function __construct() {
		parent::__construct();
	}


		function insert_mensaje($datos){

		$sqldata = array(
			'idUsuarioRecibe' => $datos['idUsuarioRecibe'],
			'idUsuarioEnvia' => $datos['idUsuarioEnvia'],
			'idCoche'  => $datos['idCoche'],
			'idRenta' => $datos['idRenta'],
			'Mensaje' =>  $datos['Mensaje'],
		);

		$this->db->insert('mensajes', $sqldata); 
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}



	function select_MensajeEnRenta($idRenta)
	{
		//Solo requiero ver la info básica de quien envia el mensaje para mostrarlo, de los mensajes que correspondad a la renta
		$query = $this->db->query("SELECT remitente.idusuarios as idRemitente, remitente.Nombre,remitente.Apellido, remitente.FotoPerfil, m.Mensaje
									FROM mensajes m
									join usuarios remitente on m.idUsuarioEnvia = remitente.idusuarios 
									where m.idRenta = '".$idRenta."'");

		$mensajes = "";
		if($query->num_rows > 0)
		{
			$mensajes = $query->result_array(); 
			return $mensajes;
		}
		
		return $mensajes;
	}


}
?>