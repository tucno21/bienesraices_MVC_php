<?php

namespace MVC;

class Router
{
    public function comprobarRutas()
    {
        //captura el nombre de la url
        $urlActual = $_SERVER["PATH_INFO"] ?? '/';

        debuguear($urlActual);
    }
}
