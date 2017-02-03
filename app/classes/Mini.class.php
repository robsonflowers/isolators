<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mini
 *
 * @author Robson
 */
class Mini {
    private $cod_mini;
    private $dt_instalacao;
    private $contrato;
    private $node_atendido;
    private $colaborador_instalou;
    private $mini_inst_emta;
    private $mini_sub_emta;
    private $mini_inst_decoder;
    private $mini_sub_decoder;
    
    function __construct($cod_mini, $dt_instalacao, $contrato, $node_atendido, $colaborador_instalou, $mini_inst_emta, $mini_sub_emta, $mini_inst_decoder, $mini_sub_decoder) {
        $this->cod_mini = $cod_mini;
        $this->dt_instalacao = $dt_instalacao;
        $this->contrato = $contrato;
        $this->node_atendido = $node_atendido;
        $this->colaborador_instalou = $colaborador_instalou;
        $this->mini_inst_emta = $mini_inst_emta;
        $this->mini_sub_emta = $mini_sub_emta;
        $this->mini_inst_decoder = $mini_inst_decoder;
        $this->mini_sub_decoder = $mini_sub_decoder;
    }
    function getCod_mini() {
        return $this->cod_mini;
    }

    function getDt_instalacao() {
        return $this->dt_instalacao;
    }

    function getContrato() {
        return $this->contrato;
    }

    function getNode_atendido() {
        return $this->node_atendido;
    }

    function getColaborador_instalou() {
        return $this->colaborador_instalou;
    }

    function getMini_inst_emta() {
        return $this->mini_inst_emta;
    }

    function getMini_sub_emta() {
        return $this->mini_sub_emta;
    }

    function getMini_inst_decoder() {
        return $this->mini_inst_decoder;
    }

    function getMini_sub_decoder() {
        return $this->mini_sub_decoder;
    }

    function setCod_mini($cod_mini) {
        $this->cod_mini = $cod_mini;
    }

    function setDt_instalacao($dt_instalacao) {
        $this->dt_instalacao = $dt_instalacao;
    }

    function setContrato($contrato) {
        $this->contrato = $contrato;
    }

    function setNode_atendido($node_atendido) {
        $this->node_atendido = $node_atendido;
    }

    function setColaborador_instalou($colaborador_instalou) {
        $this->colaborador_instalou = $colaborador_instalou;
    }

    function setMini_inst_emta($mini_inst_emta) {
        $this->mini_inst_emta = $mini_inst_emta;
    }

    function setMini_sub_emta($mini_sub_emta) {
        $this->mini_sub_emta = $mini_sub_emta;
    }

    function setMini_inst_decoder($mini_inst_decoder) {
        $this->mini_inst_decoder = $mini_inst_decoder;
    }

    function setMini_sub_decoder($mini_sub_decoder) {
        $this->mini_sub_decoder = $mini_sub_decoder;
    }


    
    
}
