<?php

namespace App;

class Propiedad extends ActiveRecord
{
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];
    protected static $tabla = 'propiedades';

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y-m-d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function validar()
    {
        //verificar que los imput no este vacio y envia al arreglo errores
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un Titulo";
        }
        if (!$this->precio) {
            self::$errores[] = "el precio precio es obligatorio";
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "la descripcion es obligatorio y debe contener como minimo 50 caracteres";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "Debes añadir la cantidad de  habitaciones";
        }
        if (!$this->wc) {
            self::$errores[] = "Debes añadir la cantidad de baños";
        }
        if (!$this->estacionamiento) {
            self::$errores[] = "Debes añadir la cantidad de estacionamiento";
        }
        if (!$this->vendedorId) {
            self::$errores[] = "Elige un vendedor";
        }
        if (!$this->imagen) {
            self::$errores[] = "la imagen es obligatoria";
        }
        return self::$errores;
    }
}
