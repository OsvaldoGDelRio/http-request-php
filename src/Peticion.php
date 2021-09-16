<?php
namespace src;

use src\PeticionInterface;

class Peticion implements PeticionInterface
{
    private $_controlador;
    private $_metodo;
    private $_parametros;
    
    public function __construct
    (
        Controlador $Controlador,
        Metodo $Metodo,
        Parametros $Parametros
    )
    {
        $this->_controlador = $Controlador;
        $this->_metodo = $Metodo;
        $this->_parametros = $Parametros;
    }

    public function controlador(): string
    {
        return $this->_controlador->controlador();
    }

    public function metodo(): string
    {
        return $this->_metodo->metodo();
    }

    public function parametros(): array
    {
        return $this->_parametros->parametros();
    } 
}