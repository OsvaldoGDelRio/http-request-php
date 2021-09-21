<?php
namespace tests;

use PHPUnit\Framework\TestCase;
use src\Controlador;
use src\Enlace;
use src\Metodo;
use src\Parametros;
use src\Peticion;

define('CONTROLADOR_POR_DEFECTO','Controlador');
define('CONTROLADOR_DIR','controladores/');
define('CONTROLADOR_NAMESPACE', 'controladores\\');
define('METODO_POR_DEFECTO','index');

class PeticionTest extends TestCase
{
    public function setUp(): void
    {
        $this->e = new Enlace(['Controlador']);
        $this->c = new Controlador($this->e);
        $this->m = new Metodo($this->e,$this->c);
        $this->p = new Parametros($this->e,$this->m);
    }

    //Peticion

    public function testPeticionDevuelvecontroladorCorrecto()
    {
        $p = new Peticion($this->c, $this->m, $this->p);
        $this->assertSame('Controlador', $p->controlador());
    }

    public function testPeticionDevuelvecontroladorPorDefectoSiNoExisteElLlamado()
    {
        $this->e = new Enlace(['Iniciosssssssss']);
        $this->c = new Controlador($this->e);
        $this->m = new Metodo($this->e,$this->c);
        $this->p = new Parametros($this->e,$this->m);
        $p = new Peticion($this->c, $this->m, $this->p);
        $this->assertSame('Controlador', $p->controlador());
    }

    public function testPeticionDevuelveMetodoCorrecto()
    {
        $p = new Peticion($this->c, $this->m, $this->p);
        $this->assertSame('index', $p->metodo());
    }

    public function testPeticionDevuelveParametrosEnArray()
    {
        $p = new Peticion($this->c, $this->m, $this->p);
        $this->assertIsArray($p->parametros());
    }

    //Enlace

    public function testEnlaceSiempreRetornaUnArray()
    {
        $e = new Enlace([]);
        $this->assertIsArray($e->enlace());
        $e = new Enlace(['hola','hola2']);
        $this->assertIsArray($e->enlace());
    }

    //Controlador

    


    //Metodo


    //Parametros
}