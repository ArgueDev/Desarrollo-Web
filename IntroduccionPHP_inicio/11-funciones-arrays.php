<?php include 'includes/header.php';

// in_array - buscar elementos en un arreglo
$carrito = ['Tablet', 'Computadora', 'Television'];
var_dump(in_array('Tablet', $carrito));

// Ordenar elementos de un arreglo
$numeros = array(1, 3, 4, 5, 0, 2);
sort($numeros); // De menor a mayor
rsort($numeros); // De mayor a menor

echo "<pre>";
var_dump($numeros);
echo "<pre>";

// Ordenar areglo asociativo
$cliente = array(
    'saldo' => 200,
    'tipo' => 'Premium',
    'nombre' => 'Juan'
);

asort($cliente); // Ordena por valores (orden alfabetico)
arsort($cliente); // Ordena por valores (orden alfabetico, de la Z a la A)
ksort($cliente); // Ordena por llaves (orden alfabetico)
krsort($cliente); // Ordena por llaves (orden alfabetico, de la Z a la A)

echo '<pre>';
var_dump($cliente);
echo '<pre>';



include 'includes/footer.php';