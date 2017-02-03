<?php 
    /**
    * Responsavel por reduzir o nome com a quantidade de caracteres informada, sem
    * cortar pedaco do nome e simplificando os sobrenomes: Pedro P. Souza
    *
    * @author Tayron Miranda 
    * @param  {string} $texto Texto
    * @param  {string} $tamanho Quantidade de caracteres
    * @return Texto limitado aos caracteres sem cortar palavras abrevia os nomes do meio
    * @since  12/07/2010
    */
    function reduzirNome( $texto, $tamanho )
    {
        // Se o nome for maior que o permitido
        if( strlen( $texto ) > ( $tamanho - 2 ) )
        {
            $texto = strip_tags( $texto );

            // Pego o primeiro nome
            $palavras    = explode( ' ', $texto );
            $nome       = $palavras[0];

            // Pego o ultimo nome
            $palavras    = explode( ' ', $texto );
            $sobrenome  = trim( $palavras[count( $palavras ) - 1]);

            // Vejo qual e a posicao do ultimo nome
            $ult_posicao= count( $palavras ) - 1;

            // Crio uma variavel para receber os nomes do meio abreviados
            $meio = '';

            // Listo todos os nomes do meios e abrevio eles
            for( $a = 1; $a < $ult_posicao; $a++ ):

                // Enquanto o tamanho do nome nao atingir o limite de caracteres
                // completo com o nomes do meio abreviado
                if( strlen( $nome.' '.$meio.' '.$sobrenome )<=$tamanho ):
                    $meio .= ' '.strtoupper( substr( $palavras[$a], 0,1 ) );
                endif;
            endfor;

        }else{
           $nome       = $texto;
           $meio       = '';
           $sobrenome  = '';
        }

        return trim( $nome.$meio.' '.$sobrenome );
    }
