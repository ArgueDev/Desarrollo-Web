<?php include 'includes/header.php';

// while
$i = 0;

while($i < 10){
    echo $i . "<br>";
    $i++;
}

// Do While
$j = 0;

do {
    echo $j . "<br>";
    $j++;
}while($j < 10);

// For loop
for($k = 0; $k < 10; $k++){
    echo $k . "<br>";
}

for($i = 0; $i < 100; $i++){
    if($i % 3 == 0 && $i % 5 == 0){
        echo $i . " - FizzBuzz <br/>";
    } else if($i % 3 == 0){
        echo $i . " - Fizz <br/>";
    } else if($i % 5 == 0){
        echo $i . " - Buzz <br/>";
    } else {
        echo $i . "<br/>";
    }
}

// For Each
$clientes = array('Pedro', 'Juan', 'Karen');

foreach($clientes as $cliente){
    echo $cliente . "<br>";
}

$cliente = [
    'nombre' => 'Juan',
    'saldo' => 200,
    'tipo' => 'Premium'
];

foreach($cliente as $key => $valor):
    echo $key . " - " . $valor . "<br>";
endforeach;

include 'includes/footer.php';