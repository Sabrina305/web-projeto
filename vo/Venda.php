<?php
//(Value Object) ESSA É A CLASSE SECA DO PROJETO
class Venda {
    private $id;
    private $id_cliente;
    private $id_usuario;
    private $id_produto;
    private $valorTotal;
    private $dataVenda;
    
    function getId() {
        return $this->id;
    }

    function getId_cliente() {
        return $this->id_cliente;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_produto() {
        return $this->id_produto;
    }

    function getValorTotal() {
        return $this->valorTotal;
    }

    function getDataVenda() {
        return $this->dataVenda;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_produto($id_produto) {
        $this->id_produto = $id_produto;
    }

    function setValorTotal($valorTotal) {
        $this->valorTotal = $valorTotal;
    }

    function setDataVenda($dataVenda) {
        $this->dataVenda = $dataVenda;
    }

    function toString(){
        return $this->id_Usuario(). " - ".$this-> id_Cliente(). " - ".$this-> dataVenda();
    }
}
