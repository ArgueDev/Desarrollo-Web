<?php include 'includes/header.php';

$nombreCliente = "Juan Pablo";

// Conocer extension de un string
echo strlen($nombreCliente);
var_dump($nombreCliente);

// Eliminar espacios en blanco
$texto = trim($nombreCliente);
echo strlen($texto);

// Convertir a Mayuscula
echo strtoupper($nombreCliente);

// Convertir a minuscula
echo strtolower($nombreCliente);


$email1 = "correo@correo.com";
$email2 = "Correo@correo.com";
var_dump(strtolower($email1) === strtolower($email2));

echo str_replace('Juan', 'J', $nombreCliente);

// Revisar si un string existe o no
echo strpos($nombreCliente, 'Pedro');

$tipoCliente = "Premium";
echo "<br>";
echo "El Cliente " . $nombreCliente . " es " . $tipoCliente;

include 'includes/footer.php';