<?php

class autodetallerenta extends CI_Controller{
	

	
	function __construct() {
		parent::__construct();
		$this->load->model('Coche');
		$this->load->model('Usuario');
		$this->load->model('Renta');
		$this->load->model('Mensaje');
		$this->load->helper('form');
		$this->load->library('session');

	}
	
	
	function index($id){
		//Ver si hay sesion
		if($this->session->userdata('nombre'))
		{
			//Ver si se indica el id de la renta
			if($id)
			{

			//Si el auto a solicitar existe, obtener informacion de este
				$detalleRenta = $this->Renta->select_renta($id);

				if($detalleRenta != false)
				{

				//ID de quien ve la pagina
					$miId = $this->session->userdata('identificador');


				//Informacion del usuario que posee el auto
					$datosDuenio = $this->Usuario->select_usuario($detalleRenta->idUsuarioDuenio);

				//Informacion del usuario que quiere rentar
					$datosUsuario = $this->Usuario->select_usuario($detalleRenta->idUsuarioRenta);

					//echo "Mi id:".$miId." idUsuarioDuenio: ".$detalleRenta->idUsuarioDuenio." idUsuarioRenta: ".$detalleRenta->idUsuarioRenta." mi tipo:";
					//echo ($detalleRenta->idUsuarioDuenio == $miId? 1 :  2);
					$miTipo=2;
					if($detalleRenta->idUsuarioDuenio == $miId)$miTipo=1;

				//Mensajes de la conversacion de la renta
					$mensajes = $this->Mensaje->select_MensajeEnRenta($id);


					$data['Titulo'] = "Detalle de la renta";

					$data['miId'] = $miId;
					$data['miTipo'] = $miTipo;//Si soy dueño(2) o quien desea rentar (1)
					$data['duenio'] = $datosDuenio;
					$data['usuario'] = $datosUsuario;

					$data['detalleRenta'] = $detalleRenta;
					$data['mensajes'] = $mensajes;

					

					$this->load->view('templates/header', $data);
					$this->load->view('autodetallerenta',$data);
					$this->load->view('templates/footer');

				}
				else
				{
					redirect('/404');
				}
			}
			else redirect('/');
		}
		else redirect('/login');

	}

	//Añade mensaje a DB y manda una notificacion por correo, al finalizar carga la vista autodetallerenta_mensajes dentro del contenedor de mensajes
	function enviarMensaje()
	{
		//Una vez que un usuario manda un nuevo mensaje, Obtener info mediante post y otros datos
		if($_POST)
		{


			//Añadir mensaje a BD
			if($this->Mensaje->insert_mensaje($_POST))
			{
				$datosDeCorreo['email'] = $_POST['email'];
				$datosDeCorreo['remitente'] = $_POST['remitente'];
				$datosDeCorreo['mensaje'] = $_POST['Mensaje'];
				$datosDeCorreo['idRenta'] = $_POST['idRenta'];

			//Enviar notificacion de correo
				$this -> enviarNotificacion($datosDeCorreo);


			//Mensajes de la conversacion de la renta
				$mensajes="";
				$mensajes = $this->Mensaje->select_MensajeEnRenta($_POST['idRenta']);
				$data['mensajes'] = $mensajes;
				$data['miId'] = $this->session->userdata('identificador');

				//Recargar vista
				$this->load->view('autodetallerenta_mensajes', $data);

			}

		}
	}



//Notificacion por correo de nuevo mensaje
	function enviarNotificacion($datos)
	{
		$config = array('protocol' => 'smtp', 'smtp_host' => 'ssl://smtp.gmail.com', 'smtp_user' => 'davidprime15@gmail.com', 'smtp_pass' => 'Oh!MAHGeednezz', 'smtp_port' => 465, 'crlf' => "\r\n", 'newline' => "\r\n", 'smtp_timeout' => 5, 'charset' => 'utf-8', 'validate' => TRUE, 'mailtype' => 'html');

		//Generar hash y colocarlo en un link
		$this -> load -> library('email', $config);

		$link=base_url()."autodetallerenta/".$datos['idRenta'];

		//$mensaje = '¡Saludos desde Tomatucar! <br> <br> Este correo se ha generado automáticamente indicarte que la contraseña ha cambiado a <br><b>' . $datos['nPass'].'</b><br> Logeate con esta contraseña la próxima vez que incies sesión.';
		
		$mensaje = '¡Saludos desde Tomatucar! Ha recibido un nuevo mensaje de '.$datos['remitente'].'. Mensaje: <br> <p>'.$datos['mensaje'].'</p> <br> '.' Haga click <a href="'.$link.'">aqui</a> para ver la conversacion completa';
		$this -> email -> from('davidprime15@gmail.com', 'Administrador Tomatucar');
		$this -> email -> to('davidprime15@gmail.com');
		//$this -> email -> to($datos['email']);
		
		//$this -> email -> to('searchca@hotmail.com');
		$this -> email -> subject($datos['remitente'].' le ha escrito en la conversacion de una renta');
		$this -> email -> message($mensaje);

		$this -> email -> send();
	}



}
?>