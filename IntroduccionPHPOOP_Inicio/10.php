<?php include 'includes/header.php';

// Conectar a la BD con PDO
$db = new PDO('mysql:host=localhost; dbname=bienesraices_crud', 'root', 'root');
$query = "SELECT titulo FROM propiedades";

$stmt = $db->prepare($query);

$stmt->execute();

$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
var_dump($resultado);
echo '<pre>';

include 'includes/footer.php';