<?php

namespace Controllers;

use MVC\Router;

class CitaController
{
    public static function index(Router $router)
    {
        session_start();

        /** Verificar si las clave existe en $_SESSION */
        $nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null;
        $id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

        $router->render('cita/index', [
            'nombre' => $nombre,
            'id' => $id
        ]);
    }
}