<!--PÁGINA WEB DE REMOVER USUÁRIO-->//
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require $_SERVER['DOCUMENT_ROOT'] . "/sapataria/dao/UsuarioDao.php";
        $dao = new UsuarioDao();
        $dao->remover($_GET['id']);
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/sapataria/listar/listarUsuario.php');
        ?>
    </body>
</html>
