<?php
//(Data Access Object)CLASSE DE CHAMADA DOS DADOS SALVOS NO BD PARA O ACESSO
require_once $_SERVER['DOCUMENT_ROOT'] ."/sapataria/vo/ItemVenda.php";

class ItemVendaDao {
    public static function inserir($obj){
        try {
            require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
            $sql = "insert into itemVenda(id_venda,id_modelo,quantidade)"
                    . " value(:id_venda,:id_modelo,:quantidade)";
            $pBanco = $dbh->prepare($sql);
            $pBanco -> bindValue(":id_venda", $obj -> getId_venda());
            $pBanco -> bindValue(":id_modelo", $obj -> getId_modelo());
            $pBanco -> bindValue(":quantidade", $obj -> getQuantidade());
            $pBanco->execute();
            return $dbh -> lastInsertId();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " . $ex->getMessage();
        }
    }
    function atualizar($obj){
        require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
        try {
            $sql = "UPDATE itemVenda SET id_venda=:id_venda, id_modelo=:id_modelo,quantidade=:quantidade "
                    . "WHERE id = :id";
            $p_sql = $dbh->prepare($sql);
            $p_sql->bindValue(":id_venda", $obj->getId_venda());
            $p_sql->bindValue(":id_modelo", $obj->getId_modelo());
            $p_sql->bindValue(":quantidade", $obj->getQuantidade());
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
            $sql = "DELETE FROM `itemVenda` WHERE id = :apagarId";
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
            $sql = "SELECT * FROM `itemVenda` where id = :idBuscar";
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
                return new ItemVenda();
            }
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " .
            $ex->getMessage();
        }
    }
    function listarTodos(){
        try {
           require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
           $sql = "SELECT * FROM `itemVenda` order by id ASC";
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
        $obj = new ItemVenda();
        $obj->setId($dados->id);
        $obj->setId_venda($dados->id_venda);
        $obj->setId_modelo($dados->id_modelo);
        $obj->setQuantidade($dados->quantidade);
        return $obj;
    }
}
