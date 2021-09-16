<?php
namespace src;

use src\Controlador;
use src\Metodo;
use src\Parametros;

interface PeticionInterface
{
    public function __construct
    (
        Controlador $Controlador,
        Metodo $Metodo,
        Parametros $Parametros
    );

    public function controlador(): string;

    public function metodo(): string;

    public function parametros(): array;
}