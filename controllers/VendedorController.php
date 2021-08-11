<?php

namespace Controllers;
//llamando al router para llamar a las vistas desde el controlador
use MVC\Router;
//llamar al modelo para obtener la base de datos
use Model\Vendedor;


class VendedorController
{

    public static function crear(Router $router)
    {
        $vendedor = new Vendedor;
        // VALIDAR FORMULARIO
        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //crear una nueva instancia 
            $vendedor = new Vendedor($_POST['vendedor']);

            //validar que no este vacio
            $errores = $vendedor->validar();

            //si no hay error guardar
            if (empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores,
        ]);
    }

    public static function actualizar(Router $router)
    {

        $router->render('vendedores/actualizar', []);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //validar id de la captura del url
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {

                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}
