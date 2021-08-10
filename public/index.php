<?php
//llamando a la app de include porque tiene funciones
require_once __DIR__ . '/../include/app.php';

use MVC\Router;

$router = new Router();

//le pasamos la url y la funcion al ROUTER
$router->get('/nosotros', 'funcion_nosotros');
$router->get('/tienda_virtual', 'funcion_tienda');
$router->get('/', 'funcion_admin');


//lamando el metodo de ruter
$router->comprobarRutas();
