<?php
	require_once( 'gerador.php' );
?>

<form action="verificador.php" method="post" autocomplete="off">
	<img src='<?php echo $url_qr_code ?>'>
	<p>
		Scanea el código QR o ingresa el código en Google Autentication <br><br>
		<b><?php echo $codigo_secreto; ?></b>
	</p>
	<input type="text" name="codigo" placeholder="Codigo de Seguridad">

	<input type="hidden" value="<?php echo $codigo_secreto; ?>" name="codigosecreto">
	<input type="submit" value="Verificar">
</form>



<!-- Solo es un cambio de prueba -->
