<?php

namespace Controllers;
//llamando al router para llamar a las vistas desde el controlador
use MVC\Router;

class PropiedadController
{
    //pasamos la url y la funcion del router index
    public static function index(Router $router)
    {
        $router->render('propiedades/admin', [
            'mensaje' => 'mensaje2',
            'propiedades' => 'casa'
        ]);
    }

    public static function crear()
    {
        echo "crear propiedad";
    }

    public static function actualizar()
    {
        echo "actualizar propiedad";
    }
}
