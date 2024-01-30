<?php include 'includes/header.php';

$cliente = [
    'nombre' => 'Christian',
    'saldo' => 200,
    'informacion' => [
        'tipo' => 'Premim',
        'disponible' => 100
    ]
];

echo "<pre>";
var_dump($cliente);
echo "<pre>";

// echo $cliente['nombre'];
// echo $cliente['informacion']['tipo'];

$cliente['codigo'] = 23065434;

echo "<pre>";
var_dump($cliente);
echo "<pre>";


include 'includes/footer.php';