<?php

namespace Model;

class Admin extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar()
    {
        //verificar que los imput no este vacio y envia al arreglo errores
        if (!$this->email) {
            self::$errores[] = "El email es obligatorio o no es valido";
        }
        if (!$this->password) {
            self::$errores[] = "El password es obligatorio";
        }
        return self::$errores;
    }

    public function existeUsuario()
    {
        //revisar si el usario existe o no es
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);
        // debuguear($resultado);

        if (!$resultado->num_rows) {
            self::$errores[] = 'El usuario no existe';
            return;
        }
        return $resultado;
    }

    public function comprobarPassword($resultado)
    {
        $usuario = $resultado->fetch_object(); //trae al usuario con su contraseña

        $auth = password_verify($this->password, $usuario->password);

        if (!$auth) {
            self::$errores[] = 'La contraseña es incorrecta';
            return;
        }
        return $auth;
    }

    public function autenticarAlUsuario()
    {
        session_start();
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true; //se puede colorcar cualquier valor
        header('Location: /admin');
    }
}
