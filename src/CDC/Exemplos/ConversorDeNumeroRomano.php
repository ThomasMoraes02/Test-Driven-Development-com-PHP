<?php 

namespace CDC\Exemplos;

class ConversorDeNumeroRomano
{
    protected $tabela = [
        "I" => 1,
        "V" => 5,
        "X" => 10,
        "L" => 50,
        "C" => 100,
        "D" => 500,
        "M" => 1000
    ];

    public function converte($numeroEmRomano)
    {
        // Ex 1
        // if(array_key_exists($numeroEmRomano, $this->tabela)) {
        //     return $this->tabela[$numeroEmRomano];
        // }
        // return 0;

        // Ex 2
        // $acumulador = 0;
        // for ($i=0; $i < strlen($numeroEmRomano); $i++) { 
        //     $numCorrente = $numeroEmRomano[$i];
        //     if(array_key_exists($numCorrente, $this->tabela)) {
        //         $acumulador += $this->tabela[$numCorrente];
        //     }
        // }

        // Ex 3
        $acumulador = 0;
        $ultimoVizinhoDaDireita = 0;
        for ($i= strlen($numeroEmRomano) -1; $i >= 0; $i--) { 
            
            // pega o inteiro referente ao simbolo atual
            $atual = 0;
            $numCorrente = $numeroEmRomano[$i];
            if(array_key_exists($numCorrente, $this->tabela)) {
                $atual = $this->tabela[$numCorrente];
            }

            // se o da direita for menor
            $multiplicador = 1;
            if($atual < $ultimoVizinhoDaDireita) {
                $multiplicador = -1;
            }

            $acumulador += ($atual * $multiplicador);

            // atualiza o vizinho da direita
            $ultimoVizinhoDaDireita = $atual;
        }
        return $acumulador;
    }
}