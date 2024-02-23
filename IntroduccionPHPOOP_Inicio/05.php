<?php include 'includes/header.php';

// Abstractas
abstract class Transporte {
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

class Bicicleta extends Transporte {
    public function getInfo(): string {
        return "El transporte tiene " . $this->ruedas . " ruedas y una capacidad de " . $this->capacidad . " personas y no gasta gasolina";
    }
}

class Automivil extends Transporte {
    public function __construct(protected int $ruedas, protected int $capacidad, protected string $transmision)
    {
    }

    public function getTransmision(): string {
        return $this->transmision;
    }
}

// $transporte = new Transporte(1, 3);
// echo $transporte->getInfo();

// echo "<hr>";

$bicicleta = new Bicicleta(2, 1);
echo $bicicleta->getInfo();
echo $bicicleta->getRuedas();

echo "<hr>";

$automovil = new Automivil(4, 5, 'manual');
echo $automovil->getInfo() . " y una transmision " . $automovil->getTransmision();


echo "<hr>";


include 'includes/footer.php';