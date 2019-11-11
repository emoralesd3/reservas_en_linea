<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('ReservarModel');
	}

	public function index()
	{
        $data['reservaciones'] = $this->ReservarModel->obtenerReservaciones();
		$this->load->view('/admin/index', $data);
	}
}
