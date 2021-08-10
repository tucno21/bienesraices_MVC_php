<?php

namespace Model;

//creando la clase padre
class ActiveRecord
{
    //base de datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    //errores validacion
    protected static $errores = [];





    //definir la coneccion a la BD
    public static function setBD($database)
    {
        self::$db = $database; //self sirve para llamar a las variables static
    }

    //subida de archivos
    public function setImage($imagen)
    {
        if (!is_null($this->id)) {
            //comprobar si existe el archivo
            $this->borrarImagen();
        }

        //asignar al atributo el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    public function borrarImagen()
    {
        $existeAchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeAchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    public function guardar()
    {
        if (!is_null($this->id)) {
            //actualizar
            $this->actualizar();
        } else {
            //crear nuevo registro
            $this->crear();
        }
    }

    public function crear()
    {
        //sanitizar los datos 
        $atributos = $this->sanitizarDatos();
        // $string = join(', ', array_keys($atributos)); //unir todos las llaves del arrego


        //insertar a la base de datos
        $query = " INSERT INTO " . static::$tabla . " (";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUE (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        // debuguear($query);

        $resultado = self::$db->query($query);
        if ($resultado) {
            header('Location: /admin?resultado=1');
        }
        // return $resultado;
        // debuguear($resultado);
    }

    public function actualizar()
    {
        //sanitizar los datos 
        $atributos = $this->sanitizarDatos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = " UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            header('Location: /admin?resultado=2');
        }

        // return $resultado;
        // debuguear($query);
    }

    public function eliminar()
    {
        $query = "DELETE FROM " . static::$tabla . " WHERE id=" . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado) {
            $this->borrarImagen();
            header('Location: /admin?resultado=3');
        }
        // debuguear($resultado);
    }

    //iterar la columanasDB //identidicar y unir los atibutos en la BD
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === "id") continue; //con esto no tomamo en cuenta el id
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarDatos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
        // debuguear($sanitizado);
    }

    //validacion
    public static function getErrores()
    {

        return static::$errores;
    }

    public function validar()
    {
        static::$errores = [];
        return static::$errores;
    }

    //traer todas las propiedades de la tabla
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla; //static sirve para heredar de los hijos
        // debuguear($query);
        // $resultado = self::consultarSQL($query);
        $resultado = self::consultarSQL($query);

        return $resultado;
        // debuguear($resultado);
    }

    //obtiene determinado numero de registro para pagina principal index
    public static function get($cantidad)
    {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad; //static sirve para heredar de los hijos
        // debuguear($query);
        // $resultado = self::consultarSQL($query);
        $resultado = self::consultarSQL($query);

        return $resultado;
        // debuguear($resultado);
    }

    //bsucar una propiedad o registro por si id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id=${id}";

        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
        // debuguear(array_shift($resultado)); //debuelve el contenido del primer array
    }

    //
    public static function consultarSQL($query)
    {
        //consultar la base de datos
        $resultado = self::$db->query($query);

        //iterar los datos
        $array = []; //crear array para almacenar objetos
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }
        // debuguear($array);

        //leberar la memoria
        $resultado->free();

        //retorar los resultados
        return  $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static; //este crea array vacio de las pripiedades de las clases hijas

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
        // debuguear($objeto);
    }

    //sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
        // debuguear($args);
    }
}
