<?php
namespace src;

use Exception;
use src\Enlace;
use src\Controlador;
use const CONTROLADOR_NAMESPACE;
use const METODO_POR_DEFECTO;

class Metodo
{
    private $_metodo;
    private $_controlador;

    public function __construct(Enlace $url, Controlador $controlador)
    {
        $this->_controlador = $controlador;
        $this->_metodo = $this->setMetodo($url->enlace());  
    }

    public function metodo(): string
    {
        return $this->_metodo;
    }

    private function setMetodo(array $array): string
    {
        return $this->elMetodoEsValido($array);   
    }

    private function elMetodoEsValido(array $array): string
    {
        $metodo = $this->elMetodoEstaDefinido($array);

        if (!method_exists(CONTROLADOR_NAMESPACE.$this->_controlador->controlador(), $metodo))
        {
            return $this->elMetodoPorDefectoEsValido();
        }

        return $metodo;
    }

    private function elMetodoEstaDefinido(array $array): string
    {
        if(!isset($array[1]))
        {
            return METODO_POR_DEFECTO;
        }

        return $array[1];
    }

    private function elMetodoPorDefectoEsValido(): string
    {
        if (!method_exists(CONTROLADOR_NAMESPACE.$this->_controlador->controlador(), METODO_POR_DEFECTO))
        {
            throw new Exception("El método por defecto no está declarado");
        }

        return METODO_POR_DEFECTO;
    }

}