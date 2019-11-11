<?php
class HabitacionesModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function habitaciones_disponibles($personas, $ninos)
    {
        $sql = "SELECT habitaciones.id, habitaciones.descripcion info, precio_fin_semana, precio_semanal, tipo_habitacion.descripcion tipo
                FROM habitaciones
                LEFT JOIN tipo_habitacion ON habitaciones.id_tipo_habitacion=tipo_habitacion.id
                WHERE cantidad_personas=$personas OR cantidad_ninos=$ninos AND estado=0";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
?>