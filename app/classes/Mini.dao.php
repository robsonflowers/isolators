<?php
include_once ('Conexao.php');
include_once ('Mini.class.php');

class MiniDAO {
/*  ############################################################################
    CONSULTAS
    ############################################################################
*/
//  Retorna todos os registros
    static public function retornaTodos() {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT m.cod_isolator, m.dt_instalacao, m.contrato, 
                                        n.node as node_atendido, c.nome_colaborador as colaborador_instalou, 
                                        m.mini_inst_emta, m.mini_sub_emta, m.mini_inst_decoder, 
                                        m.mini_sub_decoder
                                FROM mini_isolator AS m
                                INNER JOIN node AS n ON n.cod_node = m.node_atendido
                                INNER JOIN colaborador AS c ON c.cod_colaborador = m.colaborador_instalou
                                ORDER BY m.cod_isolator ASC");
        $arrMini = array();
        foreach ($resultSet as $linha) {
            $arrMini[] = new Mini($linha['cod_isolator'], $linha['dt_instalacao'], $linha['contrato'], $linha['node_atendido'], 
                                  $linha['colaborador_instalou'], $linha['mini_inst_emta'], $linha['mini_sub_emta'],
                                  $linha['mini_inst_decoder'], $linha['mini_sub_decoder']);
        }
        return $arrMini;
    }
    //  Retorna registro informado
    static public function retornaRegistro($registro, $colaborador) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT m.cod_isolator, m.dt_instalacao, m.contrato, 
                                        m.node_atendido, c.nome_colaborador as colaborador_instalou, 
                                        m.mini_inst_emta, m.mini_sub_emta, m.mini_inst_decoder, 
                                        m.mini_sub_decoder
                                FROM mini_isolator AS m
                                INNER JOIN node AS n ON n.cod_node = m.node_atendido
                                INNER JOIN colaborador AS c ON c.cod_colaborador = m.colaborador_instalou
                                WHERE m.cod_isolator = $registro
                                AND c.cod_colaborador = $colaborador");
        $arrMini = "";
        foreach ($resultSet as $linha) {
            $arrMini = new Mini($linha['cod_isolator'], $linha['dt_instalacao'], $linha['contrato'], $linha['node_atendido'], 
                                  $linha['colaborador_instalou'], $linha['mini_inst_emta'], $linha['mini_sub_emta'],
                                  $linha['mini_inst_decoder'], $linha['mini_sub_decoder']);
        }
        return $arrMini;
    }

