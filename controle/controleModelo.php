<?php
/*ARQUIVO WEB QUE PEGAR AS INFORMAÇÕES DO BANCO DE DADOS E SALVAR 
 * EM UM OBJETO PARA ASSIM SALVAR NO DAO*/
require_once $_SERVER['DOCUMENT_ROOT'] . "/sapataria/vo/Modelo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sapataria/dao/ModeloDao.php";
$modelo = new Modelo();
$modelo->setMarca($_POST['marca']);
$modelo->setCor($_POST['cor']);
$modelo->setTipo($_POST['tipo']);
$modelo->setPreco($_POST['preco']);
$modelo->setEstoque($_POST['estoque']);
$modelo->setTamanho($_POST['tamanho']);
$dao = new ModeloDao();
if($_POST['id']==0)
    $dao->inserir($modelo);
else
    $dao->atualizar($modelo);
header('Location: http://'.$_SERVER['HTTP_HOST'].'/sapataria/listar/listarModelo.php');
?>