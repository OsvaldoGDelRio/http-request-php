<?php
namespace src;

use src\Enlace;

class Metodo
{
    private $_url;

    public function __construct(Enlace $url)
    {
        $this->_url = $url->enlace();
    }

    public function metodo(): string
    {
        return $this->_url[1];
    }
}