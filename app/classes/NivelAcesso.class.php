<?php


class NivelAcesso {
    private $cod_nivel_acesso;
    private $nivel_acesso;
    private $descricao_nivel_acesso;
    
    function __construct($cod_nivel_acesso, $nivel_acesso, $descricao_nivel_acesso) {
        $this->cod_nivel_acesso = $cod_nivel_acesso;
        $this->nivel_acesso = $nivel_acesso;
        $this->descricao_nivel_acesso = $descricao_nivel_acesso;
    }
    
    function getCod_nivel_acesso() {
        return $this->cod_nivel_acesso;
    }

    function getNivel_acesso() {
        return $this->nivel_acesso;
    }

    function getDescricao_nivel_acesso() {
        return $this->descricao_nivel_acesso;
    }

    function setCod_nivel_acesso($cod_nivel_acesso) {
        $this->cod_nivel_acesso = $cod_nivel_acesso;
    }

    function setNivel_acesso($nivel_acesso) {
        $this->nivel_acesso = $nivel_acesso;
    }

    function setDescricao_nivel_acesso($descricao_nivel_acesso) {
        $this->descricao_nivel_acesso = $descricao_nivel_acesso;
    }


    
}