//  Retorna registros do dia por técnico
    static public function retornaRegistrosDoDia($cod_colaborador) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT m.cod_isolator, m.dt_instalacao, m.contrato, 
                                        n.node as node_atendido, c.nome_colaborador as colaborador_instalou, 
                                        m.mini_inst_emta, m.mini_sub_emta, m.mini_inst_decoder, 
                                        m.mini_sub_decoder
                                FROM mini_isolator AS m
                                INNER JOIN node AS n ON n.cod_node = m.node_atendido
                                INNER JOIN colaborador AS c ON c.cod_colaborador = m.colaborador_instalou
                                WHERE DAY(m.dt_instalacao) = DAY(NOW())
                                AND MONTH(m.dt_instalacao) = MONTH(NOW())
                                AND c.cod_colaborador = $cod_colaborador
                                ORDER BY m.cod_isolator ASC");
        $arrMini = array();
        foreach ($resultSet as $linha) {
            $arrMini[] = new Mini($linha['cod_isolator'], $linha['dt_instalacao'], $linha['contrato'], $linha['node_atendido'], 
                                  $linha['colaborador_instalou'], $linha['mini_inst_emta'], $linha['mini_sub_emta'],
                                  $linha['mini_inst_decoder'], $linha['mini_sub_decoder']);
        }
        return $arrMini;
    }    
    
    //  Retorna todos os registros
    static public function retornaRegistrosColaborador($cod_colaborador) {
        $db = Conexao::getInstance();
        $resultSet = $db->query("SELECT m.cod_isolator, m.dt_instalacao, m.contrato, 
                                        n.node as node_atendido, c.nome_colaborador as colaborador_instalou, 
                                        m.mini_inst_emta, m.mini_sub_emta, m.mini_inst_decoder, 
                                        m.mini_sub_decoder
                                FROM mini_isolator AS m
                                INNER JOIN node AS n ON n.cod_node = m.node_atendido
                                INNER JOIN colaborador AS c ON c.cod_colaborador = m.colaborador_instalou
                                WHERE c.cod_colaborador = $cod_colaborador
                                ORDER BY m.cod_isolator ASC");
        $arrMini = array();
        foreach ($resultSet as $linha) {
            $arrMini[] = new Mini($linha['cod_isolator'], $linha['dt_instalacao'], $linha['contrato'], $linha['node_atendido'], 
                                  $linha['colaborador_instalou'], $linha['mini_inst_emta'], $linha['mini_sub_emta'],
                                  $linha['mini_inst_decoder'], $linha['mini_sub_decoder']);
        }
        return $arrMini;
    } 
    //  Retorna soma de registros por coluna
    static public function somaRegistros($coluna, $data, $opcoes) {
        $where_clause = '';
        if($opcoes!=''){//se houver setada uma opcao de visualizacao sera configurada uma clausura WHERE
            if($opcoes=='dia'){
                $where_clause = 'WHERE DATE(dt_instalacao) = '.date('Y-m-d',$data);
            }
            if($opcoes=='mes'){
                $where_clause = "EXTRACT(MONTH FROM dt_instalacao) = EXTRACT(MONTH FROM $data)
                                    AND
                                EXTRACT(YEAR FROM dt_instalacao) = EXTRACT(YEAR FROM $data)";
            }
            if($opcoes=='hoje'){
                $where_clause = 'WHERE DATE(dt_instalacao) = date(now())';
            }
        }//se não, nao havera clausura WHERE e sera realizada a soma de todos os valores da coluna
            
        $db = Conexao::getInstance();
        $resultSet = $db->prepare("SELECT SUM($coluna) as total FROM mini_isolator $where_clause");
        $resultSet->execute();
        $total = $resultSet->fetch(PDO::FETCH_OBJ);
        return $total->total;
    } 
/*  ############################################################################
    INSERÇÃO
    ############################################################################
*/
//  Insere novo registro de instalação de mini isolator 
     static public function insere($contrato, $node_atendido, $colaborador_instalou, $mini_inst_emta, $mini_sub_emta, $mini_inst_decoder, $mini_sub_decoder) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("INSERT IGNORE INTO mini_isolator (contrato, node_atendido, colaborador_instalou, mini_inst_emta, mini_sub_emta, mini_inst_decoder, mini_sub_decoder) values ($contrato, $node_atendido, $colaborador_instalou, $mini_inst_emta, $mini_sub_emta, $mini_inst_decoder, $mini_sub_decoder)");
        $cmd->execute();
    }
    
/*  ############################################################################
    ALTERAÇÃO
    ############################################################################
*/ 
    //  Atualiza dados do registro selecionado de mini isolator
    static public function atualiza($registro, $contrato, $node_atendido, $mini_inst_emta, $mini_sub_emta, $mini_inst_decoder, $mini_sub_decoder) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("UPDATE mini_isolator SET
                                contrato = $contrato,
                                node_atendido = $node_atendido, 
                                mini_inst_emta = $mini_inst_emta, 
                                mini_sub_emta = $mini_sub_emta, 
                                mini_inst_decoder = $mini_inst_decoder, 
                                mini_sub_decoder = $mini_sub_decoder 
                                WHERE cod_isolator = $registro");
        $cmd->execute();
    }
    
/*  ############################################################################
    EXCLUSÃO
    ############################################################################
*/    
    //  Exclui dados do técnico
    static public function exclui($cod_isolator) {
        $db = Conexao::getInstance();
        $cmd = $db->prepare("DELETE FROM mini_isolator WHERE cod_isolator = $cod_isolator");
        $cmd->execute();
    }
}
