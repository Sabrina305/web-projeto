<?php
//(Value Object) ESSA É A CLASSE SECA DO PROJETO

class Modelo {
    private $id;
    private $marca;
    private $cor;
    private $tipo;
    private $preco;
    private $tamanho;
    private $estoque;
    
    function getId() {
        return $this->id;
    }

    function getMarca() {
        return $this->marca;
    }

    function getCor() {
        return $this->cor;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getPreco() {
        return $this->preco;
    }

    function getTamanho() {
        return $this->tamanho;
    }

    function getEstoque() {
        return $this->estoque;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setCor($cor) {
        $this->cor = $cor;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
    }

    function setEstoque($estoque) {
        $this->estoque = $estoque;
    }

    function toString(){
        return $this->marca(). " - ".$this-> preco();
    }


}
