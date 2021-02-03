<!--PÁGINA WEB DE REMOVER-->//
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require $_SERVER['DOCUMENT_ROOT'] . "/sapataria/dao/ModeloDao.php";
        $dao = new ModeloDao();
        $dao->remover($_GET['id']);
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/sapataria/listar/listarModelo.php');
        ?>
    </body>
</html>
