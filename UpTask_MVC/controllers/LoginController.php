<?php

namespace Controllers;

use Clases\Email;
use Model\Usuario;
use MVC\Router;

class LoginController {
    public static function login(Router $router) {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {}

        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesion'
        ]);
    }

    public static function logout() {
        echo 'desde logout';
    }

    public static function crear(Router $router) {

        $alertas = [];
        $usuario = new Usuario;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();
            
            if(empty($alertas)) {
                $existeUsuario = Usuario::where('email', $usuario->email);

                if($existeUsuario) {
                    Usuario::setAlerta('error', 'El Usuario ya esta registrado');
                    $alertas = Usuario::getAlertas();

                } else {
                    /** Hashear el password */
                    $usuario->hashPassword();

                    /** Eliminar Password2 */
                    unset($usuario->password2);

                    /** Generar el token */
                    $usuario->crearToken();

                    /** Crear nuevo usuario */
                    $resultado = $usuario->guardar();

                    /** Enviar Email */
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();

                    if ($resultado) {
                        header('location: /mensaje');
                    }
                }

            }

        }

        $router->render('auth/crear', [
            'titulo' => 'Crear Cuenta',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function olvide(Router $router) {
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario($_POST);
            $alertas = $usuario->validarEmail();

            if (empty($alertas)) {
                /** Buscar el usuario */
                $usuario = Usuario::where('email', $usuario->email);

                if ($usuario && $usuario->confirmado) {
                    /** Generar un nuevo token */
                    $usuario->crearToken();
                    unset($usuario->password2);

                    /** Actualizar el usuario */
                    $usuario->guardar();

                    /** Enviar el email */
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarInstrucciones();

                    /** Imprimir la alerta */
                    Usuario::setAlerta('exito', 'Hemos enviado las instrucciones a tu email');

                } else {
                    Usuario::setAlerta('error', 'El Usuario no existe o no esta confirmado');
                    
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/olvide', [
            'titulo' => 'Recuperar Password',
            'alertas' => $alertas
        ]);
    }

    public static function reestablecer(Router $router) {

        $token = clean($_GET['token']);
        $alertas = [];
        $mostrar = true;

        if (!$token) header('location: /');

        /** Identificar el usuario con este token */
        $usuario = Usuario::where('token', $token);

        if (empty($usuario)) {
            Usuario::setAlerta('error', 'Token no valido');
            $mostrar = false;
        }
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            /** Agregar el nuevo password */
            $usuario->sincronizar($_POST);

            /** Validar el password */
            $alertas = $usuario->validarPassword();

            if (empty($alertas)) {
                /** Hasear Password */
                $usuario->hashPassword();

                /** Eliminar el token */
                $usuario->token = null;

                /** Guardar el usuario a la bd */
                $resultado = $usuario->guardar();

                /** Redireccionar */
                if ($resultado) {
                    header('location: /');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/reestablecer', [
            'titulo' => 'Reestablecer Password',
            'alertas' => $alertas,
            'mostrar' => $mostrar
        ]);
    }

    public static function mensaje(Router $router) {
        $router->render('auth/mensaje', [
            'titulo' => 'Confirmacion'
        ]);
    }

    public static function confirmar(Router $router) {
        $token = clean($_GET['token']);

        if(!$token) header('location: /');

        /** Encontrar al usuario con el token */
        $usuario = Usuario::where('token', $token);

        if(empty($usuario)) {
            /** No se encontro un usuario con el token */
            Usuario::setAlerta('error', 'Token no Valido');
        } else {
            /** Confirmar la Cuenta */
            $usuario->confirmado = 1;
            $usuario->token = null;
            unset($usuario->password2);

            /** Guardar en la BD */
            $usuario->guardar();

            Usuario::setAlerta('exito', 'Cuenta Comprobada Correctamente');
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/confirmar', [
            'titulo' => 'Confirmado',
            'alertas' => $alertas
        ]);
    }
}