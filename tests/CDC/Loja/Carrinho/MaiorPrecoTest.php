<?php

use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Carrinho\MaiorPreco;
use CDC\Loja\Produto\Produto;
use PHPUnit\Framework\TestCase;

class MaiorPrecoTest extends TestCase
{
    public function testDeveRetornarZeroSeCarrinhoVazio()
    {
        $carrinho = new CarrinhoDeCompras();

        $algoritmo = new MaiorPreco();
        $valor = $algoritmo->encontra($carrinho);

        $this->assertEquals(0, $valor);
    }

    public function testDeveRetornarValorDoItemSeCarrinhoCom1Elemento()
    {
        $carrinho = new CarrinhoDeCompras();
        $carrinho->adiciona(new Produto("Geladeira", 1, 900.00));

        $algoritmo = new MaiorPreco();
        $valor = $algoritmo->encontra($carrinho);

        $this->assertEquals(900, $valor);
    }

    public function testDeveRetornarMaiorValorCarrinhoComMuitosItens()
    {
        $carrinho = new CarrinhoDeCompras();
        $carrinho->adiciona(new Produto("Geladeira", 1, 900));
        $carrinho->adiciona(new Produto("Fogão", 1, 1500));
        $carrinho->adiciona(new Produto("Máquina de lavar", 1, 750));

        $algoritmo = new MaiorPreco();
        $valor = $algoritmo->encontra($carrinho);

        $this->assertEquals(1500, $valor);
    }
}