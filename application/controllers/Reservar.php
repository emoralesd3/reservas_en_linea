<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservar extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('ReservarModel');
	}

	public function index()
	{
		$id_habitacion = $this->uri->segment(2);
		$data['habitacion'] = $this->ReservarModel->getHabitacion($id_habitacion);
		$this->load->view('reservar', $data);
	}
}
