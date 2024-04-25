<?php

namespace Model;

class CitaServicio extends ActiveRecord {
    protected static $tabla = 'citasservicios';
    protected static $columnasDB = ['id', 'servicio_id', 'cita_id'];

    public $id;
    public $servicio_id;
    public $cita_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->servicio_id = $args['servicio_id'] ?? '';
        $this->cita_id = $args['cita_id'] ?? '';    
    }
}