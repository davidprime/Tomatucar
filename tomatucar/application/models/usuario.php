<?php
class Usuario extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	function verificar_email($Email){
		$this->db->select('Email');
		$this->db->where('Email', $Email); 
		$query = $this->db->get('usuarios');
		if ($query->num_rows() > 0)
		{
			return 	FALSE;
		}
		else {
			return TRUE;
		}
	}
	function login_usuario($datos)
	{
		$query = $this->db->query("SELECT Email,Contrasena,Salt, Confirmado,Nombre,idusuarios from usuarios where Confirmado = 1 AND Email='".$datos['email']."' LIMIT 1");
		$row = $query->row();
		if($query->num_rows() > 0)
		{
			$pass = hash('sha256', $datos['contrasena'].$row->Salt); 
			$passdb = $row->Contrasena;
			if($pass == $passdb)
			{
				// -- David Vara 17/04/2015 inicio  
				// Establecer la fecha del ultimo login	como ahora para el usuario segun id
				$this->establecerFechaLogin($row->idusuarios);
				// -- David Vara 17/04/2015 fin 
				
				$this->load->library('session');
				$userData = array('nombre'=>$row->Nombre,
									'identificador'=>$row->idusuarios);
				$this->session->set_userdata($userData);
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}
	function insert_usuario($datos){
		$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
		$password = hash('sha256', $datos['contrasena'] . $salt); 
		date_default_timezone_set('America/Mexico_City');
		$fecha = date('Y-m-d H:i:s');
		$sqldata = array(
   			'Nombre' => $datos['nombre'] ,
   			'Apellido' => $datos['apellidos'],
   			'Email' => $datos['email'] ,
   			'Contrasena' => $password,
   			'Salt' => $salt,
   			'FechaRegistro'=>$fecha
		);

		$this->db->insert('usuarios', $sqldata); 
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	function select_usuario($id)
	{
		$query = $this->db->query("SELECT idusuarios, Nombre,Apellido,Email, Telefono, FechaNacimiento, 
									 idPaisNacimiento, idEstadoNacimiento, idCiudadNacimiento, 
									 EstadoNacimiento, CiudadNacimiento, idPaisDireccion, idEstadoDireccion, 
									 idCiudadDireccion, EstadoDireccion, CiudadDireccion, CodigoPostal, Calle, 
									 FotoPerfil, FotoLicencia, FechaAntiguedad,FechaExpiracion, NumeroLicencia 
									FROM usuarios where idusuarios = '".$id."' LIMIT 1");
		$row = $query->row();
		if($query->num_rows() > 0)
		{
			return $row;
			
		}
		else{
			return null;
		}
	
	}
	function update_usuario($datos)
	{
		date_default_timezone_set('America/Mexico_City');
		$fecha = date('Y-m-d H:i:s');	
		if($datos['nombre'] != $this->session->userdata('nombre'))
		{
			$this->session->set_userdata('nombre', $datos['nombre']);
		}
		$data = array(
               'Nombre' => $datos['nombre'],
               'Apellido' => $datos['apellido'],
               'Telefono' => $datos['telefono'],
               'FechaNacimiento' => $datos['fechanacimiento'],
               'idPaisNacimiento' => $datos['idpaisnacimiento'],
               'Calle' => $datos['direccion'],
               'CodigoPostal' => $datos['codigopostal'],
               'idPaisDireccion' => $datos['idpaisdireccion'],
               'idEstadoDireccion' => $datos['idestadodireccion'],
               'idCiudadDireccion' => $datos['idciudaddireccion'],
               'EstadoDireccion' => $datos['estadodireccion'],
               'CiudadDireccion' => $datos['ciudaddireccion'],
               'NumeroLicencia' => $datos['numerolicencia'],
               'FechaAntiguedad' => $datos['antiguedad'],
               'FechaExpiracion' => $datos['expiracion'],
               'FechaActualizacion'  => $fecha, 
               // -- David Vara 17/04/2015 inicio  
               'Edad' => $this->obtenerEdad($datos['fechanacimiento'])
			   // -- David Vara 17/04/2015 fin 
            );

		$this->db->where('idusuarios', $datos['id']);
		$this->db->update('usuarios', $data); 
		if($this->db->_error_message())
		{
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	//funcion creada para subir la ruta de la foto tanto de licencia como de perfil
	//Sergio 18-05-15
	function uploadimage($datos){
		$data = null;
		if($datos['tipo'] == 'perfil')
		{
			$data = array(
				'FotoPerfil' => $datos['perfil']
            );
		}
		if($datos['tipo'] == 'licencia')
		{
			$data = array(
				'FotoLicencia' => $datos['licencia']
            );
		}		
		$this->db->where('idusuarios', $datos['id']);
		$this->db->update('usuarios', $data); 
		if($this->db->_error_message())
		{
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	function select_fotos($id)
	{
		$query = $this->db->query("SELECT FotoPerfil, FotoLicencia FROM usuarios where idusuarios = '".$id."' LIMIT 1");
		$row = $query->row();
		if($query->num_rows() > 0)
		{
			return $row;
			
		}
		else{
			return null;
		}
	
	}
	function cambiarcorreo($datos)
	{
		$query = $this->db->query("SELECT Nombre,Apellido,Email,Contrasena,Salt,idusuarios from usuarios where Confirmado = 1 AND idusuarios='".$datos['id']."' LIMIT 1");
		$row = $query->row();
		if($query->num_rows() > 0)
		{
			$pass = hash('sha256', $datos['contrasena'].$row->Salt); 
			$passdb = $row->Contrasena;
			if($pass == $passdb)
			{
				$data = array(
               		'nombre' => $row->Nombre,
               		'apellidos' => $row->Apellido,
               		'email' => $datos['email']
            	);
				$this->enviarCorreo($data);
				
				$cambios = array(
               		'Email' => $datos['email'],
               		'Confirmado' => 0
            	);

				$this->db->where('idusuarios', $datos['id']);
				$this->db->update('usuarios', $cambios); 				
				
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
		
	}
	function cambiarcontrasena($datos)
	{
		$query = $this->db->query("SELECT Contrasena,Salt,idusuarios from usuarios where Confirmado = 1 AND idusuarios='".$datos['id']."' LIMIT 1");
		$row = $query->row();
		if($query->num_rows() > 0)
		{
			$pass = hash('sha256', $datos['contrasenavieja'].$row->Salt); 
			$passNuevo = hash('sha256', $datos['contrasenanueva'].$row->Salt); 
			$passdb = $row->Contrasena;
			if($pass == $passdb)
			{				
				$cambios = array(
               		'Contrasena' => $passNuevo
            	);

				$this->db->where('idusuarios', $datos['id']);
				$this->db->update('usuarios', $cambios); 				
				
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}		
	}
	// -- David Vara 13/05/2015 inicio  
	// Efectuar cambio de contraseña
	function reestablecercontrasena($datos)
	{
	
	$query = $this->db->query("SELECT Salt,idusuarios from usuarios where Confirmado = 1 AND Email='".$datos['email']."' LIMIT 1");
		$row = $query->row();
		if($query->num_rows() > 0)
		{
			$passNuevo = hash('sha256', $datos['contrasenanueva'].$row->Salt); 
							
				$cambios = array(
               		'Contrasena' => $passNuevo
            	);

				$this->db->where('Email', $datos['email']);
				$this->db->update('usuarios', $cambios); 				
				
				return true;
			
		}
		else {
			return false;
		}
	}
	// -- David Vara 13/05/2015 fin
	function cambiarcuentab($datos)
	{
		$query = $this->db->query("SELECT Contrasena,Salt,idusuarios from usuarios where Confirmado = 1 AND idusuarios='".$datos['id']."' LIMIT 1");
		$row = $query->row();
		if($query->num_rows() > 0)
		{
			$pass = hash('sha256', $datos['contrasena'].$row->Salt);
			$cuentabancaria =  hash('sha256', $datos['cuenta'].$row->Salt);
			$passdb = $row->Contrasena;
			if($pass == $passdb)
			{				
				$cambios = array(
               		'CuentaBancaria' => $cuentabancaria
            	);

				$this->db->where('idusuarios', $datos['id']);
				$this->db->update('usuarios', $cambios); 				
				
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}		
	}
	function eliminarcuenta($datos)
	{
		$query = $this->db->query("SELECT Email,Contrasena,Salt,idusuarios from usuarios where Confirmado = 1 AND idusuarios='".$datos['id']."' LIMIT 1");
		$row = $query->row();
		if($query->num_rows() > 0)
		{
			$pass = hash('sha256', $datos['contrasena'].$row->Salt); 
			$passdb = $row->Contrasena;
			$email = $row->Email.'|eliminado';
			if($pass == $passdb)
			{				
				$cambios = array(
               		'Confirmado' => 0,
               		'Email' => $email
            	);

				$this->db->where('idusuarios', $datos['id']);
				$this->db->update('usuarios', $cambios); 				
				
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}		
	}
	function enviarCorreo($datos)
	{
		
		$config = array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.gmail.com',
		  'smtp_user' => 'casertillo@gmail.com',
		  'smtp_pass' => 'Mex1Can0\Go',
		  'smtp_port' => 465,
		  'crlf' => "\r\n",
		  'newline' => "\r\n",
		  'smtp_timeout' => 5,
		  'charset' => 'utf-8',
		  'validate' => TRUE,
		  'mailtype' => 'html'
		);
		$this->load->library('email', $config);
		$confirm  = hash('sha256', $datos['nombre'].$datos['apellidos'].$datos['email']); 
		$link = base_url().'confirmacion/'.$confirm;
		$mensaje = '¡'.$datos['nombre'].' Bienvenid(a) a Tomatucar! <br> <br> Este correo se ha generado automáticamente para confirmar tu correo. <br><br> Porfavor da click en el siguiente link: <a href="'.$link.'">'.$link.'</a>';
		$this->email->from('casertillo@gmail.com', 'Administrador Tomatucar');
		$this->email->to('searchca@hotmail.com');
		$this->email->subject('Confirmacion de Correo');
		$this->email->message($mensaje);
		
		$this->email->send();
		
	}

	 // -- David Vara 17/04/2015 inicio  
	
	// Obtener edad en base a la fecha de nacimiento
	function obtenerEdad($fechanacimiento)
	{
		// Diferencia de tiempo
		$intervalo = date_diff(date_create(),
		date_create_from_format('Y-m-d',$fechanacimiento));
		
		//devolver los años del intervalo
		return $intervalo->y;
	}
	
	//Establecer fecha del ultimo login, hoy
	function establecerFechaLogin($id)
	{
		//Especificar zona horaria y colocar la fecha y hora actual
		date_default_timezone_set('America/Mexico_City');
		$datos = array('UltimoLogin' => date('Y-m-d H:i:s'));
		//actualizar segun id
		$this->db->where('idusuarios', $id);
				$this->db->update('usuarios', $datos); 
	}
	 // -- David Vara 17/04/2015 fin



	 // -- David Vara 20/07/2015 inicio 
	 //Obtener porcentaje de contestacion
	 function obtenerPorcentajeContestacion($idUsuario)
	 {
	//total de rentas que el usuario posee como propietario
	 	$query = $this->db->query("Select count(*) as Rentas
	 		From rentas
	 		where idUsuarioDuenio = '".$idUsuario."';");

		$NumRentas= $query->row()->Rentas;

		//Si el número de rentas es 0
		if($NumRentas==0)
			return null;


	//Total (rentas unicas) de aquellos mensajes en donde el propietario ya ha escrito
		$query = $this->db->query("SELECT count(Distinct mensajes.idRenta) as Respuestas
		FROM `mensajes`
		left join rentas on rentas.idRenta = mensajes.idRenta 
		where idUsuarioEnvia = '".$idUsuario."'
		and idUsuarioDuenio = '".$idUsuario."';");

		$NumRespuestas= $query->row()->Respuestas;


		//retornar porcentaje
		return intval(($NumRespuestas / $NumRentas) * 100);

	 } 


	 //Obtener tiempo medio de respuestas
	 function select_TiempoMedioRespuesta($idUsuario)
	 {
	 	$query = $this->db->query("SELECT TiempoMedioRespuesta FROM usuarios where idusuarios = '".$idUsuario."' LIMIT 1");
		if($query->num_rows() > 0)
		{
			return intval($query->row()->TiempoMedioRespuesta);
		}
		else{
			return null;
		}

	 }

	 //Añadir valor al tiempo medio de respuestas
	 function update_TiempoMedioRespuesta($datos)
	 {


		//Contar los mensajes correspondientes a la renta segun el id del usuario que envia el mensaje
	 	//Obtener mediante conteo si el usuario que manda el mensaje es el dueño de la renta
			$query = $this->db->query("Select count(mensajes.idRenta) as msg, rentas.idRenta as renta, rentas.FechaAgregado,usuarios.TiempoMedioRespuesta
				From rentas
				left join mensajes on mensajes.idRenta = rentas.idRenta
				left join usuarios on usuarios.idusuarios = '".$datos['idUsuarioEnvia']."'
				where rentas.idRenta = '".$datos['idRenta']."'
                and idUsuarioDuenio = '".$datos['idUsuarioEnvia']."'
                and mensajes.idUsuarioEnvia = '".$datos['idUsuarioEnvia']."';");

			//Si los mensajes son 0 y la renta no es null
			if($query->num_rows() > 0 &&
			 $query->row()->msg==0 &&
			 $query->row()->renta!=null)
			{



			//TiempoMedioRespuesta actuales
				$segundos = intval($query->row()->TiempoMedioRespuesta);


			//Obtener diferencia entre el momento de la creacion de la renta y ahora
				date_default_timezone_set('America/Mexico_City');

				$intervalo = date_diff(date('Y-m-d H:i:s'),
					date_create_from_format('Y-m-d H:i:s', $query->row()->FechaAgregado));

			//Añadir segundos del intervalo y establecer nuevo promedio
				$segundosNuevos = ($segundos + $intervalo->s)/2;

			//Limitar a 24H, 1440m(24*60)
				if($segundosNuevos > 1440 )$segundosNuevos = 1440;

			//Actualizar TiempoMedioRespuesta
				$this->db->where('idusuarios', $id);
				$this->db->update('usuarios', array('TiempoMedioRespuesta' => $segundosNuevos)); 

			}


	 }

}
?>