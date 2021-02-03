<?php
/*ARQUIVO WEB QUE PEGAR AS INFORMAÇÕES DO BANCO DE DADOS E SALVAR 
 * EM UM OBJETO PARA ASSIM SALVAR NO DAO*/
require_once $_SERVER['DOCUMENT_ROOT'] . "/sapataria/vo/ItemVenda.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sapataria/dao/ItemVendaDao.php";
$itemVenda = new ItemVenda();
$itemVenda->setId_venda($_POST['id_venda']);
$itemVenda->setId_modelo($_POST['id_modelo']);
$itemVenda->setQuantidade($_POST['quantidade']);
$dao = new ItemVendaDao();
if($_POST['id']==0)
    $dao->inserir($itemVenda);
else
    $dao->atualizar($itemVenda);
header('Location: http://'.$_SERVER['HTTP_HOST'].'/sapataria/listar/listarItemVenda.php');
?>