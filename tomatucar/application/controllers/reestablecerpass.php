<?php

class Reestablecerpass extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('Usuario');
		$this -> load -> helper('url');
		$this->load->model('Confirma');
	}

	function index() {

		if ($_POST) {
			//Si el email existe dentro de los usuarios registrados
			if (!$this -> Usuario -> verificar_email($_POST['email'])) {

				//Crear nueva contraseña
				//$datos['nPass'] = $this -> generarPass();
				
				
				//Encriptar contraseña y almacenar
				//$data = array(
				//'contrasenanueva' => $datos['nPass'],
				//'email' => $_POST['email']);
			
			// Si la transaccion fue correcta
			//if($this->Usuario->reestablecercontrasena($data))
			//{
								
				//mandar mail
				$datos['email'] = $_POST['email'];
				$this -> enviarCorreo($datos);

				//Cerrar sesion
				$this -> session -> sess_destroy();
				
				//Mensaje de exito
				echo '<script>alert("Contrasena cambiada con exito!\n Favor de ingresar con la nueva contrasena");</script>';

				//Dirigir a login
				redirect('/login');
							
			//}
			//else {
			//	echo '<script>alert("Ocurrió un error al intentar cambiar el contraseno... Bad query");</script>';
			//	redirect(base_url()."modificarcorreo/index", 'refresh');	
			//}
				
			
			} else {
				echo '<script>alert("Ocurrió un error al intentar cambiar el contraseno.... No existe el mail");</script>';
				redirect(base_url()."modificarcorreo/index", 'refresh');
			}

		}
	}


	function cambiarpass($key){
		$email = $this->Confirma->confirmarCambioPass($key);
		
		if($email!="")
		{
			//Mostrar formulario para ingresar nueva contraseña
			echo "dentro de cambio de pass positiva ".$key." ".$email;
			$data['Titulo'] = 'Reestablecer contraseña';
			$data['email'] = $email;
			$this->load->view('templates/header', $data);
			$this->load->view('reestablecerpass',$data);
			$this->load->view('templates/footer');
		}
		else {
			//Mostrar el mismo contenido de confirmacion por correo fallida
			echo "\ndentro de cambio de pass negativa \n".$key;
			$data['mensaje'] = '<div  class="alert alert-warning"><strong><span class="glyphicon glyphicon-ok"></span></strong> CODIGO EXPIRADO O USADO.</div>';;
			$data['Titulo'] = 'Reestablecer contraseña';
			$this->load->view('templates/header', $data);
			$this->load->view('confirmacion', $data);
			$this->load->view('templates/footer');				
		}
	}

	
	function establecerpass()
	{
		//Obtener el input para cambiar contraseña
		if ($_POST) {
			
			echo $_POST['contrasenanueva']."   ".$_POST['email'];
			
			//input de contraseña para establecer pass
			$passdata = array(
				'contrasenanueva' => $_POST['contrasenanueva'],
				'email' => $_POST['email']);
			
			//Si la transaccion fué exitosa
			if($this->Usuario->reestablecercontrasena($passdata))
			{
				
				redirect('/login');
				return;
			}
		}
		
		//Dirigir a login
		redirect('/login');
	}

	function generarPass() {
		$nPass = 'asdASD1';
		
		//la nueva pass tendrá al menos 6 caraceres,

		//de 2 a 3 minusculas
			for($i=0;$i<rand(2, 3);$i++)
		$n1[$i] = chr(rand(97,122));
			
		//de 2 a 3 mayusculas
			for($i=0;$i<rand(2, 3);$i++)
		$n2[$i] = chr(rand(65,90));
			
		//al 2 a 3 numeros	
			for($i=0;$i<rand(2, 3);$i++)
		$n3[$i] = chr(rand(48,57));
			
		//Revolver y añadir a nPass
		$nPass = array_merge(array_merge($n1,$n2),$n3);
		shuffle($nPass);

		return implode("", $nPass);
	}

	function enviarCorreo($datos) {

		$config = array('protocol' => 'smtp', 'smtp_host' => 'servidor3303.tl.controladordns.com', 'smtp_user' => 'administrador@dev.tomatucar.com.mx', 'smtp_pass' => 'Admin.123', 'smtp_port' => 465, 'crlf' => "\r\n", 'newline' => "\r\n", 'smtp_timeout' => 5, 'charset' => 'utf-8', 'validate' => TRUE, 'mailtype' => 'html');

		//Generar hash y colocarlo en un link
		$this -> load -> library('email', $config);
		$confirm  = hash('sha256', $datos['email']); 
		$link = base_url().'reestablecerpass/cambiarpass/'.$confirm;
		

		//$mensaje = '¡Saludos desde Tomatucar! <br> <br> Este correo se ha generado automáticamente indicarte que la contraseña ha cambiado a <br><b>' . $datos['nPass'].'</b><br> Logeate con esta contraseña la próxima vez que incies sesión.';
		
		$mensaje = '¡Saludos desde Tomatucar! <br> <br> Hemos recibido una solicitud para efectuar el cambio de tu contraseña, si se trata de tí haz click en el siguiente enlace: <br>' . $link.'</br><br> Si no fuiste tú quien solicitó el cambio, haz caso omiso a este mensaje.';
		$this -> email -> from('administrador@dev.tomatucar.com.mx', 'Administrador Tomatucar');
		$this -> email -> to($datos['email']);
		
		$this -> email -> subject('Reestablecimiento de contraseña');
		$this -> email -> message($mensaje);

		$this -> email -> send();

	}

}
?>