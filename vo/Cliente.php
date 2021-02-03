<?php
//(Value Object) ESSA É A CLASSE SECA DO PROJETO
class Cliente {
    private $id;
    private $nome;
    private $cpf;
    private $cidade;
    private $bairro;
    private $rua;
    private $numeroCasa;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getRua() {
        return $this->rua;
    }

    function getNumeroCasa() {
        return $this->numeroCasa;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }

    function setNumeroCasa($numeroCasa) {
        $this->numeroCasa = $numeroCasa;
    }
     
    function toString(){
        return $this->nome();
    }
}
?>