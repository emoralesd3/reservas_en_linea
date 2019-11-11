<?php
class ReservarModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getHabitacion($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('habitaciones');
        if($query->num_rows()>0) return $query;
        else return false;        
    }

    public function guardarReservacion($datos)
    {
        $data = array(
            'id_habitacion' => $datos[0],
            'nombre' => $datos[1],
            'apellido' => $datos[2],
            'dpi' => $datos[3],
            'email' => $datos[4],
            'telefono' => $datos[5],
            'direccion' => $datos[6],
            'precio' => $datos[7],
            'dia_hospedaje' => $datos[8]
        );
        return $this->db->insert('reservacion', $data);
    }
}
?>