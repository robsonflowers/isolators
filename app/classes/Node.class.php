<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of node
 *
 * @author Robson
 */
class Node {
    private $cod_node;
    private $node;
    
    function __construct($cod_node, $node) {
        $this->cod_node = $cod_node;
        $this->node = $node;
    }

    function getCod_node() {
        return $this->cod_node;
    }

    function getNode() {
        return $this->node;
    }

    function setCod_node($cod_node) {
        $this->cod_node = $cod_node;
    }

    function setNode($node) {
        $this->node = $node;
    }


}
