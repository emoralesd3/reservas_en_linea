<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url', 'form');
		$this->load->model('ReservarModel');
	}

	public function index()
	{
		if($this->session->userdata('logueado')){
            $this->logueado();
        }else{
			$this->load->view('/admin/index');
        }
	}

	public function reservaciones_ok()
	{
		$data['reservaciones'] = $this->ReservarModel->obtenerReservaciones();
		$this->load->view('/admin/reservaciones_ok', $data);
	}

	public function login()
    {
        $usuario    = $this->input->post('usuario');
        $pass       = $this->input->post('password');

        if($usuario == 'admin' && $pass == 'admin')
        {
			$datos = $arrayName = array(
				'nombre' => "Administrador", 
				'usuario' => "Admin", 
				'logueado' => TRUE 
			);
            $this->session->set_userdata($datos);
            $this->logueado();
        }
        else
        {
            $data['mensaje'] = "Error verifica tus credenciales";
            $this->load->view('/admin/index', $data);
        }
    }

	public function logueado(){
        if($this->session->userdata('logueado'))
        {            
            $this->reservaciones_ok();
        }
        else
        {
            $this->cerrar_sesion();
        }
	}
	
	public function cerrar_sesion(){
        $datos = array(
            'logueado' => FALSE
        );
        $this->session->set_userdata($datos);
        redirect(base_url().'index.php/admin/');
    }
}
