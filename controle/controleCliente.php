<?php
/*ARQUIVO WEB QUE PEGAR AS INFORMAÇÕES DO BANCO DE DADOS E SALVAR 
 * EM UM OBJETO PARA ASSIM SALVAR NO DAO*/
require_once $_SERVER['DOCUMENT_ROOT'] . "/sapataria/vo/Cliente.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sapataria/dao/ClienteDao.php";
$cliente = new Cliente();
$cliente->setNome($_POST['nome']);
$cliente->setCpf($_POST['cpf']);
$cliente->setCidade($_POST['cidade']);
$cliente->setBairro($_POST['bairro']);
$cliente->setRua($_POST['rua']);
$cliente->setNumeroCasa($_POST['numeroCasa']);
$dao = new ClienteDao();
if($_POST['id']==0)
    $dao->inserir($cliente);
else
    $dao->atualizar($cliente);
header('Location: http://'.$_SERVER['HTTP_HOST'].'/sapataria/listar/listarCliente.php');
?>