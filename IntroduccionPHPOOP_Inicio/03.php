<?php 

include 'includes/header.php';

// Metodos Estaticos

class Producto {

    public $imagen;
    public static $imagenPlaceholder = "Imagen.jpg";

    public function __construct(protected string $nombre, public int $precio, public bool $disponible, string $imagen)
    {
        if ($imagen) {
            self::$imagenPlaceholder = $imagen;
        }
    }

    public static function ObtenerImagenProducto() {
        return self::$imagenPlaceholder;
    }

    public static function obtenerProducto() {
        echo "Obteniendo datos del Producto...";
    }

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

// echo "<br>";
// echo Producto::obtenerProducto();
// echo "<br>";

$producto = new Producto('Tablet', 200, 2, '');

// $producto -> mostrarProducto();

echo $producto->obtenerImagenProducto();


echo $producto -> getNombre();
$producto -> setNombre('Nuevo Nombre');

echo '<pre>';
var_dump($producto);
echo '<pre>';

$producto2 = new Producto('Monitor', 300, true, 'monitorCurvo.jpg');

// $producto2 -> mostrarProducto();

echo $producto2->obtenerImagenProducto();


// echo '<pre>';
// var_dump($producto2);
// echo '<pre>';

include 'includes/footer.php';