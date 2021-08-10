<?php

namespace MVC;

class Router
{

    public $rutasGET = [];
    public $rutasPOST = [];

    //recibe las  rutas parametros de PUBLIC/INDEX
    public function get($url, $fn)
    {
        //almacena en rutasGET
        $this->rutasGET[$url] = $fn;
    }

    public function comprobarRutas()
    {
        //captura el nombre de la url
        $urlActual = $_SERVER["PATH_INFO"] ?? '/';

        //capturar el tipo de ruta get o post
        $metodo = $_SERVER["REQUEST_METHOD"];


        if ($metodo == "GET") {
            //almacenar la funcion asociada a la url de PUBLIC/INDEX
            $fn =  $this->rutasGET[$urlActual] ?? null;
        }

        if ($fn) {
            //si la url existe con la funcion asociada
        } else {
            //o manadar a la pagina 404
            echo "Pagina no existe";
        }

        debuguear("");
    }
}
