<?php

require "./vendor/autoload.php";

use CDC\Loja\RH\Funcionario;
use CDC\Loja\RH\TabelaCargos;
use PHPUnit\Framework\TestCase;
use CDC\Loja\RH\CalculadoraDeSalario;

class CalculadoraDeSalarioTest extends TestCase
{
    private $calculadora;

    protected function setUp()
    {
        $this->calculadora = new CalculadoraDeSalario();
        parent::setUp();
    }

    public function testCalculoSalarioDesenvolvedorAbaixoDoLimite()
    {
        $funcionario = new Funcionario("Andre", 1500, "desenvolvedor");
        $salario = $this->calculadora->calculaSalario($funcionario);

        $this->assertEquals(1500.0 * 0.9, $salario);
    }

    public function testCalculoSalarioDesenvolvedorAcimaDoLimite()
    {
        $funcionario = new Funcionario("Andre", 4000, "desenvolvedor");
        $salario = $this->calculadora->calculaSalario($funcionario);

        $this->assertEquals(4000 * 0.8, $salario);
    }

    public function testCalculoSalarioDBAsAbaixoDoLimite()
    {
        $funcionario = new Funcionario("Andre", 500, "dba");
        $salario = $this->calculadora->calculaSalario($funcionario);

        $this->assertEquals(500 * 0.85, $salario);
    }
}