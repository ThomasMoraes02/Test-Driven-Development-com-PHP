<?php 

namespace CDC\Loja\RH;

use Exception;
use CDC\Loja\RH\Funcionario;
use CDC\Loja\RH\TabelaCargos;

class CalculadoraDeSalario
{
    public function calculaSalario(Funcionario $funcionario)
    {
        $cargo = new Cargo($funcionario->getCargo());

        return $cargo->getRegra()->calcula($funcionario);
    }
}