<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class AuthController
{
    public static function login(Router $router)
    {
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if (empty($errores)) {
                //revisar si el usuario existente
                $resultado = $auth->existeUsuario();

                if (!$resultado) {
                    $errores = Admin::getErrores();
                } else {
                    //revisar si la contraseña es correcto
                    $autenticado = $auth->comprobarPassword($resultado);

                    if ($autenticado) {
                        //el usuario esta autenticado
                        $auth->autenticarAlUsuario();
                    } else {
                        $errores = Admin::getErrores();
                    }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores,
        ]);
    }
    public static function logout()
    {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}
