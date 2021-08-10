<?php

function conectarBD(): mysqli
{
    $db = new mysqli('localhost', 'root', 'root', 'bienes_raices');

    if (!$db) {
        echo 'coneccion incorrecta';
        exit;
    }
    // echo 'coneccion exitosa';
    return $db;
}
