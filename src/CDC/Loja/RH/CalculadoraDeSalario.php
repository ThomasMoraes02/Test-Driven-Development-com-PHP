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

    // public function calculaSalario(Funcionario $funcionario)
    // {
    //     if($funcionario->getCargo() == TabelaCargos::DESENVOLVEDOR) {
    //         return $this->dezOuVintePorCentoDeDesconto($funcionario);
    //     } elseif($funcionario->getCargo() == TabelaCargos::DBA) {
    //         return $this->quinzeOuVinteECincoPorCentoDeDesconto($funcionario);
    //     }
    //     throw new Exception("Tipo de funcionário inválido", 1);
        
    // }

    // private function dezOuVintePorCentoDeDesconto(Funcionario $funcionario)
    // {
    //     if($funcionario->getSalario() > 3000) {
    //         return $funcionario->getSalario() * 0.8;
    //     }
    //     return $funcionario->getSalario() * 0.9;
    // }

    // private function quinzeOuVinteECincoPorCentoDeDesconto($funcionario)
    // {
    //     if($funcionario->getSalario() < 2500) {
    //         return $funcionario->getSalario() * 0.85;
    //     }
    //     return $funcionario->getSalario() * 0.75;
    // }
}