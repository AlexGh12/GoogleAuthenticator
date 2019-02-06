<?php

	// Agreamos Clase
	require_once( 'GoogleAuthenticator.php' );

	
	// Creamos Codigo d cliente
	$autenticador = new GoogleAuthenticator();
	$codigo_secreto = $autenticador->createSecret();

	// Declaramos parametros
	$website = "Portal Web";
	$titulo = "mail@domail.com";

	// Creamos codigo QR
	$url_qr_code = $autenticador->getQRCodeGoogleUrl( $titulo, $codigo_secreto, $website );

?>
