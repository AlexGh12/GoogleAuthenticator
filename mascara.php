<?php

  function mascara( $valor, $mascara ){

    $mascarado = '';
    $indice = 0;

    for( $i = 0; $i<=strlen($mascara)-1; $i++ ){

      if( $mascara[$i] == '#' ){

        if( isset( $valor[$indice] ) ){

          $mascarado .= $valor[$indice++];

        }

      }else{

        if( isset( $mascara[$i] ) ){

          $mascarado .= $mascara[$i];

        }

      }

    }

    return $mascarado;

  }

?>
