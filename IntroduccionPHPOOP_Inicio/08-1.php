<?php
include 'includes/header.php';

require 'vendor/autoload.php';

use App\Cliente;
use App\Detalles;

$detalles = new Detalles();
$clientes = new Cliente();

include 'includes/footer.php';