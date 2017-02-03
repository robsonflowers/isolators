<?php
include_once ('Conexao.php');
include_once ('Colaborador.class.php');

class ColaboradorDAO {
/*  ############################################################################
    CONSULTAS
    ############################################################################
*/
//  Retorna todos colaboradores
    static public function retornaTodos() {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT c.cod_colaborador, c.login_net_colaborador, 
                                        c.nome_colaborador, f.nome_funcao as funcao_colaborador
                                FROM colaborador AS c
                                INNER JOIN funcao as f on f.cod_funcao = c.funcao_colaborador
                                ORDER BY c.nome_colaborador ASC");
        $arrColaborador = array();
        foreach ($resultSet as $linha) {
            $arrColaborador[] = new Colaborador($linha['cod_colaborador'], $linha['login_net_colaborador'],
                                                $linha['nome_colaborador'], $linha['funcao_colaborador']);
        }
        return $arrColaborador;
    }
//  Retorna colaborador por login
    static public function retornaPorLoginNET($login_net_colaborador) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT c.cod_colaborador, c.login_net_colaborador, 
                                        c.nome_colaborador, c.funcao_colaborador
                                FROM colaborador AS c
                                WHERE c.login_net_colaborador = '$login_net_colaborador'");
        $colaborador = '';
        foreach ($resultSet as $linha) {
            $colaborador = new Colaborador($linha['cod_colaborador'], $linha['login_net_colaborador'],
                                           $linha['nome_colaborador'], $linha['funcao_colaborador']);
        }
        return $colaborador;
    }    

//  Retorna colaborador por login
    static public function pesquisaUsuario($pesquisa) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT c.cod_colaborador, c.login_net_colaborador, 
                                        c.nome_colaborador, c.funcao_colaborador
                                FROM colaborador AS c
                                INNER JOIN usuario as u on u.colaborador = c.cod_colaborador
                                ORDER BY c.nome_colaborador ASC
                                WHERE u.nome_usuario like '$pesquisa%'");
        $colaborador = array();
        foreach ($resultSet as $linha) {
            $colaborador[] = new Colaborador($linha['cod_colaborador'], $linha['login_net_colaborador'],
                                           $linha['nome_colaborador'], $linha['funcao_colaborador']);
        }
        return $colaborador;
    }    
    
    
//  Retorna técnico por login em formato JSON
    static public function retornaPorLoginNETJSON($login_net_colaborador) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT c.cod_colaborador, c.login_net_colaborador, 
                                        c.nome_colaborador, c.funcao_colaborador
                                FROM colaborador AS c
                                WHERE c.login_net_colaborador = '$login_net_colaborador'
                                ORDER BY c.nome_colaborador ASC");
        $resultSet->execute();
        return json_encode($resultSet->fetchAll(PDO::FETCH_ASSOC));
    } 
    //  Retorna técnico por id em formato JSON
    static public function retornaPorCodColJSON($cod_colaborador) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT c.cod_colaborador, c.login_net_colaborador, 
                                        c.nome_colaborador, c.funcao_colaborador
                                FROM colaborador AS c
                                WHERE c.cod_colaborador = '$cod_colaborador'
                                ORDER BY c.nome_colaborador ASC");
        $resultSet->execute();
        return json_encode($resultSet->fetchAll(PDO::FETCH_ASSOC));
    } 
/*  ############################################################################
    INSERÇÃO
    ############################################################################
*/
//  Insere novo tecnico 
     static public function insere($login_net_colaborador, $nome_colaborador, $funcao_colaborador) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("INSERT IGNORE INTO colaborador (login_net_colaborador, nome_colaborador, funcao_colaborador) values ('$login_net_colaborador', '$nome_colaborador', $funcao_colaborador)");
        $cmd->execute();
    }
    
/*  ############################################################################
    ALTERAÇÃO
    ############################################################################
*/ 
    //  Atualiza dados do colaborador
    static public function atualiza($login_net_colaborador, $nome_colaborador, $funcao_colaborador) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("UPDATE colaborador SET
                                login_net_colaborador = $login_net_colaborador, 
                                nome_colaborador = $nome_colaborador, 
                                funcao_colaborador = $funcao_colaborador
                                WHERE cod_colaborador = $cod_colaborador");
        $cmd->execute();
    }
    
/*  ############################################################################
    EXCLUSÃO
    ############################################################################
*/    
    //  Exclui dados do colaborador
    static public function exclui($idtecnico) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("DELETE FROM colaborador WHERE cod_colaborador = $cod_colaborador");
        $cmd->execute();
    }
}
