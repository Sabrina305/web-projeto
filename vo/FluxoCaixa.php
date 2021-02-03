<?php
//(Value Object) ESSA É A CLASSE SECA DO PROJETO

class FluxoCaixa {
    private $id;
    private $dataPagamento;
    private $descricao;
    private $valor;
    private $situacao;
    private $tipo;
    
    function getId() {
        return $this->id;
    }

    function getDataPagamento() {
        return $this->dataPagamento;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getValor() {
        return $this->valor;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDataPagamento($dataPagamento) {
        $this->dataPagamento = $dataPagamento;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function toString(){
        return $this->valor();
    }
}
