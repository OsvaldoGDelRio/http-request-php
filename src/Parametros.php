<?php
namespace src;

use src\Enlace;
use src\Metodo;

class Parametros
{
    private $_url;
    private $_metodo;

    public function __construct(Enlace $url, Metodo $metodo)
    {
        $this->_url = $url->enlace();
        $this->_metodo = $metodo;
    }

    public function parametros(): array
    {
        unset($this->_url[0]);

        if(isset($this->_url[1]))
        {
            if($this->_metodo->metodo() == $this->_url[1])
            {
                unset($this->_url[1]);
            }
        }        

        return $this->_url ? array_values($this->_url) : [];
    }
}


