<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;

class PaginasController {

    public static function index(Router $router) {
        $propieades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propieades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router) {
        $router->render('paginas/nosotros');
    }

    public static function propiedades() {
        echo "Pagina Propiedades";
    }

    public static function propiedad() {
        echo "Pagina Propiedad";
    }

    public static function blog() {
        echo "Pagina Blog";
    }

    public static function entrada() {
        echo "Pagina Entrada";
    }
    
    public static function contacto() {
        echo "Pagina Contacto";
    }
}