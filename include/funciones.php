<?php

define('TEMPLATES_URL', __DIR__ . '/template');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/public/imagenes/');

function incluirTemplates(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/${nombre}.php";
}


function estaAutenticado()
{
    session_start();

    if (!$_SESSION['login']) {
        header('Location: /');
    }
    // header('Location: /admin');
}

function debuguear($variable)
{
    echo '<pre>';
    var_dump($variable);
    echo '<br>';
    echo '</pre>';
    exit;
}

//escapa / sanitizar del HTML
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

//validar tipo de contenido 
function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}

//muestra los mensajes o notificacion
function muestraNotificacion($codigo)
{
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = 'Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado Correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}
