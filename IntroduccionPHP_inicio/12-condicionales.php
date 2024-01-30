<?php include 'includes/header.php';


$autenticado = false;

if($autenticado){
    echo 'Ususario Autenticado';
}else{
    echo 'No existe el Usuario';
}

echo "<br>";
// If anidados
$cliente = [
    'nombre' => 'Juan',
    'saldo' => 200,
    'informacion' => [
        'tipo' => 'Premim'
    ]
];

if(!empty($cliente)){
    echo "El arreglo de cliente no esta vacio, ";

    if($cliente['saldo'] > 0){
        echo "El cliente tiene saldo disponible";
    }else {
        echo "No hay saldo";
    }
}

// else if
echo "<br>";
if($cliente['saldo'] > 0){
    echo "El cliente tiene saldo";
}else if ($cliente['informacion']['tipo'] === 'Premium'){
    echo "El cliente es Premium";
}else {
    echo "No hay cliente definido o no tiene saldo o no es premium";
}

// Switch
echo "<br>";
$tecnologia = 'HTML';

switch($tecnologia){
    case 'PHP': 
        echo "PHP, un excelente lenguaje";
        break;
    case 'JavaScript':
        echo "Genia, lenguaje de la web";
        break;
    case 'HTML':
        echo "WEB";
        break;
    default:
        echo "No hay lenguaje";
        break;


}

include 'includes/footer.php';