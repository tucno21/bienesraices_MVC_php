<?php
//este archivo llamara funciones y clases

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

use Model\ActiveRecord;

//conectarnos a la base de datos
$db = conectarBD();

// $propiedad = new ActiveRecord;

ActiveRecord::setBD($db);
