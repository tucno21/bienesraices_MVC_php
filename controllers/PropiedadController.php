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
        $resultado = null;


        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'resultado' => $resultado,
        ]);
    }

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores,
        ]);
    }

    public static function actualizar()
    {
        echo "actualizar propiedad";
    }
}
