<?php
namespace src;

use Exception;
use const CONTROLADOR_DIR;
use const CONTROLADOR_POR_DEFECTO;
use const CONTROLADOR_NAMESPACE;

use src\Enlace;

class Controlador
{
    private $_controlador;

    public function __construct(Enlace $url)
    {
        $this->_controlador = $this->setControlador($url->enlace());
    }

    public function controlador(): string
    {
        return $this->_controlador;
    }

    private function setControlador(array $url): string
    {
        return $this->controladorExiste($this->controladorDeclarado($url));
    }

    //controlador esta declarado
    private function controladorDeclarado(array $url)
    {
        if (!isset($url[0])) {
            return CONTROLADOR_POR_DEFECTO;
        }

        return ucwords($url[0]);
    }

    //controlador existe

    private function controladorExiste(string $controlador): string
    {
        if (!file_exists(CONTROLADOR_DIR.$controlador.'.php') || !class_exists(CONTROLADOR_NAMESPACE.$controlador)) {
            return $this->controladorPorDefectoExiste();
        }

        return $controlador;
    }

    private function controladorPorDefectoExiste(): string
    {
        if (!file_exists(CONTROLADOR_DIR.CONTROLADOR_POR_DEFECTO.'.php') || !class_exists(CONTROLADOR_NAMESPACE.CONTROLADOR_POR_DEFECTO)) {
            throw new Exception("El controlador por defecto no existe");
        }

        return CONTROLADOR_POR_DEFECTO;
    }
}
