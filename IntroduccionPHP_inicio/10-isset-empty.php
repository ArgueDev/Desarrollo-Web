<?php include 'includes/header.php';

$clientes = [
    'nombre' => 'Christian',
    'saldo' => 200
];
$clientes1 = [];
$clientes2 = array();
$clientes3 = array('Pedro', 'Juan', 'Karen');

// Empty - Revisa si un arreglo esta vacio
var_dump(empty($clientes1));
var_dump(empty($clientes3));
var_dump(empty($clientes2));

// Isset - Revisar si un arreglo esta creado o una propiedad esta definida
echo "<br>";
var_dump(isset($clientes4));
var_dump(isset($clientes3));
var_dump(isset($clientes2));
var_dump(isset($clientes1));

// Isset - Permite revisar si una propiedad de un arreglo asociativo, exite!
var_dump(isset($clientes['nombre']));
var_dump(isset($clientes['codigo']));


include 'includes/footer.php';