<?php

namespace Controllers;

use MVC\Router;

class CitaController
{
    public static function index(Router $router)
    {
        session_start();

        // Verificar si la clave 'nombre' existe en $_SESSION
        $nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null;

        $router->render('cita/index', [
            'nombre' => $nombre
        ]);
    }
}