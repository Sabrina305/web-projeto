<?php
//(Data Access Object)CLASSE DE CHAMADA DOS DADOS SALVOS NO BD PARA O ACESSO
require_once $_SERVER['DOCUMENT_ROOT'] ."/sapataria/vo/Venda.php";

class VendaDao {
    public static function inserir($obj){
        try{
            require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
            $sql = "insert into venda(id_cliente,id_usuario,id_produto,valorTotal,dataVenda) "
                 . "value(:id_cliente,:id_usuario,:id_produto,:valorTotal,:dataVenda)";
            $pBanco = $dbh->prepare($sql);
            $pBanco -> bindValue(":id_cliente", $obj -> getId_cliente());
            $pBanco -> bindValue(":id_usuario", $obj -> getId_usuario());
            $pBanco -> bindValue(":id_produto", $obj -> getId_produto());
            $pBanco -> bindValue(":valorTotal", $obj -> getValorTotal());
            $pBanco -> bindValue(":dataVenda", $obj -> getDataVenda());
            $pBanco->execute();
            return $dbh -> lastInsertId();
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " . $ex->getMessage();
        }
          
    }
    function atualizar($obj){
        require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
        try {
            $sql = "UPDATE venda SET id_cliente=:id_cliente,id_usuario=:id_usuario,"
                    . "id_produto=:id_produto,valorTotal=:valorTotal,dataVenda=:dataVenda WHERE id = :id";
            $p_sql = $dbh->prepare($sql);
            $p_sql -> bindValue(":id_cliente",$obj -> getId_cliente());
            $p_sql -> bindValue(":id_usuario",$obj -> getId_usuario());
            $p_sql -> bindValue(":id_produto",$obj -> getId_produto());
            $p_sql -> bindValue(":valorTotal",$obj -> getValorTotal());
            $p_sql -> bindValue(":dataVenda",$obj -> getDataVenda());
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
            $sql = "DELETE FROM `venda` WHERE id = :apagarId";
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
            $sql = "SELECT * FROM `venda` where id = :idBuscar";
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
                return new Venda();
            }
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " .
            $ex->getMessage();
        }
    }
    function listarTodos(){
        try {
           require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
           $sql = "SELECT * FROM `venda` order by dataVenda ASC";
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
        $obj = new Venda();
        $obj->setId($dados->id);
        $obj->setId_cliente($dados->id_cliente);
        $obj->setId_usuario($dados->id_usuario);
        $obj->setId_produto($dados->id_produto);
        $obj->setValorTotal($dados->valorTotal);
        $obj->setDataVenda($dados->dataVenda);
        return $obj;
    }
}
