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

        //$this->enviarMail();
        $this->reportePDF();

        //$datos = array($id_habitacion,$nombre,$apellido,$dpi,$email,$telefono,$direccion,$precio_habitacion,$dia_hospedaje);
        //$this->ReservarModel->guardarReservacion($datos);
        
		//$this->load->view('success');
    }

    public function reportePDF()
    {
        $this->load->view('welcome_message');

        $this->load->library('Dompdf','dompdf');

        // Get output html
        $html = $this->output->get_output();
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    }
    
    public function enviarMail(){
        //Cargamos la librería email
        
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.office365.com',
            'smtp_user' => 'empleo@mintrabajo.gob.gt', //Su Correo de Gmail Aqui
            'smtp_pass' => '2890145354SNEmoralesd3!', // Su Password de Gmail aqui
            'smtp_port' => '587',
            'mailtype' => 'html',
            'wordwrap' => TRUE,
            'charset' => 'utf-8'
        );
        
        $this->load->library('email',$config);
    //Ponemos la dirección de correo que enviará el email y un nombre
    $this->email->from('empleo@mintrabajo.gob.gt');
         
    /*
     * Ponemos el o los destinatarios para los que va el email
     * en este caso al ser un formulario de contacto te lo enviarás a ti
     * mismo
     */
      $this->email->to('elvinmorales48@gmail.com');
       
    //Definimos el asunto del mensaje
      $this->email->subject("Prueba de mail con smtp");
       
    //Definimos el mensaje a enviar
      $this->email->message("esto es una prueba de envio de correos por smtp");
       
      //Enviamos el email y si se produce bien o mal que avise con una flasdata
      if($this->email->send()){
          echo "enviado";
      }else{
          echo "no enviado";
          echo "error: ".$this->email->print_debugger(array('headers'));
      }
        /*$from = "elvinmorales48@gmail.com";
        $to = "rosaliomorales95@gmail.com";
        $subject = "Checking PHP mail";
        $message = "PHP mail works just fine";
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
        $headers = "From:" . $from;
        mail($to,$subject,$message,$headers);
        var_dump(mail($to,$subject,$message,$headers));*/
    }
}
