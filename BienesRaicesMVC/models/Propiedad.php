<?php

namespace Model;

class Propiedad extends ActiveRecord {
  protected static $tabla = 'propiedades';
  protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

  // Propiedades
  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $habitaciones; 
  public $wc;
  public $estacionamiento;
  public $creado;
  public $vendedores_id;

  public function __construct($args = []) {
    $this->id = $args['id'] ?? '';
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->descripcion = $args['descripcion'] ?? '';
    $this->habitaciones = $args['habitaciones'] ?? '';
    $this->wc = $args['wc'] ?? '';
    $this->estacionamiento = $args['estacionamiento'] ?? '';
    $this->creado = date('Y-m-d');
    $this->vendedores_id = $args['vendedores_id'] ?? '';
  }

  // Validacion
  public function validar() {
    $errores = [];

    $titulo = $this->titulo;
    $precio = $this->precio;
    $descripcion = $this->descripcion;
    $habitaciones = $this->habitaciones;
    $wc = $this->wc;  
    $estacionamiento = $this->estacionamiento;
    $vendedores_id = $this->vendedores_id;
    $imagen = $this->imagen;

    if(!$titulo) {
      $errores[] = "Debes agregar un titulo";
    }

    if(!$precio) {
      $errores[] = "Debes agregar el precio";
    }

    if(!$descripcion) {
      if(strlen($descripcion) < 50) {
        $errores[] = "La descripción es muy corta";
      }
    }

    if(!$habitaciones) {  
      $errores[] = "El número de habitaciones es obligatorio"; 
    }

    if(!$wc) {
      $errores[] = "El número de baños es obligatorio";
    }

    if(!$estacionamiento){
      $errores[] = "El número de estacionamientos es obligatorio";
    }

    if(!$vendedores_id) {
      $errores[] = "Debes elegir un vendedor";
    }

    if(!$imagen) {
        $errores[] = "La imagen de la propiedad es Obligatoria";
    }

    self::$errores = $errores;

    return self::$errores;
  }

}

?> 