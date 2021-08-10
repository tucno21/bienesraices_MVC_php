<?php

namespace Controllers;
//llamando al router para llamar a las vistas desde el controlador
use MVC\Router;
//llamar al modelo para obtener la base de datos
use Model\Propiedad;
use Model\Vendedor;

class PropiedadController
{
    //pasamos la url y la funcion del router index
    public static function index(Router $router)
    {
        //traer los datos de todas las propiedades
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();


        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
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
