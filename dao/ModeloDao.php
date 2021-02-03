<?php
//(Data Access Object)CLASSE DE CHAMADA DOS DADOS SALVOS NO BD PARA O ACESSO
require_once $_SERVER['DOCUMENT_ROOT'] . "/sapataria/vo/Modelo.php";
class ModeloDao {
    function inserir($obj){
       try {
           require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
           $sql = "insert into modelo(marca,cor,tipo,preco,estoque,tamanho) "
                   . "values(:marca,:cor,:tipo,:preco,:estoque,:tamanho)";
           $p_sql = $dbh->prepare($sql);
           $p_sql -> bindValue(":marca", $obj -> getMarca());
           $p_sql -> bindValue(":cor", $obj -> getCor());
           $p_sql-> bindValue(":tipo", $obj -> getTipo());
           $p_sql -> bindValue(":preco", $obj -> getPreco());
           $p_sql -> bindValue(":estoque", $obj -> getEstoque());
           $p_sql -> bindValue(":tamanho", $obj -> getTamanho());
           $p_sql->execute();
           return $dbh -> lastInsertId();
           
       } catch (Exception $ex) {
           echo "Erro: Não foi possível inserir. " . $ex->getMessage();
       }
      }
    function atualizar($obj){
        require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
        try {
            $sql = "UPDATE modelo SET marca=:marca,cor=:cor,tipo=:tipo,preco=:preco,"
                    . "estoque=:estoque,tamanho=:tamanho WHERE id = :id";
            $p_sql = $dbh->prepare($sql);
            $p_sql -> bindValue(":marca", $obj -> getMarca());
            $p_sql -> bindValue(":cor", $obj -> getCor());
            $p_sql-> bindValue(":tipo", $obj -> getTipo());
            $p_sql -> bindValue(":preco", $obj -> getPreco());
            $p_sql -> bindValue(":estoque", $obj -> getEstoque());
            $p_sql -> bindValue(":tamanho", $obj -> getTamanho());
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
            $sql = "DELETE FROM `modelo` WHERE id = :apagarId";
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
            $sql = "SELECT * FROM `modelo` where id = :idBuscar";
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
                return new Modelo();
            }
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " .
            $ex->getMessage();
        }
    }
    function listarTodos(){
        try {
           require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
           $sql = "SELECT * FROM `modelo` order by marca ASC";
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
        $obj = new Modelo();
        $obj->setId($dados->id);
        $obj->setMarca($dados->marca);
        $obj->setCor($dados->cor);
        $obj->setTipo($dados->tipo);
        $obj->setPreco($dados->preco);
        $obj->setEstoque($dados->estoque);
        $obj->setTamanho($dados->tamanho);
        return $obj;
    }
}
?>