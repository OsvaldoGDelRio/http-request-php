<?php
namespace src;

class Enlace
{
    private $_enlace;

    public function __construct(array $array)
    {
        $this->_enlace = $this->setEnlace($array);
    }

    public function enlace(): array
    {
        return $this->_enlace;
    }

    private function setEnlace(array $array): array
    {
        
        if(!isset($array['url']))
        {
            return [];
        }

        return explode('/', filter_var(rtrim($array['url'], '/'), FILTER_SANITIZE_URL));
    }
}