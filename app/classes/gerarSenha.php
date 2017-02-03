<?php
   function gerar_senha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos){
      $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiusculas
      $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
      $nu = "0123456789"; // $nu contem os numeros
      $si = "!@#$%¨&*()_+="; // $si contem os sibolos
                                        
      if ($maiusculas){
            // se $maiusculas for "true", a variavel $ma é embaralhada e adicionada para a variavel $senha
            $senha .= str_shuffle($ma);
      }
        
        if ($minusculas){
            // se $minusculas for "true", a variavel $mi é embaralhada e adicionada para a variavel $senha
            $senha .= str_shuffle($mi);
        }
        
        if ($numeros){
            // se $numeros for "true", a variavel $nu é embaralhada e adicionada para a variavel $senha
            $senha .= str_shuffle($nu);
        }
        
        if ($simbolos){
            // se $simbolos for "true", a variavel $si é embaralhada e adicionada para a variavel $senha
            $senha .= str_shuffle($si);
        }
        
        // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variavel $tamanho
        return substr(str_shuffle($senha),0,$tamanho);
    }
?>
