<?php include 'includes/header.php';

$carrito = ["Tablet", "Computadora", "Celular"];

// Util para ver los contenidos de un array
echo "<pre>";
var_dump($carrito);
echo "<pre>";

// Acceder a un elemento del array
echo $carrito[2];

// Añade un elemento en el indice 3 del arreglo
$carrito[3] = 'Nuevo Producto';

// Añadir un elemento nuevo al final
array_push($carrito, 'Audifonos');

echo "<pre>";
var_dump($carrito);
echo "<pre>";

// Añadir al inicio
array_unshift($carrito, 'SmartWatch');

echo "<pre>";
var_dump($carrito);
echo "<pre>";


include 'includes/footer.php';