<?php include 'includes/header.php';

interface TransporteInterfaz {
    public function getInfo(): string;
    public function getRuedas(): int;
    // public function getColor(): string;
}

class Transporte implements TransporteInterfaz {
    public function __construct(protected int $ruedas, protected int $capacidad)
    {
    }

    public function getInfo(): string {
        return "El transporte tiene " . $this->ruedas . " ruedas y una capacidad de " . $this->capacidad . " personas";
    }

    public function getRuedas(): int {
        return $this->ruedas;
    }
}

class Automovil extends Transporte implements TransporteInterfaz {
    public function __construct(protected int $ruedas, protected int $capacidad, protected string $color){}

    public function getInfo(): string {
        return "El transporte Auto tiene " . $this->ruedas . " ruedas y una capacidad de " . $this->capacidad . " personas y tiene un color " . $this->color;
    }
}

echo '<pre>';

var_dump($transporte = new Transporte(8, 20));
var_dump($auto = new Automovil(4, 4, 'Negro'));

echo $transporte->getInfo();
echo "<hr>";

echo $auto->getInfo();
echo "<hr>";

echo '<pre>';

include 'includes/footer.php';