<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Ponente;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController {
    
    public static function index(Router $router) {

        if (!is_admin()) {
            header('location: /login');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if (!$pagina_actual || $pagina_actual < 1) {
            header('location: /admin/ponentes?page=1');
        }
        
        $registro_por_pagina = 5;
        $total = Ponente::total();

        $paginacion = new Paginacion($pagina_actual, $registro_por_pagina, $total);

        if ($paginacion->total_paginas() < $pagina_actual) {
            header('location: /admin/ponentes?page=1');
        }

        $ponentes = Ponente::paginar($registro_por_pagina, $paginacion->offset());

        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencistas',
            'ponentes' => $ponentes,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {
        if (!is_admin()) {
            header('location: /login');
        }

        $alertas = [];
        $ponente = new Ponente;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Leer imagen
            if (!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/ponentes';

                // Crear la carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            } 

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

            $ponente->sincronizar($_POST);

            // validar
            $alertas = $ponente->validar();

            // Guardar el registro
            if(empty($alertas)) {
                // Guardar imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');

                // Guardar en la BD
                $resulado = $ponente->guardar();

                if($resulado) {
                    header('location: /admin/ponentes');
                }
            }
        }

        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar Ponentes',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => json_decode($ponente->redes)
        ]);
    }

    public static function editar(Router $router) {
        if (!is_admin()) {
            header('location: /login');
        }

        $alertas = [];
        
        // Validar el ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('location: /admin/ponentes');
        }

        // Obtener ponente a editar
        $ponente = Ponente::find($id);

        if (!$ponente) {
            header('location: /admin/ponentes');
        }

        $ponente->imagen_actual = $ponente->imagen;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Leer imagen
            if (!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/ponentes';

                // Crear la carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $ponente->imagen_actual;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

            $ponente->sincronizar($_POST);

            $alertas = $ponente->validar();

            if (empty($alertas)) {
                if (isset($nombre_imagen)) {
                    // Guardar imagenes
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');
                }

                $resultado = $ponente->guardar();

                if ($resultado) {
                    header('location: /admin/ponentes');
                }
            }
        }

        $router->render('admin/ponentes/editar', [
            'titulo' => 'Editar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => json_decode($ponente->redes)
        ]); 
    }

    public static function eliminar() {
        if (!is_admin()) {
            header('location: /login');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $ponente = Ponente::find($id);

            if (!isset($ponente)) {
                header('location: /admin/ponentes');
            }

            $resultado = $ponente->eliminar();

            if ($resultado) {
                header('location: /admin/ponentes');
            }

        }
    }
}