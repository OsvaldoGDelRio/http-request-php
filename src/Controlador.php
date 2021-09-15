<?php
namespace src;

use src\Enlace;

class Controlador
{
    private $_url;

    public function __construct(Enlace $url)
    {
        $this->_url = $url->enlace();
    }

    public function controlador(): string
    {
       return $this->_url[0];
    }
}