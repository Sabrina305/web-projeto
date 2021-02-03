<!--
PÁGINA WEB 
-->
<?php
session_start();
if (isset($_SESSION['idUsuarioLogado'])){
     header('Location: http://'.$_SERVER['HTTP_HOST'].'/sapataria/pages/index.php');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       <style type="text/css">
            
        * { margin: 0; padding: 0; font-family:Tahoma; font-size:30pt;}
        #divCenter { 
             
                width: 400px; 
                height: 150px; 
                left: 50%; 
                margin: -130px 0 0 -210px; 
                padding:10px;
                position: absolute; 
                top: 50%; }
        </style> 
    </head>
    <body>
        <div id="divCenter">
            <form action="controle/controleLogin.php" method="post">
                <?php 
                if (isset($_GET['erro'])){
                    echo "<div style='color:red'>Login ou senha errada!</div>";
                }
                ?>
                <div>
                    <label for="login">Login:</label>
                    <input type="text" id="login" name="login" 
                           placeholder="Digite seu login"/>
                </div>
                <div>
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" 
                           placeholder="Digite sua senha"/>
                </div>
                <div>
                    Lembrar de mim 
                    <input type="checkbox" name="lembrar" />
                </div>
                <div>
                    <input type="submit" value="Entrar"/>
                </div>
            </form>
        </div>
        
    </body>
</html>