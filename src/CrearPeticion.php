<?php
namespace src;

use src\Controlador;
use src\Enlace;
use src\FactoryClassInterface;
use src\Metodo;
use src\Parametros;
use src\Peticion;

class CrearPeticion implements FactoryClassInterface
{
    public function crear(array $array): Peticion
    {
        $enlace = new Enlace($array['url']);

        $metodo = new Metodo($enlace);

        return new Peticion(
            new Controlador($enlace),
            $metodo,
            new Parametros($enlace, $metodo)
        );
    }
}