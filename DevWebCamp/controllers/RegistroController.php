<?php 

namespace Controllers;

use Model\Paquete;
use Model\Registro;
use Model\Usuario;
use MVC\Router;

class RegistroController {

    public static function crear(Router $router) {
        if (!is_auth()){
            header('location: /');
        }

        // Verificar si el usuario ya esta registrado
        $registro = Registro::where('usuario_id', $_SESSION['id']);

        if (isset($registro) && $registro->paquete_id === '3') {
            header('location: /boleto?id=' . urlencode($registro->token));
        }

        $router->render('registro/crear', [
            'titulo' => 'Finalizar Registro'
        ]);
    }

    public static function gratis() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (!is_auth()) {
                header('location: /login');
            }

            // Verificar si el usuario ya esta registrado
            $registro = Registro::where('usuario_id', $_SESSION['id']);

            if (isset($registro) && $registro->paquete_id === '3') {
                header('location: /boleto?id=' . urlencode($registro->token));
            }

            $token = substr(md5(uniqid(rand(), true)), 0, 8);

            // Crear registro
            $datos = array(
                'paquete_id' => 3,
                'pago_id' => '',
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            );

            $registro = new Registro($datos);
            
            $resultado = $registro->guardar();

            if ($resultado) {
                header('location: /boleto?id=' . urlencode($registro->token));
            }
        }
    }

    public static function boleto(Router $router) {
        // Validar la Url
        $id = $_GET['id'];

        if (!$id || !strlen($id) === 8) {
            header('location: /');
        }

        // buscarlo en la BD
        $registro = Registro::where('token', $id);

        if (!$registro) {
            header('location: /');
        }

        // Lenar las tablas de referencia
        $registro->usuario = Usuario::find($registro->usuario_id);
        $registro->paquete = Paquete::find($registro->paquete_id);

        $router->render('registro/boleto', [
            'titulo' => 'Asistencia a DevWebCamp',
            'registro' => $registro
        ]);
    }

    public static function pagar() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (!is_auth()) {
                header('location: /login');
            }

            // Validar que Post no venga vacio
            if (empty($_POST)) {
                echo json_encode([]);
                return;
            }

            // Crear el registro
            $token = substr(md5(uniqid(rand(), true)), 0, 8);
            $datos = $_POST;
            $datos['token'] = $token;
            $datos['usuario_id'] = $_SESSION['id'];

            
            try {
                $registro = new Registro($datos);
                $resultado = $registro->guardar();
                echo json_encode($resultado);
            } catch (\Throwable $th) {
                echo json_encode([
                    'resultado' => 'error'
                ]);
            }
        }
    }
}