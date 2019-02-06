<?php

	require_once( 'gerador.php' );

?>

<form action="verificador.php" method="post" autocomplete="off">

	<p>
		Codigo secreto: <b><?php echo $codigo_secreto; ?></b>
	</p>
	<input type="text" name="codigo" placeholder="Codigo de Seguridad">

	<input type="hidden" value="<?php echo $codigo_secreto; ?>" name="codigosecreto">
	<input type="submit" value="Verificar">

</form>
