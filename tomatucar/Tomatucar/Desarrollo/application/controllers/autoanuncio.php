<?php

class Autoanuncio extends CI_Controller{
	

	
	function __construct() {
		parent::__construct();
		$this->load->model('Coche');
		$this->load->model('Usuario');
		$this->load->model('Kilometrajerenta');
		$this->load->model('Renta');
		$this->load->helper('form');
		$this->load->library('session');
	}
	
	
	function index($id){
		
		if($id)
		{
			
			//Si el auto a solicitar existe, obtener informacion de este
			$detallecoche = $this->Coche->select_autoanuncio($id);
			
			if($detallecoche != false)
			{
				

				$miId = $this->session->userdata('identificador');

				//Añadir visita
				
				//$addCount=false;
				$consultaCoche = $this->session->userdata('consultaCoche');
				//echo "Nombre: ".$this->session->userdata('nombre')."<br>";
				
				//Adicionar visita si no el ultimo auto visitado es diferente al actual, o no hay
				if(!$consultaCoche || $consultaCoche!= $detallecoche->IdCoche)
				{
					$this->session->set_userdata('consultaCoche',$detallecoche->IdCoche);//Establecer cookie
					$this->Coche->addconsulta($id);//Añadir visita
					//$addCount=true;
				}
				

				//Informacion del usuario que posee el auto
				$datosusuario = $this->Usuario->select_usuario($detallecoche->idUsuario);

				//informacion de quien visita
				$datosvisitante = $this->Usuario->select_usuario($this->session->userdata('identificador'));

				
				//Condiciones de renta:
				//1: Tarjeta a nombre del propietario? REMOVIDO
				//2: Informacion completa de licencia
				//3: Fecha de antiguedad mayor o igual a 2 años
				$condiciones = array(
					'1' => true,
					'2' => ($datosvisitante&&
					 $datosvisitante->FotoLicencia>"" &&
					 $datosvisitante->FechaAntiguedad>""&&
					 $datosvisitante->FechaExpiracion>"" &&
					 $datosvisitante->NumeroLicencia>""),
					'3'  => ($datosvisitante&&
						$datosvisitante->FechaAntiguedad>""&&
						date_diff(date_create(),date_create_from_format('Y-m-d',$datosvisitante->FechaAntiguedad))->y >=2)
					);
				

				//Lista de kilometrajes para rentar
				$Kilometrajerenta = $this->Kilometrajerenta->select_kilometrajerenta();

				
				$data['Titulo'] = $detallecoche->Marca." ".$detallecoche->Modelo." : Tomatucar!";
				$data['coche'] = $detallecoche;
				$data['usuario'] = $datosusuario;
				$data['visitante'] = $datosvisitante;
				$data['condiciones'] = $condiciones;
				

				$data['miId']=$miId;
				$data['permitirRenta'] = $miId && ($miId!=$datosusuario->idusuarios);
				$data['Kilometrajerenta']=$Kilometrajerenta;

				
				$this->load->view('templates/header', $data);
				$this->load->view('autoanuncio',$data);
				$this->load->view('templates/footer');
				
			}
			else
			{
				redirect('/404');
			}
		}
		else redirect('/');
	}


	function solicitarrenta()
	{
		if ($_POST) {

			$insertdata = array(
			'idUsuarioDuenio' => $_POST['idUsuarioDuenio'],
			'idUsuarioRenta'  => $_POST['idUsuarioRenta'],
			'idCoche' => $_POST['idCoche'],
			'FechaInicio' =>  $_POST['inicio'],
			'FechaInicioAntesPm' =>  ($_POST['fechainicio_HoraModal']=="a.m."?"1":"0"),
			'FechaFin' =>  $_POST['fin'],
			'FechaFinAntesPm' =>  ($_POST['fechafin_HoraModal']=="a.m."?"1":"0"),
			'TotalDias' =>  $_POST['TotalDias'],
			'KilometrajeRenta' =>  $_POST['kilometrajeModal'],
			'PagoKilometro' => $_POST['PagoKilometro'],
			'TotalRenta' =>  $_POST['TotalRenta'],
			'TotalPagar' =>  $_POST['TotalPagar'],
			'TotalComision' =>  $_POST['TotalComision']);


			//Si la insercion fue exitosa
			if ($this -> Renta -> insert_renta($insertdata)) {

				$datosDeCorreo['email'] = $_POST['email'];
				$datosDeCorreo['remitente'] = $_POST['remitente'];
				$datosDeCorreo['mensaje'] = $_POST['Mensaje'];
				$datosDeCorreo['auto'] = $_POST['auto'];

			//Enviar notificacion de correo
				$this -> enviarNotificacion($datosDeCorreo);




				//Ir a mis rentas
				redirect(base_url()."misRentas");
				
			
			} else {
				//Ir a home?
				redirect(base_url()."home");
			}

		}

	}

	//Notificacion por correo de nuevo mensaje
	function enviarNotificacion($datos)
	{
		$config = array('protocol' => 'smtp', 'smtp_host' => 'ssl://smtp.gmail.com', 'smtp_user' => 'davidprime15@gmail.com', 'smtp_pass' => 'Oh!MAHGeednezz', 'smtp_port' => 465, 'crlf' => "\r\n", 'newline' => "\r\n", 'smtp_timeout' => 5, 'charset' => 'utf-8', 'validate' => TRUE, 'mailtype' => 'html');


		$this -> load -> library('email', $config);

		$link=base_url()."misrentas";


		$mensaje = '¡Saludos desde Tomatucar! Ha recibido una solicitud para rentar su '.$datos['auto'].' por parte de '.$datos['remitente'].'. <br> <p>'.$datos['mensaje'].'</p> <br> '.' Haga click <a href="'.$link.'">aqui</a> para ver gestionar sus rentas';
		$this -> email -> from('davidprime15@gmail.com', 'Administrador Tomatucar');
		$this -> email -> to('davidprime15@gmail.com');
		//$this -> email -> to($datos['email']);
		
		//$this -> email -> to('searchca@hotmail.com');
		$this -> email -> subject($datos['remitente'].' desea rentar su auto!');
		$this -> email -> message($mensaje);

		$this -> email -> send();
	}
}
?>