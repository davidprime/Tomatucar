<?php
class Renta extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	function select_renta($id)
	{
		//Adicionar seleccion de kilometrajes via llave foranea
		$query = $this->db->query("SELECT rentas.*, k.kilometraje as KilometrosUsuario
		 FROM rentas
		 join kilometrajerenta k on k.idKilometrajerenta = rentas.idKilometrajeRenta 
		 where idRenta = '".$id."' LIMIT 1");
		$row = $query->row();
		if($query->num_rows() > 0)
		{
			return $row;
			
		}
		else
		{
		 return null;
		}
	}

	function insert_renta($datos){
		//a¿para fecha de creacion
	date_default_timezone_set('America/Mexico_City');

		//Dar de alta una renta
		$sqldata = array(
			'idUsuarioDuenio' => $datos['idUsuarioDuenio'],
			'idUsuarioRenta'  => $datos['idUsuarioRenta'],
			'idCoche' => $datos['idCoche'],
			'FechaInicio' =>  $datos['FechaInicio'],
			'FechaInicioAntesPm' =>  $datos['FechaInicioAntesPm'],
			'FechaFin' =>  $datos['FechaFin'],
			'FechaFinAntesPm' =>  $datos['FechaFinAntesPm'],
			'TotalDias' =>  $datos['TotalDias'],
			'idKilometrajeRenta' =>  $datos['KilometrajeRenta'],
			'PagoKilometro' => $datos['PagoKilometro'],
			'idStatusRenta' =>  1,
			'FechaAgregado' =>  date('Y-m-d H:i:s'),
			'TotalRenta' =>  $datos['TotalRenta'],
			'TotalPagar' =>  $datos['TotalPagar'],
			'TotalComision' =>  $datos['TotalComision']
		);


		$this->db->insert('rentas', $sqldata); 
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	

	function select_Rentas($idusuario)
	{
		//David Vara 05/07/2015 : Añadir Marca y modelo del auto al query

		$query = $this->db->query(" 
		SELECT c.Foto1 as FotoU, 
		 r.idrenta as IdRenta,
		 u.FotoPerfil as FotoA,
		 u.Nombre as NombreU,
		 r.idUsuarioDuenio as usuarioD,
         r.idUsuarioRenta as usuarioR,
		 u.Apellido as ApellidoU,
		 r.FechaInicio as FechaI,
		 r.FechaFin as FechaF,
		 sr.Descripcion as StatusRenta,
		 sr.idStatusRenta as IdStatus ,
		 c.DiaPromedio as Precio,
 		 c.idCoche as IDCoche,
 		 marca.Nombre as Marca,
 		 modelo.Nombre as Modelo,
 		 r.idRenta as idRenta
		FROM rentas r
		 join usuarios u on r.idUsuarioRenta = u.idusuarios
		 join coches c on r.idCoche = c.idCoche
		 join statusrentas sr on r.idStatusRenta = sr.idStatusRenta
		 join marcasautos marca on c.idMarca = marca.idMarcaAuto
		 join modelosautos modelo on c.idModelo = modelo.idModeloAuto
		WHERE r.idUsuarioDuenio = ".$this->session->userdata('identificador')." or r.idUsuarioRenta= ".$idusuario."
		;");
		//Hacer QUERY PARa los coches para el filtro coche
		$rentas = "";
		if($query->num_rows > 0)
		{
			$rentas = $query->result_array();
			return $rentas;
		}
		
		return $rentas;
	}
	function select_BusquedaRenta($IDCoche,$Fecha,$IDStatus,$idusuario,$radio)
	{
		$CocheText="";
		if($IDCoche!="0")
		{$CocheText=" and r.idCoche=".$IDCoche;}
		else{$CocheText="";}
		
		$StatusText="";
		if($IDStatus!='0')
		{$StatusText=" and r.idStatusRenta=".$IDStatus;}
		else{$StatusText="";}
		
		$FechaText="";
		if($Fecha)
		{
			$FechaM = DateTime::createFromFormat('Y-m-d', $Fecha)->format('Y-m-d');
			$FechaText=" and r.FechaInicio >'".$FechaM."'";
		}
		else{$FechaText="";}
		
		$radioText="";
		if($radio=="1")
		{$radioText=" WHERE r.idUsuarioDuenio = ".$idusuario;}
		if($radio=="2")
		{$radioText=" WHERE r.idUsuarioRenta = ".$idusuario;}
		if($radio=="3")
		{$radioText=" WHERE (r.idUsuarioRenta = ".$idusuario." or r.idUsuarioDuenio = ".$idusuario.")";}
		//preguntar si quieren rango
		$rentas = "";
			
		$query = $this->db->query(" 
		SELECT c.Foto1 as FotoU, 
		u.FotoPerfil as FotoA,
		 u.Nombre as NombreU,
		 r.idUsuarioDuenio as usuarioD,
         r.idUsuarioRenta as usuarioR,
		 u.Apellido as ApellidoU,
		 r.FechaInicio as FechaI,
		 r.FechaFin as FechaF,
		 sr.Descripcion as StatusRenta,
		 sr.idStatusRenta as IdStatus ,
		 c.DiaPromedio as Precio,
		 c.idCoche as IDCoche,
		  marca.Nombre as Marca,
 		 modelo.Nombre as Modelo,
		 r.idRenta as idRenta
		FROM rentas r
		 join usuarios u on r.idUsuarioRenta = u.idusuarios
		 join coches c on r.idCoche = c.idCoche
		 join statusrentas sr on r.idStatusRenta = sr.idStatusRenta
		 join marcasautos marca on c.idMarca = marca.idMarcaAuto
		 join modelosautos modelo on c.idModelo = modelo.idModeloAuto
		".$radioText." 
		".$CocheText."
		".$StatusText."
        ".$FechaText."	
		;");

		if($query->num_rows > 0)
		{
			$rentas = $query->result_array();
			return $rentas;
		}
		
		return $rentas;
		
	}

function AceptarRenta($idRenta,$apellido,$nombre)
{
	$this->db->query(" 
		Update rentas 
		set ApellidosOficial='".$apellido."',
		NombreOficial='".$nombre."'
		where idRenta=".$idRenta.";
		;");
}	

function ChangeState($state,$idRenta)
{
		
	 $this->db->query(" 
		Update rentas 
		set idStatusRenta=".$state." 
		where idRenta=".$idRenta."
		;");
		
}

}
?>