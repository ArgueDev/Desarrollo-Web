<?php

namespace Controllers;

use Model\Proyecto;
use MVC\Router;

class DashboardController {
    
    public static function index(Router $router) {
        session_start();

        isAuth();

        $router->render('dashboard/index', [
            'titulo' => 'Proyectos'
        ]);
    }

    public static function crearProyecto(Router $router) {
        session_start();
        isAuth();

        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $proyecto = new Proyecto($_POST);
            
            /** Validacion */
            $alertas = $proyecto->validarProyecto();

            if (empty($alertas)) {
                /** Generar un url unica */
                $hash = md5(uniqid());
                $proyecto->url = $hash;

                /** Almacenar el creador del proyecto */
                $proyecto->propietario_id = $_SESSION['id'];

                /** Guardar Proyecto */
                $proyecto->guardar();

                /** Redireccionar */
                header('location: /proyecto?url=' . $proyecto->url);
            }
        }

        $router->render('dashboard/crear-proyecto', [
            'titulo' => 'Crear Proyecto',
            'alertas' => $alertas
        ]);
    }

    public static function perfil(Router $router) {
        session_start();

        isAuth();

        $router->render('dashboard/perfil', [
            'titulo' => 'Perfil'
        ]);
    }
}