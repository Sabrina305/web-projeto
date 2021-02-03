<?php
//(Data Access Object)CLASSE DE CHAMADA DOS DADOS SALVOS NO BD PARA O ACESSO
require_once $_SERVER['DOCUMENT_ROOT'] ."/sapataria/vo/Usuario.php";

class UsuarioDao {
    public function inserir($obj){
        try{
            require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
            $sql = "insert into usuario(nome,login,senha,email) "
                    . "value(:nome,:login,:senha,:email)";
            $pBanco = $dbh->prepare($sql);
            $pBanco->bindValue(":nome", $obj->getNome());
            $pBanco -> bindValue(":login", $obj -> getLogin());
            $pBanco-> bindValue(":senha", $obj -> getSenha());
            $pBanco -> bindValue(":email", $obj -> getEmail());
            $pBanco->execute();
            return $dbh -> lastInsertId();
   
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " . $ex->getMessage();
        }
    }
    function logar($login, $senha) {
        require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
        try {
            $sql = "SELECT * FROM `usuario` WHERE `login`= :login and `senha`=:senha ";
            $p_sql = $dbh->prepare($sql);
            $p_sql->bindValue(":login", $login);
            $p_sql->bindValue(":senha", $senha);
            $p_sql->execute();
            $dados = $p_sql->fetchAll(PDO::FETCH_OBJ);
            $lista = array();
            foreach ($dados as $p) {
                $lista[] = self::popular($p);
            }
            if (sizeof($lista)>0)
                return $lista[0];
            else{
                return null;
            }
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " .
            $ex->getMessage();
        }
    }
    function atualizar($obj){
        require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
        try {
            $sql = "UPDATE usuario SET nome=:nome,login=:login,senha=:senha,email=:email WHERE id = :id";
            $p_sql = $dbh->prepare($sql);
            $p_sql->bindValue(":nome", $obj->getNome());
            $p_sql->bindValue(":login", $obj->getLogin());
            $p_sql->bindValue(":email", $obj->getEmail());
            $p_sql->bindValue(":senha", $obj->getSenha());
            $p_sql->bindValue(":id", $obj->getId());
            $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " .
            $ex->getMessage();
        }
    }
    function remover($id){
        require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
        try {
            $sql = "DELETE FROM `usuario` WHERE id = :apagarId";
            $p_sql = $dbh->prepare($sql);
            $p_sql->bindValue(":apagarId", $id);
            $p_sql->execute();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " .
            $ex->getMessage();
        }
    }
    function listar(){
        
    }
    function getPorId($id){
        require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
         try {
            $sql = "SELECT * FROM `usuario` where id = :idBuscar";
            $p_sql = $dbh->prepare($sql);
            $p_sql->bindValue(":idBuscar", $id);
            $p_sql->execute();
            $dados = $p_sql->fetchAll(PDO::FETCH_OBJ);
            $lista = array();
            foreach ($dados as $p) {
                $lista[] = self::popular($p);
            }
            if (sizeof($lista)>0)
                return $lista[0];
            else{
                return new Usuario();
            }
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " .
            $ex->getMessage();
        }
    }
    function listarTodos(){
        try {
           require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
           $sql = "SELECT * FROM `usuario` order by nome ASC";
           $pBanco = $dbh->prepare($sql);
           $pBanco->execute();
           $dados = $pBanco->fetchAll(PDO::FETCH_OBJ);
           $lista = array();
           foreach ($dados as $p) {
               $lista[] = self::popular($p);
           }
           return $lista;
           
       } catch (Exception $ex) {
           echo "Erro: Não foi possível inserir. " . $ex->getMessage();
       }
    }
    private static function popular($dados) {
        $obj = new Usuario();
        $obj->setId($dados->id);
        $obj->setNome($dados->nome);
        $obj->setLogin($dados->login);
        $obj->setSenha($dados->senha);
        $obj->setEmail($dados->email);
        return $obj;
    }
}
