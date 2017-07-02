<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<meta http-equiv="content-type" content="text/html"; charset="UTF-8">
	<meta name="author" content="Maykon">
	<meta name="keywords" content="sistema, empresa">
	<title>Gestão Empresarial</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<?php
	//inicia a sessao
	session_start();
	
	//remove as variaveis
	session_unset();

	//destroi a sessao
	session_destroy();
	
	//redireciona a pagina
	echo"<script>window.location.href='index.php'</script>";
?>
</html>