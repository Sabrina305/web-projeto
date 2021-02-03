<?php
/*ARQUIVO WEB QUE PEGAR AS INFORMAÇÕES DO BANCO DE DADOS E SALVAR 
 * EM UM OBJETO PARA ASSIM SALVAR NO DAO*/
require_once $_SERVER['DOCUMENT_ROOT'] . "/sapataria/vo/FluxoCaixa.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sapataria/dao/FluxoCaixaDao.php";
$fluxoCaixa = new FluxoCaixa();
$fluxoCaixa->setDataPagamento($_POST['dataPagamento']);
$fluxoCaixa->setDescricao($_POST['descricao']);
$fluxoCaixa->setValor($_POST['valor']);
$fluxoCaixa->setSituacao($_POST['situacao']);
$fluxoCaixa->setTipo($_POST['tipo']);
$dao = new FluxoCaixaDao();
if($_POST['id']==0)
    $dao->inserir($fluxoCaixa);
else
    $dao->atualizar($fluxoCaixa);
header('Location: http://'.$_SERVER['HTTP_HOST'].'/sapataria/listar/listarFluxoCaixa.php');
?>