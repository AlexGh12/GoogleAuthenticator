<?php

	// Agregamos Clase
	require_once( 'GoogleAuthenticator.php' );

	// Creamos Objeto
	$autenticador = new GoogleAuthenticator();

	// Declaramos Varibles que recibimos por metodo POST
	$codigo_secreto = $_POST["codigosecreto"];
	$codigo_verificador = $_POST["codigo"];

	// Verificamos Codigo se seguridad
	$resultado = $autenticador->verifyCode( $codigo_secreto, $codigo_verificador, 0 );

	// Imprimimos mensaje dependiendo la valicez del codigo
	if( $resultado ){
		echo "<b>Codigo Valido!!</b> :D";
	}else{
		echo "El Codigo <b> NO ES valido </b>";
	}

?>
