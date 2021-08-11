<?php

namespace Controllers;
//llamando al router para llamar a las vistas desde el controlador
use MVC\Router;

class PaginaController
{
    public static function index()
    {
        echo "desde el index";
    }

    public static function nosotros()
    {
        echo "desde el nosotros";
    }

    public static function propiedades()
    {
        echo "desde el propiedades";
    }

    public static function propiedad()
    {
        echo "desde el propiedad";
    }

    public static function blog()
    {
        echo "desde el blog";
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
