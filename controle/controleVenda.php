<?php
/*ARQUIVO WEB QUE PEGAR AS INFORMAÇÕES DO BANCO DE DADOS E SALVAR 
 * EM UM OBJETO PARA ASSIM SALVAR NO DAO*/
require_once $_SERVER['DOCUMENT_ROOT'] . "/sapataria/vo/Venda.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sapataria/dao/VendaDao.php";
$venda = new Venda();
$venda->setId_cliente($_POST['id_cliente']);
$venda->setId_usuario($_POST['id_usuario']);
$venda->setId_produto($_POST['id_produto']);
$venda->setValorTotal($_POST['valorTotal']);
$venda->setDataVenda($_POST['dataVenda']);
$dao = new VendaDao();
if($_POST['id']==0)
    $dao->inserir($venda);
else
    $dao->atualizar($venda);
header('Location: http://'.$_SERVER['HTTP_HOST'].'/sapataria/listar/listarVenda.php');
?>