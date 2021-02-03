<?php
/*ARQUIVO WEB QUE PEGAR AS INFORMAÇÕES DO BANCO DE DADOS E SALVAR 
 * EM UM OBJETO PARA ASSIM SALVAR NO DAO*/
require_once $_SERVER['DOCUMENT_ROOT'] . "/sapataria/vo/Usuario.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/sapataria/dao/UsuarioDao.php";
$usuario = new Usuario();
$usuario->setNome($_POST['nome']);
$usuario->setEmail($_POST['email']);
$usuario->setLogin($_POST['login']);
$usuario->setSenha($_POST['senha']);
$dao = new UsuarioDao();
if($_POST['id']==0)
    $dao->inserir($usuario);
else
    $dao->atualizar($usuario);
header('Location: http://'.$_SERVER['HTTP_HOST'].'/sapataria/listar/listarUsuario.php');
?>