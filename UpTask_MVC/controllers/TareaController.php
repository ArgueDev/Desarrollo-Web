<?php 

namespace Controllers;

use Model\Proyecto;
use Model\Tarea;

class TareaController {
    public static function index() {
        session_start();
        $proyectoId = $_GET['id'];

        if (!$proyectoId) header('location: /dashboard');

        $proyecto = Proyecto::where('url', $proyectoId);

        if (!$proyecto || $proyecto->propietario_id !== $_SESSION['id']) header('location: /404');

        $tareas = Tarea::belongsTo('proyecto_id', $proyecto->id);

        echo json_encode(['tareas' => $tareas]);
    }

    public static function crear() {

        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $proyectoID = $_POST['proyecto_id'];

            $proyecto = Proyecto::where('url', $proyectoID);

            if (!$proyecto || $proyecto->propietario_id !== $_SESSION['id']) {
                $respuesta = [
                    'tipo' => 'error',
                    'mensaje' => 'Hubo un error al agregar la tarea'
                ];
                echo json_encode($respuesta);
                return;
            }

            // Instanciar y crear la tarea
            $tarea = new Tarea($_POST);
            $tarea->proyecto_id = $proyecto->id;
            $resultado = $tarea->guardar();
            $respuesta = [
                'tipo' => 'exito',
                'id' => $resultado['id'],
                'mensaje' => 'Tarea agregada correctamente',
                'proyecto_id' => $proyecto->id
            ];
            echo json_encode($respuesta);

        }
    }

    public static function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            // Validar que el proyecto exista
            $proyecto = Proyecto::where('url', $_POST['proyecto_id']);

            if (!$proyecto || $proyecto->propietario_id !== $_SESSION['id']) {
                $respuesta = [
                    'tipo' => 'error',
                    'mensaje' => 'Hubo un error al actualizar la tarea'
                ];
                echo json_encode($respuesta);
                return;
            }

            $tarea = new Tarea($_POST);
            $tarea->proyecto_id = $proyecto->id;

            $resultado = $tarea->guardar();

            if ($resultado) {
                $respuesta = [
                    'tipo' => 'exito',
                    'id' => $tarea->id,
                    'proyecto_id' => $proyecto->id,
                    'mensaje' => 'Actualizado Correctamente'
                ];

                echo json_encode(['respuesta' => $respuesta]);
            }
        }
    }

    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            // Validar que el proyecto exista
            $proyecto = Proyecto::where('url', $_POST['proyecto_id']);

            if (!$proyecto || $proyecto->propietario_id !== $_SESSION['id']) {
                $respuesta = [
                    'tipo' => 'error',
                    'mensaje' => 'Hubo un error al eliminar la tarea'
                ];
                echo json_encode($respuesta);
                return;
            }

            $tarea = new Tarea($_POST);
            $tarea->proyecto_id = $proyecto->id;

            $resultado = $tarea->eliminar();

            if ($resultado) {
                $respuesta = [
                    'tipo' => 'exito',
                    'id' => $tarea->id,
                    'proyecto_id' => $proyecto->id,
                    'mensaje' => 'Eliminado Correctamente'
                ];

                echo json_encode(['respuesta' => $respuesta]);
            }

        }
    }
}