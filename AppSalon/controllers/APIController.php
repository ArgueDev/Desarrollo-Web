<?php 

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;

class APIController {
    public static function index() {
        $servicio = Servicio::all();
        echo json_encode($servicio);
    }

    public static function guardar() {
        /** ALmacena la cita y devuelve el id */
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();
        $id = $resultado['id'];

        /** Almacena la cita y el servicio */
        $idServicios = isset($_POST['servicios']) ? explode(",", $_POST['servicios']) : [];

        foreach ($idServicios as $idServicio) {
            if (is_numeric($idServicio)) {
                $args = [
                    'cita_id' => $id,
                    'servicio_id' => (int) $idServicio // Convertir a entero
                ];
                $citaServicio = new CitaServicio($args);
                $citaServicio->guardar();
            }
        }

        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            if (filter_var($id, FILTER_VALIDATE_INT)) {
                $cita = Cita::find($id);
            }

            if ($cita) {
                $cita->eliminar();
            }

            header('location:' . $_SERVER['HTTP_REFERER']);
        }
    }   
}