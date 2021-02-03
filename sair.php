<?php
//ARQUIVO PHP
session_start();
session_destroy();

setcookie("idUsuarioLogado", 0, time()-100);

header('Location: http://' . $_SERVER['HTTP_HOST'] . '/sapataria/login.php?erro=1');