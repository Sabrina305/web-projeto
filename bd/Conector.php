<?php
//CONECTOR DO BANCO DE DADOS COM O PROJETO
$dsn = 'mysql:dbname=sapataria;host=localhost;port=3307';
$user = 'root';
$password = '';
$dbh = null;
try {
    $dbh = new PDO($dsn, $user, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ));
} catch (PDOException $e) {
    echo 'FALHA NA CONEXÃO!!!!! ' . $e->getMessage();
}
?>

