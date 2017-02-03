<?php

class Colaborador {
    private $cod_colaborador;
    private $login_net_colaborador;
    private $nome_colaborador;
    private $funcao_colaborador;
    
    function __construct($cod_colaborador, $login_net_colaborador, $nome_colaborador, $funcao_colaborador) {
        $this->cod_colaborador = $cod_colaborador;
        $this->login_net_colaborador = $login_net_colaborador;
        $this->nome_colaborador = $nome_colaborador;
        $this->funcao_colaborador = $funcao_colaborador;
    }
    
    function getCod_colaborador() {
        return $this->cod_colaborador;
    }

    function getLogin_net_colaborador() {
        return $this->login_net_colaborador;
    }

    function getNome_colaborador() {
        return $this->nome_colaborador;
    }

    function getFuncao_colaborador() {
        return $this->funcao_colaborador;
    }

    function setCod_colaborador($cod_colaborador) {
        $this->cod_colaborador = $cod_colaborador;
    }

    function setLogin_net_colaborador($login_net_colaborador) {
        $this->login_net_colaborador = $login_net_colaborador;
    }

    function setNome_colaborador($nome_colaborador) {
        $this->nome_colaborador = $nome_colaborador;
    }

    function setFuncao_colaborador($funcao_colaborador) {
        $this->funcao_colaborador = $funcao_colaborador;
    }

}
