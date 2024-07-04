<?php

namespace Model;

class Usuario extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'email', 'password', 'token', 'confirmado'];

    public $id;
    public $nombre;
    public $email;
    public $password;
    public $password2;
    public $password_actual;
    public $password_nuevo;
    public $token;
    public $confirmado;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->password_actual = $args['password_actual'] ?? '';
        $this->password_nuevo = $args['password_nuevo'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
    }

    /** Comporbar Password */
    public function comprobar_password() : bool {
        return password_verify($this->password_actual, $this->password);
    }

    /** Nuevo Password */
    public function nuevo_password() : array {
        if (!$this->password_actual) {
            self::$alertas['error'][] = 'El password actual no puede ir vacio';
        }

        if (!$this->password_nuevo) {
            self::$alertas['error'][] = 'El password nuevo no puede ir vacio';
        }
        
        if (strlen($this->password_nuevo) < 6) {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        }

        return self::$alertas;
    }

    /** Validar Perfil */
    public function validarPerfil() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }

        if(!$this->email) {
            self::$alertas['error'][] = 'El Email es obligatorio';
        }

        return self::$alertas;
    }

    /** Validar Login */
    public function validarLogin(){
        if(!$this->email) {
            self::$alertas['error'][] = 'El Email del usurario es obligatorio';
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no valido';
        }

        if (!$this->password) {
            self::$alertas['error'][] = 'El password no puede ir vacio';
        }

        return self::$alertas;
    }

    /** Validacion para cuentas nuevas */
    public function validarNuevaCuenta() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre del Usuario es Obligatorio';
        }

        if(!$this->email) {
            self::$alertas['error'][] = 'El Email del Usuario es Obligatorio';
        }

        if(!$this->password){
            self::$alertas['error'][] = 'El Password del Ususario No Puede Ir Vacio';
        }

        if(strlen($this->password) < 6 ){
            self::$alertas['error'][] = 'El Password Debe Contener al menos 6 Caracteres';
        }

        if($this->password !== $this->password2){
            self::$alertas['error'][] = 'Los Password son Diferentes';
        }

        return self::$alertas;
    }

    /** Hashea el Password */
    public function hashPassword() : void {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    /** Generar un token */
    public function crearToken() : void {
        $this->token = uniqid();
    }

    /** Valida un Email */
    public function validarEmail() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            self::$alertas['error'][] = 'El Email no es Valido';
        }
        return self::$alertas;
    }

    /** Validar Password */
    public function validarPassword() {
        if(!$this->password){
            self::$alertas['error'][] = 'El Password del Ususario No Puede Ir Vacio';
        }

        if(strlen($this->password) < 6 ){
            self::$alertas['error'][] = 'El Password Debe Contener al menos 6 Caracteres';
        }

        return self::$alertas;
    }

}