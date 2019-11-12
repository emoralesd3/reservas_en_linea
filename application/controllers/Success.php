<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Success extends CI_Controller {

	public function __construct(){
		
        parent::__construct();
        //$this->load->library('email','pdf','Dompdf','dompdf');
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
        
        $dias = array(
            1 => "Lunes",
            2 => "Martes",
            3 => "Miércoles",
            4 => "Jueves",
            5 => "Viernes",
            6 => "Sábado",
            7 => "Domingo"
        );

        $precio_habitacion = 0;
        $dia_reservado = "";

        foreach ($precios as $key => $value) {
            if($key == $this->input->post('dia_hospedaje')){
                $precio_habitacion = $value;
            }
        }

        foreach ($dias as $key => $value) {
            if($key == $this->input->post('dia_hospedaje')){
                $dia_reservado = $value;
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
        $descripcion = $this->input->post('descripcion');

        $mensaje = "
            <center><h1>RL</h1></center>
            <h1>Hola, Estimado ".$nombre." ".$apellido."</h1>
            <hr>
            <h2>Los datos de su reservación son los siguientes</h2>
            <small>
                Día reservado: ".$dia_reservado."<br>
                Precio: ".$precio_habitacion." <br>
                Descripción: ".$descripcion."
            </small>
        ";

        $this->enviarMail($email, $mensaje);

        $datos = array($id_habitacion,$nombre,$apellido,$dpi,$email,$telefono,$direccion,$precio_habitacion,$dia_hospedaje);
        $this->ReservarModel->guardarReservacion($datos);
        
        $this->load->view('success');
    }
    
    public function enviarMail($email,$mensaje){
        //Cargamos la librería email
        
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'tommyvargas71@gmail.com', //Su Correo de Gmail Aqui
            'smtp_pass' => '30182131', // Su Password de Gmail aqui
            'smtp_port' => '587',
            'smtp_crypto' => 'tls',
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );
        
        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        //Ponemos la dirección de correo que enviará el email y un nombre
        $this->email->from('tommyvargas71@gmail.com', 'RL-ADMIN');
            
        /*
        * Ponemos el o los destinatarios para los que va el email
        * en este caso al ser un formulario de contacto te lo enviarás a ti
        * mismo
        */
        $this->email->to($email);
        
        //Definimos el asunto del mensaje
        $this->email->subject("Confirmación de su recepción");
        
        //Definimos el mensaje a enviar
        $this->email->message($mensaje);

        //enviamos el correo
        $this->email->send();
    }
}
