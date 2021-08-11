<?php
//llamando a la app de include porque tiene funciones
require_once __DIR__ . '/../include/app.php';

use MVC\Router;
//llamando al controller
use Controllers\PaginaController;
use Controllers\VendedorController;
use Controllers\PropiedadController;

$router = new Router();


//zona privada
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
$router->post('/vendedores/eliminar', [VendedorController::class, "eliminar"]);

//zona publica
$router->get('/', [PaginaController::class, "index"]);
$router->get('/nosotros', [PaginaController::class, "nosotros"]);
$router->get('/propiedades', [PaginaController::class, "propiedades"]);
$router->get('/propiedad', [PaginaController::class, "propiedad"]);
$router->get('/blog', [PaginaController::class, "blog"]);
$router->get('/entrada', [PaginaController::class, "entrada"]);
$router->get('/contacto', [PaginaController::class, "contacto"]);
$router->post('/contacto', [PaginaController::class, "contacto"]);


//lamando el metodo de ruter
$router->comprobarRutas();
