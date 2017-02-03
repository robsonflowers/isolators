<?php
include_once ('Conexao.php');
include_once ('NivelAcesso.class.php');

class NivelAcessoDAO {
/*  ############################################################################
    CONSULTAS
    ############################################################################
*/
//  Retorna todos os registros de nível de acesso
    static public function retornaTodos() {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT *
                                 FROM nivel_acesso
                                ORDER BY nivel_acesso ASC");
        $arrNivelAcesso = array();
        foreach ($resultSet as $linha) {
            $arrNivelAcesso[] = new NivelAcesso($linha['cod_nivel_acesso'], 
                                             $linha['nivel_acesso'], 
                                             $linha['descricao_nivel_acesso']);
        }
        return $arrNivelAcesso;
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
