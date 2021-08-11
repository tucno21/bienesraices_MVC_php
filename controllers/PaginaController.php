<?php

namespace Controllers;
//llamando al router para llamar a las vistas desde el controlador
use MVC\Router;
use Model\Propiedad;

class PaginaController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('/paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio,
        ]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('/paginas/nosotros', []);
    }

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();

        $router->render('/paginas/propiedades', [
            'propiedades' => $propiedades,
        ]);
    }

    public static function propiedad(Router $router)
    {
        $id = validarORedireccionar('/propiedades');

        $propiedad = Propiedad::find($id);

        $router->render('/paginas/propiedad', [
            'propiedad' => $propiedad,
        ]);
    }

    public static function blog(Router $router)
    {
        $router->render('/paginas/blog', []);
    }

    public static function entrada()
    {
        echo "desde el entrada";
    }

    public static function contacto()
    {
        echo "desde el contacto";
    }
}