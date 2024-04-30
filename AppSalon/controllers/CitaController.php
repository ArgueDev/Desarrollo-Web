<?php

namespace Controllers;

use MVC\Router;

class CitaController
{
    public static function index(Router $router)
    {
        session_start();

        isAuth();

        /** Verificar si las clave existe en $_SESSION */
        $router->render('cita/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ]);
        // $nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null;
        // $id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

        // $router->render('cita/index', [
        //     'nombre' => $nombre,
        //     'id' => $id
        // ]);
    }
}