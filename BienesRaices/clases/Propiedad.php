<?php

namespace App;

class Propiedad {

  // Base de Datos
  protected static $db;
  protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];
  
  // Errores
  protected static $errores = [];
  
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

  public static function setDB($database) {
    self::$db = $database;
  }

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
    $this->vendedores_id = $args['vendedores_id'] ?? 1;
  }

  public function guardar() { 
    $atributos = $this->sanitizarAtributos();
    
    $query = "INSERT INTO propiedades (";
    $query .= join(', ', array_keys($atributos)); 
    $query .= ") VALUES ('"; 
    $query .= join("', '", array_values($atributos));
    $query .= "')";
    
    $resultado = self::$db->query($query);

    return $resultado;
  }
  
  public function atributos() {
    $atributos = [];
    foreach(self::$columnasDB as $columna) {
      if($columna === 'id') continue;
      $atributos[$columna] = $this->$columna; 
    }
    return $atributos;
  }
  
  public function sanitizarAtributos() {
    $atributos = $this->atributos();
    $sanitizado = [];

    foreach($atributos as $key => $value ) {
      $sanitizado[$key] = self::$db->escape_string($value);
    }
    return $sanitizado;
  }

  public static function getErrores() { 
    return self::$errores;
  }

  // Subida de archivos
  public function setImagen($imagen) {
    // Elimina la imagen previa
    if($this->id) {
      // Comprobar si existe el archivo
      $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
      
      if($existeArchivo) {
        unlink(CARPETA_IMAGENES . $this->imagen);
      }
      
    }

    // Asignar al atributo de imagen el nombre de la imagen
    if($imagen) {
        $this->imagen = $imagen;
    }
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

    if($descripcion) {
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
        $errores[] = "La imagen es Obligatoria";
    }

    self::$errores = $errores;

    return self::$errores;
  }

  // Lista todas las propiedades
  public static function all() {
    $query = "SELECT * FROM propiedades";
    $resultado = self::consultarSQL($query);

    return $resultado;
  }

  // Busca un registro por su id
  public static function find($id) {
    $query = "SELECT * FROM propiedades WHERE id= {$id}";
    $resultado = self::consultarSQL($query);

    return array_shift($resultado);
  }

  public static function consultarSQL($query) {
    // Consultar la base de datos
    $resultado = self::$db->query($query);

    // Iterar los resultados 
    $array = [];
    while ($registro = $resultado->fetch_assoc()) {
      $array[] = self::crearObjeto($registro);
    }

    // Liberar Memoria
    $resultado->free();

    //retornar los resultados
    return $array;
  }

  protected static function crearObjeto($registro) {
    $objeto = new self;
    
    foreach ($registro as $key => $value) {
      if (property_exists($objeto, $key)) {
        $objeto->$key = $value;
      }
    }

    return $objeto;
  }

  // Sincronizar el objeto en memoria con los cambios realizados por el usuario
  public function sincronizar($args = []) {
    foreach ($args  as $key => $value) {
      if(property_exists($this, $key) && is_null($value)){
        $this->$key = $value;
      }
    }
  }

}
?>