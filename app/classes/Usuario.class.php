<?php


class Usuario {
    private $cod_usuario;
    private $nome_usuario;
    private $senha_usuario;
    private $nivel_acesso_usuario;
    private $colaborador;
        
    function __construct($cod_usuario, $nome_usuario, $senha_usuario, $nivel_acesso_usuario, $colaborador) {
        $this->cod_usuario = $cod_usuario;
        $this->nome_usuario = $nome_usuario;
        $this->senha_usuario = $senha_usuario;
        $this->nivel_acesso_usuario = $nivel_acesso_usuario;
        $this->colaborador = $colaborador;
    }

    function getCod_usuario() {
        return $this->cod_usuario;
    }

    function getNome_usuario() {
        return $this->nome_usuario;
    }

    function getSenha_usuario() {
        return $this->senha_usuario;
    }

    function getNivel_acesso_usuario() {
        return $this->nivel_acesso_usuario;
    }

    function getColaborador() {
        return $this->colaborador;
    }

    function setCod_usuario($cod_usuario) {
        $this->cod_usuario = $cod_usuario;
    }

    function setNome_usuario($nome_usuario) {
        $this->nome_usuario = $nome_usuario;
    }

    function setSenha_usuario($senha_usuario) {
        $this->senha_usuario = $senha_usuario;
    }

    function setNivel_acesso_usuario($nivel_acesso_usuario) {
        $this->nivel_acesso_usuario = $nivel_acesso_usuario;
    }

    function setColaborador($colaborador) {
        $this->colaborador = $colaborador;
    }



}
