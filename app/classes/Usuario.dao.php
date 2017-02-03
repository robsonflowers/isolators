<?php
include_once ('Conexao.php');
include_once ('Usuario.class.php');

class UsuarioDAO {
/*  ############################################################################
    CONSULTAS
    ############################################################################
*/
//  Retorna todos os usuarios
    static public function retornaTodos() {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT u.cod_usuario, u.nome_usuario, u.senha_usuario, 
                                        n.nivel_acesso as nivel_acesso_usuario, u.colaborador
                                FROM usuario as u
                                INNER JOIN colaborador as c ON c.cod_colaborador = u.colaborador
                                INNER JOIN nivel_acesso as n ON n.cod_nivel_acesso = u.nivel_acesso_usuario");
        $arrUsuario = array();
        foreach ($resultSet as $linha) {
            $arrUsuario[] = new Usuario($linha['cod_usuario'], $linha['nome_usuario'], $linha['senha_usuario'],
                                         $linha['nivel_acesso_usuario'], $linha['colaborador']);
        }
        return $arrUsuario;
    }
//  Retorna usuário por codigo (no sistema) do colaborador, em formato JSON
    static public function retornaUsuarioPorColaboradorJSON($cod_colaborador) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT u.cod_usuario, u.nome_usuario, u.senha_usuario, 
                                        n.nivel_acesso as nivel_acesso_usuario, u.colaborador
                                FROM usuario as u
                                INNER JOIN colaborador as c ON c.cod_colaborador = u.colaborador
                                INNER JOIN nivel_acesso as n ON n.cod_nivel_acesso = u.nivel_acesso_usuario
                                WHERE c.cod_colaborador = $cod_colaborador");
        $resultSet->execute();
        return json_encode($resultSet->fetchAll(PDO::FETCH_ASSOC));
    }    
    
//  Retorna usuário por login NET
    static public function retornaUsuarioPorLoginNET($login_net_colaborador) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT u.cod_usuario, u.nome_usuario, u.senha_usuario, 
                                        n.nivel_acesso as nivel_acesso_usuario, u.colaborador
                                FROM usuario as u
                                INNER JOIN colaborador as c ON c.cod_colaborador = u.colaborador
                                INNER JOIN nivel_acesso as n ON n.cod_nivel_acesso = u.nivel_acesso_usuario
                                WHERE c.login_net_colaborador = '$login_net_colaborador'");
        $usuario = '';
        foreach ($resultSet as $linha) {
            $usuario = new Usuario($linha['cod_usuario'], $linha['nome_usuario'], $linha['senha_usuario'],
                                         $linha['nivel_acesso_usuario'], $linha['colaborador']);
        }
        return $usuario;
    }

/*  ############################################################################
    INSERÇÃO
    ############################################################################
*/
//  Insere novo usuário    
     static public function insere($nome_usuario, $senha_usuario, $nivel_acesso_usuario, $colaborador) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("INSERT IGNORE INTO usuario
                                (nome_usuario, senha_usuario, nivel_acesso_usuario, colaborador) 
                            values ('$nome_usuario', '$senha_usuario', $nivel_acesso_usuario, $colaborador)");
        $cmd->execute();
    }
    
/*  ############################################################################
    ALTERAÇÃO
    ############################################################################
*/ 
//  Atualiza status de usuario
    static public function atualiza($cod_usuario, $nome_usuario, $senha_usuario) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("UPDATE usuario SET
                                nome_usuario = '$nome_usuario', 
                                senha_usuario = '$senha_usuario'
                                where cod_usuario = $cod_usuario");
        $cmd->execute();
    }    
    
/*  ############################################################################
    EXCLUSÃO
    ############################################################################
*/
    //  Exclui usuário
    static public function exclui($cod_usuario) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("DELETE FROM usuario WHERE cod_usuario = $cod_usuario");
        $cmd->execute();
    }
}
