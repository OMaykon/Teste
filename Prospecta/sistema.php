<?php
	session_start();	
				 
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) {
			   unset($_SESSION['nome']);
			  unset($_SESSION['senha']);
			header('location:index.php');
		} 
		$logado = $_SESSION['login'];
	?>	
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta http-equiv="content-type" content="text/html"; charset="UTF-8">
		<meta name="author" content="Maykon">
		<meta name="keywords" content="sistema, empresa">
		<title>Gestão Empresarial</title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	
	<body style="background-color: grey;">
		<div id="box">
			<header>
			<a   href="logout.php"><img src="img/logout.png" style="float:right; height:50px; width:50px"></a>
				<br><h1 style="color:white"> <a href="entrada.html" target="interno" class="titulo"> <p style="color:white">Gestão Empresarial</p> </a></h1>
					<div style="text-align:center; display:inline;">
					<ul id="menu">
						<li><a href="sistema.php">Home</a></li>
						<li>
							<a>Empresas</a>
							<ul>
								<li><a href="empresa/cadastra_empresa.php" target="interno">Cadastrar empresa</a></li>		
								
								<li><a href="empresa/lista_empresa.php" target="interno">Listar empresas</a></li>
								
								<li><a href="empresa/busca_empresas.php" target="interno">Buscar empresa</a></li>
							</ul>
						</li>						
					</ul>
					</div>
					<br>
			</header>
			
			<iframe name="interno" src="entrada.html"> </iframe>
			<br> <br>
			<footer><a href= "http://orig02.deviantart.net/0ad0/f/2011/288/3/c/nothing_to_do_here_by_rober_raik-d4cxltj.png" style=a:link{color:black;>_</a></footer> 
		</div>
	</body>
</html>