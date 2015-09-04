<?php
class Coche extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	function select_auto()
	{
		// Sergio Castillo 5/05/15 En lugar de idStatus cambié por booleano "Salvado" y id del auto en select
		$query = $this->db->query("SELECT marca.Nombre as Marca, modelo.Nombre as Modelo,  annio.Annio as Annio, 
										c.DireccionCoche as Direccion, c.DiaPromedio as Precio, c.Salvado as Status , 
										c.idCoche as IdCoche,
										  c.Foto1 as Foto1,
										  c.Foto2 as Foto2,
										  c.Foto3 as Foto3
									FROM coches as c 
										join marcasautos marca on c.idMarca = marca.idMarcaAuto
										join modelosautos modelo on c.idModelo = modelo.idModeloAuto
										join annios annio on c.idAnnios = annio.idAnnio
									WHERE idUsuario = ".$this->session->userdata('identificador'));
		$coches = "";
		if($query->num_rows > 0)
		{
			$coches = $query->result_array(); 
			return $coches;
		}
		
		return $coches;
	}
	function select_detalleauto($idauto)
	{
		// Sergio Castillo 5/05/15 En lugar de idStatus cambié por booleano "Salvado" y id del auto en select
		$query = $this->db->query("SELECT marca.Nombre as Marca, modelo.Nombre as Modelo,  annio.Annio as Annio, 
										  c.DireccionCoche as Direccion, c.DiaPromedio as Precio, c.Salvado as Status , c.MatriculaCoche as Matricula,
										  c.idCoche as IdCoche , c.idTipoCoche as Tipo,
										  c.Foto1 as Foto1,
										  c.Foto2 as Foto2,
										  c.Foto3 as Foto3
									FROM coches as c 
										join marcasautos marca on c.idMarca = marca.idMarcaAuto
										join modelosautos modelo on c.idModelo = modelo.idModeloAuto
										join annios annio on c.idAnnios = annio.idAnnio
									WHERE idUsuario = ".$this->session->userdata('identificador')." and idCoche= ".$idauto);
		$coches = "";
		if($query->num_rows > 0)
		{
			$coches = $query->result_array();
			return $coches;
		}
		
		return $coches;
	}
	//ALEX-Agreue esta funcion de busqueda porque necesitaba muhca mas informacion para los coches del borrador y no sabia si afectaria si el query original tuviera que regresar toda la informacion
	function select_detalleautoBorrador($idauto)
	{
		//----FALTA MASCOTAS Y FUMAR EN LA BD NO LOS ENCUENTRO
		$query = $this->db->query("SELECT idMarca as Marca, idModelo as Modelo,  idAnnio as Annio, 
										  c.DireccionCoche as Direccion, c.DiaPromedio as Precio, c.Salvado as Status , c.MatriculaCoche as Matricula,
										  c.idCoche as IdCoche , c.idTipoCoche as Tipo,
                                          c.idAnnios as Anio,
                                          c.idNumeroPlaza as NumPlaza,
                                          c.idTipoEnergia as Energia,
                                          c.idRangoKilometraje as RangoKilometraje,
                                          c.idNumeroPuerta as NumPuertas,
                                          c.idTipoTransmision as Transmision,
                                          c.idColorEngomado as Color,
                                          c.idHolograma as Holograma,
                                          c.AireAcondicionado as AireAc,
                                          c.DireccionAsistida as DireccionA,
                                          c.ReguladorVelocidad as ReguladorV,
                                          c.GPS as GPS,
                                          c.SillaBebe as SillaB,
                                          c.LectorCdMp3 as LectorCD,
                                          c.EntradaAuxiliar as EntradaA,
                                          c.USB as USB,
                                          c.Bluetooth as BlueT,
                                          c.BolsaAire as BolsaA,
                                          c.EngancheRemolque as EngancheR,
                                          c.Alarma as Alarma,
                                          c.idiomaAleman as Aleman,
                                          c.idiomaEspaniol as Espaniol,
                                          c.idiomaFrances as Frances,
                                          c.idiomaIngles as Ingles,
                                          c.DescripcionPersonal as Descripcion,
                                          c.CondicionPersonal as CondicionP,
                                          c.DireccionCoche as DireccionC,
                                          c.CostoPrimerDiaRenta as CostoPD,
                                          c.CostoSegundoDiaRenta as CostoSD,
                                          c.PrecioKilometro as PrecioK,
										  c.Foto1 as Foto1,
										  c.Foto2 as Foto2,
										  c.Foto3 as Foto3
									FROM coches as c 
										join marcasautos marca on c.idMarca = marca.idMarcaAuto
										join modelosautos modelo on c.idModelo = modelo.idModeloAuto
										join annios annio on c.idAnnios = annio.idAnnio
									WHERE idUsuario = ".$this->session->userdata('identificador')." and idCoche= ".$idauto);
		$coches = "";
		if($query->num_rows > 0)
		{
			$coches = $query->result_array();
			return $coches;
		}
		
		return $coches;
	}
	//-----------------------------------------------------
	
	function select_opcionesauto($idauto)
	{
		// Sergio Castillo 5/05/15 En lugar de idStatus cambié por booleano "Salvado" y id del auto en select
		$query = $this->db->query("SELECT idCoche as IdCoche, CondicionPersonal, AireAcondicionado, DireccionAsistida, ReguladorVelocidad, GPS,
										SillaBebe, LectorCdMp3, EntradaAuxiliar, USB, Bluetooth, BolsaAire, EngancheRemolque, 
										Alarma, idiomaFrances, idiomaAleman, idiomaIngles, idiomaEspaniol, DescripcionPersonal
									FROM coches 
									WHERE idUsuario = ".$this->session->userdata('identificador')." and idCoche= ".$idauto);
		$coches = "";
		if($query->num_rows > 0)
		{
			$coches = $query->result_array();
			return $coches;
		}
		
		return $coches;
	}
	function select_precioauto($idauto)
	{
		// Sergio Castillo 5/05/15 En lugar de idStatus cambié por booleano "Salvado" y id del auto en select
		$query = $this->db->query("SELECT idCoche as IdCoche, CostoPrimerDiaRenta, 
										CostoSegundoDiaRenta, PrecioKilometro, DiaPromedio
									FROM coches 
									WHERE idUsuario = ".$this->session->userdata('identificador')." and idCoche= ".$idauto);
		$coches = "";
		if($query->num_rows > 0)
		{
			$coches = $query->result_array();
			return $coches;
		}
		
		return $coches;
	}
	function insert_auto($datos){

		$sqldata = array(
			'idUsuario' => $datos['idusuario'],
			'idMarca' => $datos['idmarca'],
			'idModelo'  => $datos['idmodelo'],
			'idTipoCoche' => $datos['idtipocoche'],
			'idAnnios' =>  $datos['idannios'],
			'idNumeroPlaza' =>  $datos['idnumeroplaza'],
			'idTipoEnergia' =>  $datos['idtipoenergia'],
			'idRangoKilometraje' =>  $datos['idrangokilometraje'],
			'idNumeroPuerta' =>  $datos['idnumeropuerta'],
			'idTipoTransmision' =>  $datos['idtipotransmision'],
			'idColorEngomado' => $datos['idcolorengomado'],
			'idHolograma' =>  $datos['idholograma'],
			'AireAcondicionado' =>  $datos['aireacondicionado'],
			'DireccionAsistida' =>  $datos['direccionasistida'],
			'ReguladorVelocidad' =>  $datos['reguladorvelocidad'],
			'GPS' =>  $datos['gps'],
			'SillaBebe' =>  $datos['sillabebe'],
			'LectorCdMp3' =>  $datos['lectorcdmp3'],
			'EntradaAuxiliar' =>  $datos['entradaauxiliar'],
			'USB' =>  $datos['usb'],
			'Bluetooth' =>  $datos['bluetooth'],
			'Alarma' =>  $datos['alarma'],
			'EngancheRemolque' =>  $datos['engancheremolque'],
			'BolsaAire' => $datos['bolsaaire'],
			'USB' => $datos['usb'],
			'idStatus' =>  $datos['idstatus'],
			'FechaAgregado' =>  $datos['fechaagregado'],
			'idiomaFrances' =>  $datos['idiomafrances'],
			'idiomaAleman' => $datos['idiomaaleman'],
			'idiomaIngles' => $datos['idiomaingles'],
			'idiomaEspaniol' => $datos['idiomaespaniol'],
			'DescripcionPersonal' => $datos['descripcionpersonal'],
			'DireccionCoche' => $datos['direccioncoche'],
			'CostoPrimerDiaRenta' => $datos['costoprimerdiarenta'],
			'CostoSegundoDiaRenta' => $datos['costosegundodiarenta'],
			'PrecioKilometro' => $datos['preciokilometro'],
			'DiaPromedio' => $datos['diapromedio'],
			'MatriculaCoche' => $datos['matriculacoche'],
			'Salvado'=> $datos['salvado']
		);

		$this->db->insert('coches', $sqldata); 
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	function uploadimage($datos){
		$foto = "Foto".$datos['num'];
		$data = array(
				$foto => $datos['Foto']
            );			
			
		$this->db->where('idCoche', $datos['id']);
		$this->db->update('coches', $data); 
		if($this->db->affected_rows() == '1')
		{
			return true;
		}
		else {
			return false;
		}
	}
	function updateopciones($datos)
	{
		
		$data = array(
			'AireAcondicionado' => $datos['aireacondicionado'],
			'DireccionAsistida'=> $datos['direccionasistida'],
			'ReguladorVelocidad'=> $datos['reguladorvelocidad'],
			'GPS'=> $datos['gps'],
			'SillaBebe'=> $datos['sillabebe'],
			'LectorCdMp3'=> $datos['lectorcdmp3'],
			'EntradaAuxiliar'=> $datos['entradaauxiliar'],
			'USB'=> $datos['usb'],
			'Bluetooth'=> $datos['bluetooth'],
			'Alarma'=> $datos['alarma'],
			'EngancheRemolque'=> $datos['engancheremolque'],
			'BolsaAire'=> $datos['bolsaaire'],
			'USB'=> $datos['usb'],
			'FechaModificado'=> $datos['fechamodificado'], 
			'idiomaFrances'=> $datos['idiomafrances'],
			'idiomaAleman'=> $datos['idiomaaleman'],
			'idiomaIngles'=> $datos['idiomaingles'],
			'idiomaEspaniol'=> $datos['idiomaespaniol'],
			'DescripcionPersonal'=> $datos['descripcionpersonal'],
			'CondicionPersonal'=> $datos['condicionpersonal']
		);	
		$this->db->where('idCoche', $datos['idcoche']);
		$this->db->update('coches', $data); 
		if($this->db->affected_rows() == '1')
		{
			return true;
		}
		else {
			return false;
		}	
	}
	function updateprecio($datos)
	{
		$data = array(
			'CostoPrimerDiaRenta' => $datos['costoprimerdiarenta'],
			'CostoSegundoDiaRenta'=> $datos['costosegundodiarenta'],
			'PrecioKilometro'=> $datos['preciokilometro'],
			'DiaPromedio'=> $datos['diapromedio'],
			'FechaModificado'=> $datos['fecha']
		);	
		$this->db->where('idCoche', $datos['idcoche']);
		$this->db->update('coches', $data); 
		if($this->db->affected_rows() == '1')
		{
			return true;
		}
		else {
			return false;
		}	
	}
}
?>