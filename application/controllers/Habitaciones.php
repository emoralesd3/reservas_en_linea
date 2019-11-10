<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Habitaciones extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('HabitacionesModel');
	}

	public function index()
	{
		$cantidad_personas = $this->input->post('cantidad_personas');
		$cantidad_ninos = $this->input->post('cantidad_ninos');
		$data['habitaciones_disponibles'] = $this->HabitacionesModel->habitaciones_disponibles($cantidad_personas,$cantidad_ninos);

		//var_dump($data);
		$this->load->view('reservas', $data);
	}
}
