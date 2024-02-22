<?php 

include 'includes/header.php';

// Encapsulasion 

class Producto {

    // Public - Se puede acceder y modificar en cualquier lugar (clase y objeto)
    // protected - Se puede acceder / modificar unicamente en la clase
    // private - Solo miembros de la misma clase pueden acceder a el

    public function __construct(protected string $nombre, public int $precio, public bool $disponible){}

    public function mostrarProducto(){
        echo "El producto es: " . $this -> nombre . ", y su precio es de: " . $this -> precio;
    }

    public function getNombre() {
        return $this -> nombre;
    }

    public function setNombre(string $nombre) {
        $this -> nombre = $nombre;
    }
}

$producto = new Producto('Tablet', 200, 2);

$producto -> mostrarProducto();

echo $producto -> getNombre();
$producto -> setNombre('Nuevo Nombre');

echo '<pre>';
var_dump($producto);
echo '<pre>';

$producto2 = new Producto('Monitor', 300, true);

$producto2 -> mostrarProducto();

echo '<pre>';
var_dump($producto2);
echo '<pre>';

include 'includes/footer.php';