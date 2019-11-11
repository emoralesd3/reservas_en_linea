<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Success extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('ReservarModel');
	}

	public function index()
	{
        $precios = array(
            1 => $this->input->post('precio_semanal'),
            2 => $this->input->post('precio_semanal'),
            3 => $this->input->post('precio_semanal'),
            4 => $this->input->post('precio_semanal'),
            5 => $this->input->post('precio_semanal'),
            6 => $this->input->post('precio_fin'),
            7 => $this->input->post('precio_fin')
        );

        $precio_habitacion = 0;

        foreach ($precios as $key => $value) {
            if($key == $this->input->post('dia_hospedaje')){
                $precio_habitacion = $value;
            }
        }
        $id_habitacion = $this->input->post('id_habitacion');
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $dpi = $this->input->post('dpi');
        $email = $this->input->post('mail');
        $telefono = $this->input->post('tel');
        $direccion = $this->input->post('direccion');
        $dia_hospedaje = $this->input->post('dia_hospedaje');

        $datos = array($id_habitacion,$nombre,$apellido,$dpi,$email,$telefono,$direccion,$precio_habitacion,$dia_hospedaje);
        $this->ReservarModel->guardarReservacion($datos);

		$this->load->view('success');
	}
}
