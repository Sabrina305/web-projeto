<?php
//(Value Object) ESSA É A CLASSE SECA DO PROJETO

class ItemVenda {
    private $id;
    private $id_venda;
    private $id_modelo;
    private $quantidade;
   
    function getId() {
        return $this->id;
    }
    
    function getId_venda() {
        return $this->id_venda;
    }

    function getId_modelo() {
        return $this->id_modelo;
    }

    function getQuantidade() {
        return $this->quantidade;
    }
    function setId($id) {
        $this->id = $id;
    }

    function setId_venda($id_venda) {
        $this->id_venda = $id_venda;
    }

    function setId_modelo($id_modelo) {
        $this->id_modelo = $id_modelo;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

       function toString(){
        return $this->idVenda();
    }
}
