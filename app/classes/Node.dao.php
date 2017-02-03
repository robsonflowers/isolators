<?php
include_once ('Conexao.php');
include_once ('Node.class.php');

class NodeDAO {
/*  ############################################################################
    CONSULTAS
    ############################################################################
*/
//  Retorna todos os nodes
    static public function retornaTodos() {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT *
                                    FROM node
                                ORDER BY node ASC");
        $arrNode= array();
        foreach ($resultSet as $linha) {
            $arrNode[] = new Node($linha['cod_node'], $linha['node']);
        }
        return $arrNode;
    }
/*  ############################################################################
    INSERÇÃO
    ############################################################################
*/
//  Insere novo node 
     static public function insere($node) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("INSERT IGNORE INTO node (node) values ('$node')");
        $cmd->execute();
    }
    
/*  ############################################################################
    ALTERAÇÃO
    ############################################################################
*/ 
    //  Atualiza nome do Node
    static public function atualiza($cod_node, $node) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("UPDATE node SET
                                node = '$node'
                                WHERE cod_node = $cod_node");
        $cmd->execute();
    }
    
/*  ############################################################################
    EXCLUSÃO
    ############################################################################
*/    
    //  Exclui Node
    static public function exclui($cod_node) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("DELETE FROM node WHERE cod_node = $cod_node");
        $cmd->execute();
    }
}
