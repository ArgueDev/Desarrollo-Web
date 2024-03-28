<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer; 

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

    public static function propiedades(Router $router) {
        $propieades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propieades
        ]);
    }

    public static function propiedad(Router $router) {
        $id = validarORedireccionar('/propiedades');
        $propiead = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiead
        ]);
    }

    public static function blog(Router $router) {
        $router->render('paginas/blog');
    }

    public static function entrada(Router $router) {
        $router->render('paginas/entrada');
    }
    
    public static function contacto(Router $router) {

        $mensaje = null;

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $nombre = $_POST['nombre'];
            $email = $_POST['email'] ?? null;
            $telefono = $_POST['telefono'] ?? null;
            $mensaje = $_POST['mensaje'];
            $tipo = $_POST['tipo'];
            $precio = $_POST['precio'];
            $contacto = $_POST['contacto'];
            $fecha = $_POST['fecha'] ?? null;
            $hora = $_POST['hora'] ?? null;

            // Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '3556eb0348b55f';
            $mail->Password = 'd722126bca5c5d';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // Configurar el contenido del mail
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p> Tienes un nuevo Mensaje </p>';
            $contenido .= '<p> Nombre: ' . $nombre .  ' </p>';

            // Enviar de forma condicional algunos campos de email o telefono
            if ($telefono) {
                $contenido .= '<p> Eligio ser contactado por telefono: </p>';
                $contenido .= '<p> Telefono: ' . $telefono .  ' </p>';
                $contenido .= '<p> Fecha Contacto: ' . $fecha .  ' </p>';
                $contenido .= '<p> Hora Contacto: ' . $hora .  ' </p>';
            } else {
                // Es email, entonces agregamos el campo email
                $contenido .= '<p> Eligio ser contactado por email: </p>';
                $contenido .= '<p> Email: ' . $email .  ' </p>';
            }
            
            $contenido .= '<p> Mensaje: ' . $mensaje .  ' </p>';
            $contenido .= '<p> Vende o Compra: ' . $tipo .  ' </p>';
            $contenido .= '<p> Precio o Presupuesto: $' . $precio .  ' </p>';
            $contenido .= '<p> Prefiere ser contactado por: ' . $contacto .  ' </p>';
            
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            // Enviar el email
            if ($mail->send()){
                $mensaje = "Mensaje Enviado Correctamente";
            } else {
                $mensaje = "Mensaje no se pudo enviar";
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}