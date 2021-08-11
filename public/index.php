<?php
//llamando a la app de include porque tiene funciones
require_once __DIR__ . '/../include/app.php';

use MVC\Router;
//llamando al controller
use Controllers\PropiedadController;

$router = new Router();



//le pasamos la url y la funcion al ROUTER
$router->get('/admin', [PropiedadController::class, "index"]);
$router->get('/propiedades/crear', [PropiedadController::class, "crear"]);
$router->post('/propiedades/crear', [PropiedadController::class, "crear"]);
$router->get('/propiedades/actualizar', [PropiedadController::class, "actualizar"]);
$router->post('/propiedades/actualizar', [PropiedadController::class, "actualizar"]);
$router->post('/propiedades/eliminar', [PropiedadController::class, "eliminar"]);



//lamando el metodo de ruter
$router->comprobarRutas();
