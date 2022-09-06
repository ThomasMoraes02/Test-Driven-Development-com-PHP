<?php

require "./vendor/autoload.php";

use CDC\Loja\RH\Funcionario;
use CDC\Loja\RH\TabelaCargos;
use PHPUnit\Framework\TestCase;
use CDC\Loja\RH\CalculadoraDeSalario;

class CalculadoraDeSalarioTest extends TestCase
{
    public function testCalculoSalarioDesenvolvedorAbaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario("Andre", 1500, TabelaCargos::DESENVOLVEDOR);

        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals(1500.0 * 0.9, $salario);
    }

    public function testCalculoSalarioDesenvolvedorAcimaDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario("Andre", 4000, TabelaCargos::DESENVOLVEDOR);

        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals(4000 * 0.8, $salario);
    }

    public function testCalculoSalarioDBAsAbaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario("Andre", 500, TabelaCargos::DBA);

        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals(500 * 0.85, $salario);
    }
}