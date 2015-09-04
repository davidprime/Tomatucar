<?php
class Caracteristicaauto extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	function select_plazas(){
		
		$query = $this->db->query("SELECT * FROM numeroplazas");
		$plaza[''] = 'Numero de plazas...';
		foreach ($query->result() as $row)
		{
			$plaza[$row->idNumeroPlaza] = $row->Numero;
		}
		
		return $plaza;
	}
	function select_energias(){
		
		$query = $this->db->query("SELECT * FROM tipoenergias");
		$combustible[''] = 'Tipo de Combustible...';
		foreach ($query->result() as $row)
		{
			$combustible[$row->idTipoEnergia] = $row->Nombre;
		}
		
		return $combustible;
	}
	function select_kilometros(){
		
		$query = $this->db->query("SELECT * FROM rangokilometros");
		$kilometros[''] = 'Kilometros...';
		foreach ($query->result() as $row)
		{
			$kilometros[$row->idRangoKilometro] = $row->Rango;
		}
		
		return $kilometros;
	}
	function select_consumos(){
		
		$query = $this->db->query("SELECT * FROM rangoconsumos");
		$consumos[''] = 'Consumo km/litro...';
		foreach ($query->result() as $row)
		{
			$consumos[$row->idRangoConsumo] = $row->Rango;
		}
		
		return $consumos;
	}
	function select_puertas(){
		
		$query = $this->db->query("SELECT * FROM numeropuertas");
		$consumos[''] = 'Numero de Puertas...';
		foreach ($query->result() as $row)
		{
			$consumos[$row->idNumeroPuerta] = $row->Numero;
		}
		
		return $consumos;
	}
	function select_transmisiones(){
		
		$query = $this->db->query("SELECT * FROM tipotransmisiones");
		$transmisiones[''] = 'Tipo Transmision...';
		foreach ($query->result() as $row)
		{
			$transmisiones[$row->idTipoTransmision] = $row->Nombre;
		}
		
		return $transmisiones;
	}
	function select_tipoengomados(){
		
		$query = $this->db->query("SELECT * FROM tipoengomados");
		$engomados[''] = 'Tipo de Engomado...';
		foreach ($query->result() as $row)
		{
			$engomados[$row->idTipoEngomado] = $row->Nombre;
		}
		
		return $engomados;
	}
	function select_colorengomados(){
		
		$query = $this->db->query("SELECT * FROM coloresengomados");
		$colorengomados[''] = 'Color de Engomado...';
		foreach ($query->result() as $row)
		{
			$colorengomados[$row->idColorEngomado] = $row->Color;
		}
		
		return $colorengomados;
	}
	function select_terminacionplacas(){
		
		$query = $this->db->query("SELECT * FROM terminacionplacas");
		$terminacionplacas[''] = 'Terminacion de Placa...';
		foreach ($query->result() as $row)
		{
			$terminacionplacas[$row->idTerminacionPlaca] = $row->Numero;
		}
		
		return $terminacionplacas;
	}
}
?>