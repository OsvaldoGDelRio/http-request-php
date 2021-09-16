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
        $controlador = new Controlador($enlace);
        $metodo = new Metodo($enlace, $controlador);

        return new Peticion(
            $controlador,
            $metodo,
            new Parametros($enlace, $metodo)
        );
    }
}