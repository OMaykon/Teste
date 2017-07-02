<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="content-type" content="text/html"; charset="UTF8">
	<meta name="author" content="Maykon">
	<meta name="keywords" content="Sistema, ordem, serviço">
	<title> Sistema Web </title>
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
	echo "<meta http-equiv='refresh' content='0' url=index.php>";
	
			
	
?>





