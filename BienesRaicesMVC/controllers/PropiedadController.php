<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {

    public static function index(Router $router) {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }

    public static function crear(Router $router) {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();

        // Arreglo con mensaje de errores
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            $propiedad = new Propiedad($_POST['propiedad']);
    
            /** Subida de Archivos */
            // Generar Nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            
            // Realiza un resize a la imagen con intervention
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
            
            // Validamos
            $errores = $propiedad->validar();
            
            // Revisar que el arreglo de errores este vacio
            if(empty($errores)){
                
                // Crear carpeta 
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                
                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                
                // Guardar en la Base de Datos
                $resultado = $propiedad->guardar();
            }
    
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = validarORedireccionar('/admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();

        $errores = Propiedad::getErrores();

        // Ejecucion del codigo despues de que el usuario envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los atributos
            $args = $_POST['propiedad'];

            $propiedad->sincronizar($args);
            
            // Validacion
            $errores = $propiedad->validar();

            // Subida de archivos
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                // Ajustar la imagen
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);

                //Asignar el nombre de la imagen a la propiedad
                $propiedad->setImagen($nombreImagen);
            }

            // Revisar que el arreglo de errores este vacio
            if(empty($errores)){

                if($_FILES['propiedad']['tmp_name']['imagen']) {
                    // Almacenar la imagen
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                
                $propiedad->cambios();
            }
        }

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad, 
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);

    }

    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }   
        }
    }
}