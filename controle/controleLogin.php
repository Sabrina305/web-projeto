<?php
//ARQUIVO PHP
$login = $_POST['login'];
$senha = $_POST['senha'];
require_once $_SERVER['DOCUMENT_ROOT'] . "/sapataria/dao/UsuarioDAO.php";

$dao = new UsuarioDAO();
$usuarioLogado = $dao->logar($login, $senha);
if ($usuarioLogado != null) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/sapataria/pages/index.php');
    if (isset($_POST['lembrar'])){
        setcookie("idUsuarioLogado", $usuarioLogado->getId(), time()+(60*60*24*30));
    }

    else {
        session_start();
        $_SESSION['idUsuarioLogado'] = $usuarioLogado->getId();
    }
} else {
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/sapataria/login.php?erro=1');
}
?>