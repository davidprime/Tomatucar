<?php

class Automodificarfoto extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Coche');
        $this->load->helper('url');
        $this->load->helper('form');
		$this->load->library('image_lib');
	}
	function index($id= "0"){
		if($this->session->userdata('nombre'))
		{
			$detallecoche = $this->Coche->select_detalleauto($id);
			
			$data['Titulo'] = 'Modificar Foto';
			$data['detallecoche'] = $detallecoche;
			$this->load->view('templates/header', $data);
			$this->load->view('automodificarfoto',$data);
			$this->load->view('templates/footer');
		}
		else {
			redirect('/login');			
		}
	}
	function subirfotos()
	{
		if($this->session->userdata('nombre'))
		{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
			$config['max_size'] = '2048';
			$config['overwrite'] = TRUE;
			$picauto1 =null;
			$picauto2 = null;
			$picauto3 = null;
		//******************************IMAGEN 1 PICTURE
		if($_FILES["bcarga4"]["name"] > "")
		{
			$ext = pathinfo($_FILES["bcarga4"]["name"], PATHINFO_EXTENSION);
			
			$picauto1 = hash('sha256', $this->input->post('cocheid')."1"); 
			$picauto1 =  $picauto1.".".$ext;
			$config['file_name'] = $picauto1;
			$this->load->library('upload', $config);
			
			if( ! $this->upload->do_upload('bcarga4'))
			{
				$error = array('error' => $this->upload->display_errors());	
				echo '<script>alert("Error intentando subir la foto de perfil: '.$error.'");</script>';		
			}
			else {
				$data = array(			
						'Foto' =>$picauto1,
						'num' => "1",
						'id' => $this->input->post('cocheid')
					);	
				if(!$this->Coche->uploadimage($data))
				{
					echo "<script>alert('error en la imagen 1')</script>";
		               $this->session->set_flashdata("message","Hubo un error!");
		               redirect('automodificarfoto/'.$this->input->post('cocheid'));
				}
				else {
					echo "TRUE";
				}
			}
		}
		//**************************END IMAGEN 1 PICTURE
		
		//*****************************IMAGEN 2 PICTURE
		if($_FILES["bcarga5"]["name"] > "")
		{
			$ext = pathinfo($_FILES["bcarga5"]["name"], PATHINFO_EXTENSION);
			$picauto2 = hash('sha256', $this->input->post('cocheid')."2"); 
			$picauto2 = $picauto2.".".$ext;
			$config['file_name'] = '';
			$config['file_name'] = $picauto2;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('bcarga5'))
			{
				$error = array('error' => $this->upload->display_errors());
				echo '<script>alert("Error intentando subir la foto de licencia: '.$error.'");</script>';	
			}
			else {
				$data = array(			
						'Foto' =>$picauto2,
						'num' => "2",
						'id' => $this->input->post('cocheid')
					);	
				if(!$this->Coche->uploadimage($data))
				{
					echo "<script>alert('error en la imagen 2')</script>";
		               $this->session->set_flashdata("message","Hubo un error!");
		               redirect('automodificarfoto/'.$this->input->post('cocheid'));
				}
				else {
					echo "TRUE";
				}
			}
		}
		//*****************************END IMAGEN 2 PICTURE
		
		//*****************************IMAGEN 3 PICTURE
		if($_FILES["bcarga6"]["name"] > "")
		{
			$ext = pathinfo($_FILES["bcarga6"]["name"], PATHINFO_EXTENSION);
			$picauto3 = hash('sha256', $this->input->post('cocheid')."3"); 
			$picauto3 = $picauto3.".".$ext;
			$config['file_name'] = '';
			$config['file_name'] = $picauto3;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('bcarga6'))
			{
				$error = array('error' => $this->upload->display_errors());
				echo '<script>alert("Error intentando subir la foto de licencia: '.$error.'");</script>';	
			}
			else {
				$data = array(			
						'Foto' =>$picauto3,
						'num' => "3",
						'id' => $this->input->post('cocheid')
						
					);	
				if(!$this->Coche->uploadimage($data))
				{
					echo "<script>alert('error en la imagen 3')</script>";
		               $this->session->set_flashdata("message","Hubo un error!");
		              redirect('automodificarfoto/'.$this->input->post('cocheid'));
				}
				else {
					echo "TRUE";
				}
			}
		}
		//************************END IMAGEN 3 PICTURE
		//
		}
		else {
			redirect('/login');			
		}
		//redirect('automodificarfoto/'.$this->input->post('cocheid'), 'refresh');		
	}
}
?>