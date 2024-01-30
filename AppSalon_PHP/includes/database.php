<?php

$db = mysqli_connect('localhost', 'root', 'root', 'appsalon');

if(!$db){
    echo 'Conexion Error';
    exit;
}

?>