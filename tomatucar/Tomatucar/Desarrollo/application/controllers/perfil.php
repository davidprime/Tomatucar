<?php

class Perfil extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Usuario');
		$this->load->model('Pais');
		$this->load->model('Estado');
		$this->load->model('Ciudad');
        $this->load->helper('url');
        $this->load->helper('form');
		$this->load->library('image_lib');
	}
	function index()
	{
				if($this->session->userdata('nombre'))
				{
					$paises = $this->Pais->select_pais();
					$data['Titulo'] = 'Perfil';
					$estados = "";
					$ciudades = "";													
					$usuario = $this->Usuario->select_usuario($this->session->userdata('identificador'));
					$data['nombre'] = $usuario->Nombre;
					$data['apellido'] = $usuario->Apellido;
					$data['correo'] = $usuario->Email;
					$data['telefono'] = $usuario->Telefono;
					$data['fechanacimiento'] = $usuario->FechaNacimiento;
					$data['idpaisnacimiento'] = $usuario->idPaisNacimiento;
					$data['idestadonacimiento'] = $usuario->idEstadoNacimiento;
					$data['idciudadnacimiento'] = $usuario->idCiudadNacimiento;
					$data['estadonacimiento'] = $usuario->EstadoNacimiento;
					$data['ciudadnacimiento'] = $usuario->CiudadNacimiento;
					$data['idpaisdireccion'] = $usuario->idPaisDireccion;
					
					$data['idestadodireccion'] = $usuario->idEstadoDireccion;
					if($usuario->idEstadoDireccion > 0)
					{
						$estados = $this->Estado->select_estadoporpais($usuario->idPaisDireccion);
					}
					$data['idciudaddireccion'] = $usuario->idCiudadDireccion;
					if($usuario->idPaisDireccion > 0)
					{
						$ciudades = $this->Ciudad->select_ciudadporestado($usuario->idEstadoDireccion);
					}
					$data['estadodireccion'] = $usuario->EstadoDireccion;
					$data['ciudaddireccion'] = $usuario->CiudadDireccion;
					$data['codigopostal'] = $usuario->CodigoPostal;
					$data['calle'] = $usuario->Calle;
					$data['fotoperfil'] = $usuario->FotoPerfil;
					$data['fotolicencia'] = $usuario->FotoLicencia;
					$data['fechaantiguedad'] = $usuario->FechaAntiguedad;
					$data['fechaexpiracion'] = $usuario->FechaExpiracion;
					$data['numerolicencia'] = $usuario->NumeroLicencia;
					
					$data['paises'] = $paises;
					$data['estados'] = $estados;
					$data['ciudades'] = $ciudades;
					
					$this->load->view('templates/header',$data);
					$this->load->view('perfil');
					$this->load->view('templates/footer');
				}	
				else {
					redirect('/login');
				}				
			
	}
	function subirfotos(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
		$config['max_size'] = '2048';
		$config['overwrite'] = TRUE;
		$profilepic =null;
		$licenciapic = null;	
		//******************************PROFILE PICTURE
		if($_FILES["perfil"]["name"] > "")
		{
			$ext = pathinfo($_FILES["perfil"]["name"], PATHINFO_EXTENSION);
			
			$profilepic = hash('sha256', $this->input->post('email')."profile"); 
			$profilepic =  $profilepic.".".$ext;
			$config['file_name'] = $profilepic;
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('perfil'))
			{
				$error = array('error' => $this->upload->display_errors());	
				echo '<script>alert("Error intentando subir la foto de perfil: '.$error.'");</script>';		
			}
			else {
				$data = array(			
							'id' =>$this->session->userdata('identificador'),
							'perfil' =>$profilepic,
							'tipo' => 'perfil'
					);	
				if(!$this->Usuario->uploadimage($data))
				{
					echo "<script>alert('error en la imagen 1')</script>";
		               $this->session->set_flashdata("message","Hubo un error!");
		               redirect('perfil/index');
				}
				else{
					echo TRUE;
					exit;
				}
			}
		}
		//**************************END PROFILE PICTURE
		
		//*****************************LICENCIA PICTURE
		if($_FILES["licencia"]["name"] > "")
		{
		
			$ext = pathinfo($_FILES["licencia"]["name"], PATHINFO_EXTENSION);
			$licenciapic = hash('sha256', $this->input->post('email')."licencia"); 
			$licenciapic = $licenciapic.".".$ext;
			$config['file_name'] = '';
			$config['file_name'] = $licenciapic;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('licencia'))
			{
				$error = array('error' => $this->upload->display_errors());
				echo '<script>alert("Error intentando subir la foto de licencia: '.$error.'");</script>';	
			}
			else {
	
				$data = array(			
						'id' =>$this->session->userdata('identificador'),
						'licencia' =>$licenciapic,
						'tipo' => 'licencia'
					);	
				if(!$this->Usuario->uploadimage($data))
				{
					echo "<script>alert('error en la imagen 2')</script>";
		               $this->session->set_flashdata("message","Hubo un error!");
		               redirect('perfil/index');
				}
				else{
					echo TRUE;
					exit;
				}
			}
		}
		//************************END LICENCIA PICTURE	
	}
	function subirInformacion(){
				
		//David Vara 17/04/2015 inicio
		// Definir estas variables como null para evitar errores
		$antiguedad=null;
		$expiracion=null;
		// David Vara 17/04/2015 fin
		
		$nacimiento = DateTime::createFromFormat('Y-m-d', $this->input->post('nacimiento'))->format('Y-m-d');
		if($this->input->post('antiguedad'))
		{
			$antiguedad = DateTime::createFromFormat('Y-m-d', $this->input->post('antiguedad'))->format('Y-m-d');
		}
		if($this->input->post('expiracion'))
		{
			$expiracion = DateTime::createFromFormat('Y-m-d', $this->input->post('expiracion'))->format('Y-m-d');
		}
		$data = array(
			'id' =>$this->session->userdata('identificador'),
			'nombre' =>$this->input->post('nombre'),
			'apellido' =>$this->input->post('apellido'),
			'telefono' => $this->input->post('telefono'),
			'fechanacimiento' =>$nacimiento,
			'idpaisnacimiento' =>$this->input->post('paisnacimiento'),
			'direccion' =>$this->input->post('direccion'),
			'codigopostal' =>$this->input->post('codigopostal'),
			'idpaisdireccion' =>$this->input->post('idpaisdireccion'),	
			'idestadodireccion' =>$this->input->post('idestadodireccion'),		
			'idciudaddireccion' =>$this->input->post('idciudaddireccion'),
			'estadodireccion' =>$this->input->post('estadodireccion'),
			'ciudaddireccion' =>$this->input->post('ciudaddireccion'),
			'numerolicencia' =>$this->input->post('numerolicencia'),
			'antiguedad' =>$antiguedad,
			'expiracion' =>$expiracion
		);
		if($this->Usuario->update_usuario($data))
		{
              // echo '<script>alert("Usuario Actualizado correctamente!");</script>';
               redirect('perfil/index', 'refresh');
		}
		else{
               $this->session->set_flashdata("message","Hubo un error!");
               redirect('perfil/index', 'refresh');
		}
		
		
	}
	function crearDDEstados(){
		$idpais = $this->input->post('pais',TRUE);
		
		$estados = $this->Estado->select_estadoporpais($idpais);
		$output = "";
        foreach ($estados as $key=>$a)
        {
            //here we build a dropdown item line for each query result
            $output .= "<option value='".$key."'>".$a."</option>";
        }		
		
		echo $output;
	}
	function crearDDCiudades(){
		$idestado = $this->input->post('estado',TRUE);
		
		$ciudades = $this->Ciudad->select_ciudadporestado($idestado);
		$output = "";
        foreach ($ciudades as $key=>$a)
        {
            //here we build a dropdown item line for each query result
            $output .= "<option value='".$key."'>".$a."</option>";
        }		
		
		echo $output;
	}
}
