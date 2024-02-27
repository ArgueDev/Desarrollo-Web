<?php include 'includes/header.php';

// Conectar a la BD con Mysqli
$db = new mysqli('localhost', 'root', 'root', 'bienesraices_crud');

//Creamos el query
$query = "SELECT titulo, imagen FROM propiedades";

// Lo preparamos
$stmt = $db->prepare($query);

// Lo ejecutamos
$stmt->execute();

// Creamos la variable
$stmt->bind_result($titulo, $imagen);

// Asignamos el resultado
$stmt->fetch();

// Imprimimos el resultado
echo '<pre>';
var_dump($titulo);
echo '<pre>';

echo '<pre>';
var_dump($imagen);
echo '<pre>';

include 'includes/footer.php';