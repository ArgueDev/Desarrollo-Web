<?php include 'includes/header.php';

// Incluir otras Clases

// require 'clases/Cliente.php';
// require 'clases/Detalles.php';

use App\Cliente;
use App\Detalles;

function mi_autoload($clase) {
    $partes = explode("\\", $clase);
    require __DIR__ . "/clases/" . $partes[1] . ".php";
}

spl_autoload_register('mi_autoload');

// class Cliente {
//     public function __construct() {
//         echo "Desde 08.php que contiene clientes";
//     }
// }

$detalles = new Detalles();
echo "<hr>";
$clientes = new Cliente();
echo "<hr>";
// $clientes2 = new Cliente();

include 'includes/footer.php';