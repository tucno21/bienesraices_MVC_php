<?php

namespace App;

class Vendedor extends ActiveRecord
{
    protected static $columnasDB = ['id', 'nombre', 'apellidos', 'telefono'];
    protected static $tabla = 'vendedores';

    public $id;
    public $nombre;
    public $apellidos;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar()
    {
        //verificar que los imput no este vacio y envia al arreglo errores
        if (!$this->nombre) {
            self::$errores[] = "El nombre es obligatorio";
        }
        if (!$this->apellidos) {
            self::$errores[] = "Los Apellidos son obligatorios";
        }
        if (!$this->telefono) {
            self::$errores[] = "ingresa un numero telefónico";
        }

        if (!preg_match("/[0-9]{9}/", $this->telefono)) {
            self::$errores[] = "telefono no valido";
        }

        return self::$errores;
    }
}
