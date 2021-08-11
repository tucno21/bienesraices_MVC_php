<?php
//llamando a la app de include porque tiene funciones
require_once __DIR__ . '/../include/app.php';

use MVC\Router;
//llamando al controller
use Controllers\VendedorController;
use Controllers\PropiedadController;

$router = new Router();



//le pasamos la url y la funcion al ROUTER
$router->get('/admin', [PropiedadController::class, "index"]);
$router->get('/propiedades/crear', [PropiedadController::class, "crear"]);
$router->post('/propiedades/crear', [PropiedadController::class, "crear"]);
$router->get('/propiedades/actualizar', [PropiedadController::class, "actualizar"]);
$router->post('/propiedades/actualizar', [PropiedadController::class, "actualizar"]);
$router->post('/propiedades/eliminar', [PropiedadController::class, "eliminar"]);


$router->get('/vendedores/crear', [VendedorController::class, "crear"]);
$router->post('/vendedores/crear', [VendedorController::class, "crear"]);
$router->get('/vendedores/actualizar', [VendedorController::class, "actualizar"]);
$router->post('/vendedores/actualizar', [VendedorController::class, "actualizar"]);


//lamando el metodo de ruter
$router->comprobarRutas();
