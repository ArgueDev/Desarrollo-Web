<?php

namespace Controllers;

use Clases\Email;
use Model\Usuario;
use MVC\Router;

class LoginController {
    public static function login(Router $router) {
        $router->render('auth/login');
    }

    public static function logout() {
        echo 'Desde Logout';
    }

    public static function olvide(Router $router) {
        $router->render('auth/olvide-password',[]);
    }

    public static function recuperar() {
        echo 'Desde Recuperar Password';
    }

    public static function crear(Router $router) {

        $usuario = new Usuario();

        // Alertas Vacias
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario->sincronizar($_POST);

            $alertas = $usuario->validarNuevaCuenta();

            // Revisar que alertas este vacio
            if (empty($alertas)) {
                // Verificar que el usuario no este registrado
                $resultado = $usuario->existeUsuario();

                if ($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else { // No esta registrado
                    // Hashear el password
                    $usuario->hashPassword();

                    // Generar un token unico
                    $usuario->crearToken();

                    // Enviar el email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();

                    // Crear el Usuario
                    $resultado = $usuario->guardar();

                    if ($resultado) {
                        header('location: /mensaje');
                    }

                    // debuguear($usuario);
                    
                }
            }

        }

        $router->render('auth/crear-cuenta', [
           'usuario' => $usuario,
           'alertas' => $alertas
        ]);
    }

    public static function mensaje(Router $router) {
        $router->render('auth/mensaje');
    }

    public static function confirmar(Router $router) {

        $alertas = [];
        $token = clean($_GET['token']);

        $usuario = Usuario::where('token', $token);

        if (empty($usuario)) {
            // Mostrar mensaje de error
            Usuario::setAlerta('error', 'Token no valido');
        }else {
            // Modificar a usuario confirmado
            $usuario->confirmado = "1";
            $usuario->token = null;
            
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta Comprobada Correctamente');
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/confirmar-cuenta', [
            'alertas' => $alertas
        ]);
    }
    
}