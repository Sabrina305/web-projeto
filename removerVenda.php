<!--PÁGINA WEB DE REMOVER-->//
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require $_SERVER['DOCUMENT_ROOT'] . "/sapataria/dao/VendaDao.php";
        $dao = new VendaDao();
        $dao->remover($_GET['id']);
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/sapataria/listar/listarVenda.php');
        ?>
    </body>
</html>
