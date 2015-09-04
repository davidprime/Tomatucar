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

					//Tipo del usuario que esta viendo la página
					$miTipo=2;
					if($detalleRenta->idUsuarioDuenio == $miId)$miTipo=1;

				//Mensajes de la conversacion de la renta
					$mensajes = $this->Mensaje->select_MensajeEnRenta($id);
					
					$coches=$this->Coche->select_autoRentado($id);

				//Porcentaje de contestacion y tiempo medio de respuesta del otro usuario
					if($miTipo==1)
					{
						$datosUsuario->PorcentajeContestacion = $this->Usuario->obtenerPorcentajeContestacion($detalleRenta->idUsuarioRenta);
						$datosUsuario->TiempoMedioRespuesta = $this->Usuario->select_TiempoMedioRespuesta($detalleRenta->idUsuarioRenta);
					}
					else
					{
						$datosDuenio->PorcentajeContestacion = $this->Usuario->obtenerPorcentajeContestacion($detalleRenta->idUsuarioDuenio);
						$datosDuenio->TiempoMedioRespuesta = $this->Usuario->select_TiempoMedioRespuesta($detalleRenta->idUsuarioDuenio);
					}


					$data['Titulo'] = "Detalle de la renta";

					$data['miId'] = $miId;
					$data['miTipo'] = $miTipo;//Si soy dueño(2) o quien desea rentar (1)
					$data['duenio'] = $datosDuenio;
					$data['usuario'] = $datosUsuario;
					$data['coches'] = $coches;
					$data['detalleRenta'] = $detalleRenta;
					$data['mensajes'] = $mensajes;
					$data['idcoche']=$id;
					

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
    function AceptarRenta($id)
	{
		
	    //echo print_r($_POST);

	    $apellido =$this->input->post('apellido'); 
    	$nombre =$this->input->post('nombre'); 
	    $this->Renta->AceptarRenta($id,$apellido,$nombre);
		$this->Renta->ChangeState(3,$id);

		
	}
	function RechazarRenta($id)
	{
	   //En esta seccon debemos de llamar a model para que cambia el estado de esta renta a 2
	   $this->Renta->ChangeState(2,$id);
	   //Reload page
	 			  $detalleRenta = $this->Renta->select_renta($id);
					$miId = $this->session->userdata('identificador');

				//Informacion del usuario que posee el auto
					$datosDuenio = $this->Usuario->select_usuario($detalleRenta->idUsuarioDuenio);

				//Informacion del usuario que quiere rentar
					$datosUsuario = $this->Usuario->select_usuario($detalleRenta->idUsuarioRenta);
										
					//Tipo del usuario que esta viendo la página
					$miTipo=2;
					if($detalleRenta->idUsuarioDuenio == $miId)$miTipo=1;
					
					$mensajes = $this->Mensaje->select_MensajeEnRenta($id);
 			    	$coches = $this->Coche->select_autoRentado($id);	
					
									//Porcentaje de contestacion y tiempo medio de respuesta del otro usuario
					if($miTipo==1)
					{
						$datosUsuario->PorcentajeContestacion = $this->Usuario->obtenerPorcentajeContestacion($detalleRenta->idUsuarioRenta);
						$datosUsuario->TiempoMedioRespuesta = $this->Usuario->select_TiempoMedioRespuesta($detalleRenta->idUsuarioRenta);
					}
					else
					{
						$datosDuenio->PorcentajeContestacion = $this->Usuario->obtenerPorcentajeContestacion($detalleRenta->idUsuarioDuenio);
						$datosDuenio->TiempoMedioRespuesta = $this->Usuario->select_TiempoMedioRespuesta($detalleRenta->idUsuarioDuenio);
					}
					
					    
					$data['Titulo'] = "Detalle de la renta";
                    $data['coches'] = $coches;
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
	
	function enviarMensaje()
	{
		//Una vez que un usuario manda un nuevo mensaje, Obtener info mediante post y otros datos
		if($_POST)
		{

			//Actualizar tiempo medio de respuesta (En caso de que el propietario sea quien escribe y no haya escrito en esta renta)
			$this->Usuario->update_TiempoMedioRespuesta($_POST);


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
					
				//Actualizar Puntuacion	
				$id= $_POST['idcoche']; ;
				$puntuacion=$this->Coche->select_autopuntuacion($id);
				$this->Coche->update_autopuntuacion($id, $puntuacion);
		
				//Recargar vista
				$this->load->view('autodetallerenta_mensajes', $data);

			}

		}
	}



//Notificacion por correo de nuevo mensaje
	function enviarNotificacion($datos)
	{
		$config = array('protocol' => 'smtp', 'smtp_host' => 'ssl://servidor3303.tl.controladordns.com', 'smtp_user' => 'administrador@dev.tomatucar.com.mx', 'smtp_pass' => 'Admin.123', 'smtp_port' => 465, 'crlf' => "\r\n", 'newline' => "\r\n", 'smtp_timeout' => 5, 'charset' => 'utf-8', 'validate' => TRUE, 'mailtype' => 'html');

		//Generar hash y colocarlo en un link
		$this -> load -> library('email', $config);

		$link=base_url()."autodetallerenta/".$datos['idRenta'];

		//$mensaje = 'Â¡Saludos desde Tomatucar! <br> <br> Este correo se ha generado automÃ¡ticamente indicarte que la contraseÃ±a ha cambiado a <br><b>' . $datos['nPass'].'</b><br> Logeate con esta contraseÃ±a la prÃ³xima vez que incies sesiÃ³n.';
		
		$mensaje = 'Â¡Saludos desde Tomatucar! Ha recibido un nuevo mensaje de '.$datos['remitente'].'. Mensaje: <br> <p>'.$datos['mensaje'].'</p> <br> '.' Haga click <a href="'.$link.'">aqui</a> para ver la conversacion completa';
		$this -> email -> from('administrador@dev.tomatucar.com.mx', 'Administrador Tomatucar');
		$this -> email -> to($datos['email']);
		$this -> email -> subject($datos['remitente'].' le ha escrito en la conversacion de una renta');
		$this -> email -> message($mensaje);

		$this -> email -> send();
	}



}
?>