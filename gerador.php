<?php

	// require_once( 'vendor/autoload.php' );

	require_once( 'GoogleAuthenticator.php' );

	$autenticador = new GoogleAuthenticator();

	$codigo_secreto = $autenticador->createSecret();

	$website = "Portal Partner HD";
	$titulo = "alexgh@hdmexico.com.mx";
	$url_qr_code = $autenticador->getQRCodeGoogleUrl( $titulo, $codigo_secreto, $website );

	echo "<img src='".$url_qr_code."' /> \n";

?>
