<?php
declare(strict_types=1);
require_once __DIR__ . '/vendor/autoload.php';

use src\Factory;

define('CONTROLADOR_DIR', __DIR__.'\\controladores\\');

define('CONTROLADOR_POR_DEFECTO', 'Controlador');

define('CONTROLADOR_NAMESPACE', 'controladores\\');

define('METODO_POR_DEFECTO', 'index');

$factory = new Factory();

$peticion = $factory->crear('src\CrearPeticion', array(
    'url' => $_REQUEST
));

echo $peticion->controlador();
echo $peticion->metodo();
print_r($peticion->parametros());
