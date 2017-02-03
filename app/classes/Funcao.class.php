<?php


class Funcao {
    private $cod_funcao;
    private $nome_funcao;
    
    function __construct($cod_funcao, $nome_funcao) {
        $this->cod_funcao = $cod_funcao;
        $this->nome_funcao = $nome_funcao;
    }

    
    function getCod_funcao() {
        return $this->cod_funcao;
    }

    function getNome_funcao() {
        return $this->nome_funcao;
    }

    function setCod_funcao($cod_funcao) {
        $this->cod_funcao = $cod_funcao;
    }

    function setNome_funcao($nome_funcao) {
        $this->nome_funcao = $nome_funcao;
    }


}
