<?php
//(Data Access Object)CLASSE DE CHAMADA DOS DADOS SALVOS NO BD PARA O ACESSO
require_once $_SERVER['DOCUMENT_ROOT'] ."/sapataria/vo/FluxoCaixa.php";

class FluxoCaixaDao {
    public static function inserir($obj){
        try{
            require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
            $sql = "insert into fluxocaixa(dataPagamento,descricao,valor,situacao,tipo)"
                    . " values(:dataPagamento,:descricao,:valor,:situacao,:tipo)";
            $pBanco = $dbh->prepare($sql);
            $pBanco -> bindValue(":dataPagamento", $obj -> getDataPagamento());
            $pBanco -> bindValue(":descricao", $obj -> getDescricao());
            $pBanco-> bindValue(":valor", $obj -> getValor());
            $pBanco -> bindValue(":situacao", $obj -> getSituacao());
            $pBanco -> bindValue(":tipo", $obj -> getTipo());
            $pBanco->execute();
            return $dbh -> lastInsertId();
            
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " . $ex->getMessage();

        }
    }
    function atualizar($obj){
        require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
        try {
            $sql = "UPDATE fluxocaixa SET dataPagamento=:dataPagamento,descricao=:descricao,"
                    . "valor=:valor,situacao=:situacao,tipo=:tipo WHERE id = :id";
            $p_sql = $dbh->prepare($sql);
            $p_sql -> bindValue("dataPagamento",$obj -> getDataPagamento());
            $p_sql -> bindValue("descricao",$obj -> getDescricao());
            $p_sql -> bindValue("valor",$obj -> getValor());
            $p_sql -> bindValue("situacao",$obj -> getSituacao());
            $p_sql -> bindValue("tipo",$obj -> getTipo());
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
            $sql = "DELETE FROM `fluxocaixa` WHERE id = :apagarId";
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
            $sql = "SELECT * FROM `fluxocaixa` where id = :idBuscar";
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
                return new FluxoCaixa();
            }
        } catch (Exception $ex) {
            echo "Erro: Não foi possível inserir. " .
            $ex->getMessage();
        }
    }
    function listarTodos(){
        try {
           require $_SERVER['DOCUMENT_ROOT']."/sapataria/bd/Conector.php";
           $sql = "SELECT * FROM `fluxocaixa` order by dataPagamento ASC";
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
        $obj = new FluxoCaixa();
        $obj->setId($dados->id);
        $obj->setDataPagamento($dados->dataPagamento);
        $obj->setDescricao($dados->descricao);
        $obj->setValor($dados->valor);
        $obj->setSituacao($dados->situacao);
        $obj->setTipo($dados->tipo);
        return $obj;
    }
}
