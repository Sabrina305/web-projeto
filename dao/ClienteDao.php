<?php
//(Data Access Object)CLASSE DE CHAMADA DOS DADOS SALVOS NO BD PARA O ACESSO
require_once $_SERVER['DOCUMENT_ROOT'] . "/sapataria/vo/Cliente.php";
class ClienteDao {
    function inserir($obj){
       try {
           require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
           $sql = "insert into cliente(nome,cpf,cidade,bairro,rua,numeroCasa) "
                   . "values(:nome,:cpf,:cidade,:bairro,:rua,:numeroCasa)";
           $p_sql = $dbh->prepare($sql);
           $p_sql -> bindValue(":nome", $obj -> getNome());
           $p_sql -> bindValue(":cpf", $obj -> getCpf());
           $p_sql-> bindValue(":cidade", $obj -> getCidade());
           $p_sql -> bindValue(":bairro", $obj -> getBairro());
           $p_sql -> bindValue(":rua", $obj -> getRua());
           $p_sql -> bindValue(":numeroCasa", $obj -> getNumeroCasa());
           $p_sql->execute();
           return $dbh -> lastInsertId();
           
       } catch (Exception $ex) {
           echo "Erro: Não foi possível inserir. " . $ex->getMessage();
       }
      }
    function atualizar($obj){
        require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
        try {
            $sql = "UPDATE cliente SET nome=:nome,cpf=:cpf,cidade=:cidade,bairro=:bairro,"
                    . "rua=:rua,numeroCasa=:numeroCasa WHERE id = :id";
            $p_sql = $dbh->prepare($sql);
            $p_sql -> bindValue(":nome", $obj -> getNome());
            $p_sql -> bindValue(":cpf", $obj -> getCpf());
            $p_sql-> bindValue(":cidade", $obj -> getCidade());
            $p_sql -> bindValue(":bairro", $obj -> getBairro());
            $p_sql -> bindValue(":rua", $obj -> getRua());
            $p_sql -> bindValue(":numeroCasa", $obj -> getNumeroCasa());
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
            $sql = "DELETE FROM `cliente` WHERE id = :apagarId";
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
            $sql = "SELECT * FROM `cliente` where id = :idBuscar";
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
                return new Cliente();
            }
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " .
            $ex->getMessage();
        }
    }
    function listarTodos(){
        try {
           require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
           $sql = "SELECT * FROM `cliente` order by nome ASC";
           $p_sql = $dbh->prepare($sql);
           $p_sql->execute();
           $dados = $p_sql->fetchAll(PDO::FETCH_OBJ);
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
        $obj = new Cliente();
        $obj->setId($dados->id);
        $obj->setNome($dados->nome);
        $obj->setCpf($dados->cpf);
        $obj->setCidade($dados->cidade);
        $obj->setBairro($dados->bairro);
        $obj->setRua($dados->rua);
        $obj->setNumeroCasa($dados->numeroCasa);
        return $obj;
    }
}
?>