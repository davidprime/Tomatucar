<?php
class Coche extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	function select_auto()
	{
		// Sergio Castillo 5/05/15 En lugar de idStatus cambié por booleano "Salvado" y id del auto en select
		// David Vara 03/06/2015 Añadir consultas, contactos y rentas hechas al query
		$query = $this->db->query("SELECT marca.Nombre as Marca, modelo.Nombre as Modelo,  annio.Annio as Annio, 
										c.DireccionCoche as Direccion, c.DiaPromedio as Precio, c.Salvado as Status , 
										c.Consultas, c.Contactos, c.RentasHechas,
										c.idCoche as IdCoche, c.Activado as Activado, 
										  c.Foto1 as Foto1,
										  c.Foto2 as Foto2,
										  c.Foto3 as Foto3
									FROM coches as c 
										join marcasautos marca on c.idMarca = marca.idMarcaAuto
										join modelosautos modelo on c.idModelo = modelo.idModeloAuto
										join annios annio on c.idAnnios = annio.idAnnio
									WHERE idUsuario = ".$this->session->userdata('identificador')." and Borrado=0");
		$coches = "";
		if($query->num_rows > 0)
		{
			$coches = $query->result_array(); 
			return $coches;
		}
		
		return $coches;
	}
	function select_autobuscador()
	{
		// Sergio Castillo 5/05/15 En lugar de idStatus cambié por booleano "Salvado" y id del auto en select
		// David Vara 03/06/2015 Añadir consultas, contactos y rentas hechas al query
		$query = $this->db->query("SELECT marca.Nombre as Marca, modelo.Nombre as Modelo,  annio.Annio as Annio, 
										c.DireccionCoche as Direccion, c.DiaPromedio as Precio, c.Salvado as Status , 
										c.Consultas, c.Contactos, c.RentasHechas,
										c.idCoche as IdCoche, c.Activado as Activado, 
										  c.Foto1 as Foto1,
										  c.Foto2 as Foto2,
										  c.Foto3 as Foto3,
										  c.Lat, c.Lng, c.DescripcionPersonal as Descripcion
									FROM coches as c 
										join marcasautos marca on c.idMarca = marca.idMarcaAuto
										join modelosautos modelo on c.idModelo = modelo.idModeloAuto
										join annios annio on c.idAnnios = annio.idAnnio
									WHERE Borrado=0 and c.Activado = 1 and c.Salvado = 0");
		$coches = "";
		if($query->num_rows > 0)
		{
			$coches = $query->result_array(); 
			return $coches;
		}
		
		return $coches;
	}
	// Sergio 1/Junio/2015.- Funcion que trae los 12 últimos autos agregados
	//deben estar activos y contener una foto por lo menos
	function select_slideauto()
	{
		$query = $this->db->query("SELECT c.idCoche as idCoche, marca.Nombre as Marca, modelo.Nombre as Modelo, 
										c.DireccionCoche as Direccion, c.DiaPromedio as Precio, 
										c.idCoche as IdCoche, c.Foto1 as Foto1, 
										usuario.FotoPerfil as Perfil, usuario.Nombre as Nombre,
										usuario.Apellido as Apellido
									FROM coches as c
										join marcasautos marca on c.idMarca = marca.idMarcaAuto
										join modelosautos modelo on c.idModelo = modelo.idModeloAuto
										join usuarios usuario on c.idusuario = usuario.idusuarios
									WHERE  
										Borrado=0 AND Salvado = 0 AND Activado = 1 AND Foto1 > ''
									ORDER BY
										c.FechaAgregado DESC LIMIT 12");
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
										  c.DireccionCoche as Direccion, c.DiaPromedio as Precio, c.Salvado as Status , 
										  c.idCoche as IdCoche, c.Activado as Activado, 
										  c.Foto1 as Foto1,
										  c.Foto2 as Foto2,
										  c.Foto3 as Foto3
									FROM coches as c 
										join marcasautos marca on c.idMarca = marca.idMarcaAuto
										join modelosautos modelo on c.idModelo = modelo.idModeloAuto
										join annios annio on c.idAnnios = annio.idAnnio
									WHERE idUsuario = ".$this->session->userdata('identificador')." and Borrado=0 and idCoche= ".$idauto);
		$coches = "";
		if($query->num_rows > 0)
		{
			$coches = $query->result_array();
			return $coches;
		}
		
		return $coches;
	}
	function select_autoPorCiudad()
	{
		$query = $this->db->query("SELECT Estado, count(*) as Autos FROM coches Where estado > '' Group by Estado");
		$coches = "";
		if($query->num_rows > 0)
		{
			$coches = $query->result_array();
			return $coches;
		}
		
		return $coches;			
	}
	//ALEX-Este select utiliza un query dinamico para determinar que autos busca el usuario
	function select_Buscadorauto($Precio,$KM,$Tipo,$Extras,$lat,$lng)
	{
		$KMText="";
		if($KM!="")
		{$KMText=" and idRangoKilometraje=".$KM;}
		else{$KMText="";}
		
		$ExtrasText="";
		if($Extras!="")
		{
			foreach ($Extras as $extra)
			{
				if($extra=="clima"){$ExtrasText=$ExtrasText." and AireAcondicionado=1";}
				if($extra=="direccionasistida"){$ExtrasText=$ExtrasText." and DireccionAsistida=1";}
				if($extra=="velocidad"){$ExtrasText=$ExtrasText." and ReguladorVelocidad=1";}
				if($extra=="gps"){$ExtrasText=$ExtrasText." and GPS=1";}
				if($extra=="silla"){$ExtrasText=$ExtrasText." and SillaBebe=1";}
				if($extra=="cdmp3"){$ExtrasText=$ExtrasText." and LectorCdMp3=1";}
				if($extra=="auxiliar"){$ExtrasText=$ExtrasText." and EntradaAuxiliar=1";}
				if($extra=="usb"){$ExtrasText=$ExtrasText." and USB=1";}
				if($extra=="bluetooth"){$ExtrasText=$ExtrasText." and Bluetooth=1";}
				if($extra=="alarma"){$ExtrasText=$ExtrasText." and Alarma=1";}
				if($extra=="remolque"){$ExtrasText=$ExtrasText." and EngancheRemolque=1";}
				if($extra=="bolsas"){$ExtrasText=$ExtrasText." and BolsaAire=1";}
				if($extra=="fumar"){$ExtrasText=$ExtrasText." and Fumar=1";}
				if($extra=="mascota"){$ExtrasText=$ExtrasText." and Mascota=1";}
			}
			
		}
		else{$ExtrasText="";}
		$count=1;
		$TipoText="";
		if($Tipo!="")
		{
			$count=1;
			foreach ($Tipo as $tipoauto)
			{
				if($count==1)
				{
					$count++;
					$TipoText=$TipoText." and(idTipoCoche=".$tipoauto;
				}
				else {$TipoText=$TipoText." or idTipoCoche=".$tipoauto;}
				
			}
			$TipoText=$TipoText.")";
		}
		else{$TipoText="";}
		
			//FALTA INTEGRAR LAG Y LNT PARA LO DEL MAPA
		$query = $this->db->query(" SELECT marca.Nombre as Marca, modelo.Nombre as Modelo,  annio.Annio as Annio, 
										  c.DireccionCoche as Direccion, c.DiaPromedio as Precio, c.Salvado as Status , 
										  c.idCoche as IdCoche, c.Activado as Activado, c.DescripcionPersonal as Descripcion,
										  c.Foto1 as Foto1,
										  c.Foto2 as Foto2,
										  c.Foto3 as Foto3,
                                          ta.Nombre as Tipo,
                                          c.Lat, c.Lng,
                                           ( 3959 * acos( cos( radians(".$lat.") ) * cos( radians( Lat ) ) * cos( radians( Lng ) - radians(".$lng.") ) + sin( radians(".$lat.") ) * sin( radians( Lat ) ) ) ) AS distance 
									FROM coches as c 
										join marcasautos marca on c.idMarca = marca.idMarcaAuto
										join modelosautos modelo on c.idModelo = modelo.idModeloAuto
										join annios annio on c.idAnnios = annio.idAnnio
                                        join tipoautos ta on c.idTipoCoche = ta.idTipoAuto
									WHERE Borrado=0 and Salvado=0 and Activado=1 and DiaPromedio <= ".$Precio."  
									".$TipoText."
									".$KMText."
                                    ".$ExtrasText."
                                     HAVING 
										distance < 5 ORDER BY distance
                                    ;");							
		$coches = "";
		if($query->num_rows > 0)
		{
			$coches = $query->result_array();
			return $coches;
		}
		
		return $coches;
	}
	//-----------------------
	//ALEX-Agreue esta funcion de busqueda porque necesitaba muhca mas informacion para los coches del borrador y no sabia si afectaria si el query original tuviera que regresar toda la informacion
	function select_detalleautoBorrador($idauto)
	{
		//----FALTA MASCOTAS Y FUMAR EN LA BD NO LOS ENCUENTRO
		//Sergio 1/Junio/2015.- Eliminé dentro del select el c.DireccionCoche as Direccion ya que 
		//se repite abajo como DireccionC
		$query = $this->db->query("SELECT idMarca as Marca, idModelo as Modelo,  idAnnio as Annio, 
										  c.DiaPromedio as Precio, c.Salvado as Status , c.MatriculaCoche as Matricula,
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
                                          c.Mascota as Mascota,
                                          c.Fumar as Fumar,
                                          c.idiomaAleman as Aleman,
                                          c.idiomaEspaniol as Espaniol,
                                          c.idiomaFrances as Frances,
                                          c.idiomaIngles as Ingles,
                                          c.DescripcionPersonal as Descripcion,
                                          c.CondicionPersonal as CondicionP,
                                          c.DireccionCoche as DireccionC,
                                          c.Lat as Lat,
                                          c.Lng as Lng,
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
									WHERE idUsuario = ".$this->session->userdata('identificador')." and Borrado=0 and idCoche= ".$idauto);
		
		//Sergio 1/Junio/2015.- Elimino la declaracion de $coches ="" ya que no tiene caso declarar variable vacia
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
										SillaBebe, LectorCdMp3, EntradaAuxiliar, USB, Bluetooth, BolsaAire, EngancheRemolque, Mascota, Fumar, 
										Alarma, idiomaFrances, idiomaAleman, idiomaIngles, idiomaEspaniol, DescripcionPersonal
									FROM coches 
									WHERE idUsuario = ".$this->session->userdata('identificador')." and Borrado=0 and idCoche= ".$idauto);
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
									WHERE idUsuario = ".$this->session->userdata('identificador')." and Borrado=0 and idCoche= ".$idauto);
		$coches = "";
		if($query->num_rows > 0)
		{
			$coches = $query->result_array();
			return $coches;
		}
		
		return $coches;
	}
	function insert_auto($datos){
		
		//Sergio 1/Junio/2015.- agregué la línea --'Estado' => $datos['estado'],
		//Para tener dentro del mapa inicial todos los autos por línea
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
			'Fumar' => $datos['fumar'],
			'Mascota' => $datos['mascota'],
			'idStatus' =>  $datos['idstatus'],
			'FechaAgregado' =>  $datos['fechaagregado'],
			'idiomaFrances' =>  $datos['idiomafrances'],
			'idiomaAleman' => $datos['idiomaaleman'],
			'idiomaIngles' => $datos['idiomaingles'],
			'idiomaEspaniol' => $datos['idiomaespaniol'],
			'DescripcionPersonal' => $datos['descripcionpersonal'],
			'DireccionCoche' => $datos['direccioncoche'],
			'Estado' => $datos['estado'],
			'Lat' => $datos['lat'],
			'Lng' => $datos['lng'],
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
			'Mascota'=> $datos['mascota'],
			'Fumar'=> $datos['fumar'],
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
	//Esta funcion delete_auto funciona solo dentro de la página llamada "filtroauto"
	//para el botón de eliminar auto dentro de los coches que se encuentran como borradores
	//esta funcion si elimina el registro del auto que se encontraba como borrador ya que 
	//no nos interesa saber mas de él ya que nunca fue usado
	function delete_auto($idauto)
	{
		$this->db->where('idCoche', $idauto);
		$this->db->delete('coches'); 
		if($this->db->affected_rows() == '1')
		{
			return true;
		}
		else {
			return false;
		}		
	}
	//fin funcion delete_auto
	
	//La funcion eliminar auto funciona para borrar de manera lógica 
	//el registro del auto quedará vigente pero ya no aparecerá ni en la búsqueda
	//ni en la lista de coches del dueño esta función se utiliza en la pagina llamada "autoborrar"
	function eliminar_coche($datos)
	{
		$data = array(
				'idRazonBorrado' => $datos['idrazonborrado'],
				'Borrado' => 1
        );
		$this->db->where('idCoche', $datos['idcoche']);
		$this->db->update('coches',$data); 
		if($this->db->_error_message())
		{
			return FALSE;
		}
		else {
			return TRUE;
		}		
	}
	//fin funcion eliminar_auto
	
	
	function activarDesactivar($datos)
	{
		if($datos['activado'] == '1')
		{
			$data = array(
				'Activado' => 0
            );
		}
		if($datos['activado'] == '0')
		{
			$data = array(
				'Activado' => 1
            );
		}
		
		$this->db->where('idCoche', $datos['idcoche']);
		$this->db->update('coches', $data); 
		if($this->db->_error_message())
		{
			return FALSE;
		}
		else {
			return TRUE;
		}		
	}
	function select_autoanuncio($idauto)
	{
		//coloresengomados.color as colorEngomado,
		////join coloresengomados on c.idColorEngomado = coloresengomados.idColorEngomado
		
		//join tipoengomados engomados on c.idColorEngomado = engomados.idTipoEngomado
		$query = $this->db->query("SELECT marca.Nombre as Marca, modelo.Nombre as Modelo, annio.Annio as Annio,
										  c.RentasHechas,c.consultas,
										  rangokm.rango as RangoKilometraje,numPlazas.Numero as plazas, numPuertas.Numero as puertas, transmisiones.nombre as transmision,
										  energias.Nombre as energia, coloresengomados.color as colorEngomado,tipoengomados.Nombre as tipoEngomado,
										  terminacionplacas.Numero as terminacionPlacas, rangoConsumos.Rango as rangoConsumo,
										  c.DireccionCoche as Direccion, c.DiaPromedio as Precio, c.Salvado as Status,
										  c.CostoPrimerDiaRenta,c.CostoSegundoDiaRenta,c.PrecioKilometro,
										  c.idCoche as IdCoche, c.Activado as Activado, c.idUsuario, 
										  c.idiomaEspaniol,c.idiomaIngles,c.idiomaAleman,c.idiomaFrances,
										  c.DescripcionPersonal,c.CondicionPersonal,
										  c.Foto1 as Foto1,
										  c.Foto2 as Foto2,
										  c.Foto3 as Foto3,
										  c.Lat,c.Lng,
										  c.AireAcondicionado,c.DireccionAsistida,c.ReguladorVelocidad,c.GPS,c.SillaBebe,c.LectorCdMp3,c.USB,c.Bluetooth,c.BolsaAire,c.EngancheRemolque,c.Alarma
									FROM coches as c 
										join marcasautos marca on c.idMarca = marca.idMarcaAuto
										join modelosautos modelo on c.idModelo = modelo.idModeloAuto
										join annios annio on c.idAnnios = annio.idAnnio
										left join rangoKilometros rangokm on c.idRangoKilometraje = rangokm.idRangoKilometro
										left join numeroPlazas numPlazas on c.idNumeroPlaza = numPlazas.idNumeroPlaza
										left join numeropuertas numPuertas on c.idNumeroPuerta = numPuertas.idNumeroPuerta
										left join tipotransmisiones transmisiones on c.idTipoTransmision = transmisiones.idTipoTransmision
										left join tipoenergias energias on c.idTipoEnergia = energias.idTipoEnergia
										left join coloresengomados on c.idColorEngomado = coloresengomados.idColorEngomado
										left join tipoengomados on c.idHolograma = tipoengomados.idTipoEngomado		
										left join terminacionplacas on c.idTerminacionPlacas = terminacionplacas.idTerminacionPlaca
										left join rangoConsumos on  c.idRangoConsumo = rangoConsumos.idRangoConsumo													
									WHERE idCoche= '".$idauto."' and c.Activado = 1 LIMIT 1");
		if($query->num_rows > 0)
		{
			return $query->row();
		}
		else {
			return false;
		}

	}
	
	function addconsulta($idCoche)
	{
			
		$this->db->set('consultas', 'consultas+1',False);
		$this->db->where('idCoche', $idCoche);
		$this->db->update('coches'); 
		
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