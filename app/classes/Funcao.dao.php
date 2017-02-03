<?php
include_once ('Conexao.php');
include_once ('Funcao.class.php');

class FuncaoDAO {
/*  ############################################################################
    CONSULTAS
    ############################################################################
*/
//  Retorna todos os registros de nível de acesso
    static public function retornaTodos() {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT * FROM funcao");
        $arrFuncao = array();
        foreach ($resultSet as $linha) {
            $arrFuncao[] = new Funcao($linha['cod_funcao'], $linha['nome_funcao']);
        }
        return $arrFuncao;
    }

/*  ############################################################################
    INSERÇÃO
    ############################################################################
*/
//  Insere nível de acesso
     static public function insere($nivel_acesso, $descricao_nivel_acesso) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("INSERT IGNORE INTO tecnicos (nivel_acesso, descricao_nivel_acesso) values ($nivel_acesso, '$descricao_nivel_acesso')");
        $cmd->execute();
    }
    
/*  ############################################################################
    ALTERAÇÃO
    ############################################################################
*/ 
    //  Atualiza dados do nível de acesso
    static public function atualiza($cod_nivel_acesso, $nivel_acesso, $descricao_nivel_acesso) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("UPDATE nivel_acesso SET
                                nivel_acesso = $nivel_acesso,
                                descricao_nivel_acesso = '$descricao_nivel_acesso' 
                                WHERE idtecnico = $cod_nivel_acesso");
        $cmd->execute();
    }
    
/*  ############################################################################
    EXCLUSÃO
    ############################################################################
*/    
    //  Exclui nível de acesso
    static public function exclui($cod_nivel_acesso) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("DELETE FROM nivel_acesso WHERE cod_nivel_acesso = $cod_nivel_acesso");
        $cmd->execute();
    }
}
