<?php
		session_start();
	?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta http-equiv="content-type" content="text/html"; charset="UTF-8">
		<meta name="author" content="Maykon">
		<meta name="keywords" content="sistema, empresa">
		<title>Gestão Empresarial</title>
		<link rel="stylesheet" type="text/css" href="estilo-d.css">		
	</head>
	<body style="background-color: grey;">	
		<div class="login">
			<form  method="POST" action="login.php">
				<center><h1>Gestão Empresarial</h1></center>
					
				<center><label for="nome"></label>
				<input type="text" id="nome" name="nome" placeholder="Login" required> <br>
						
				<label for="senha"></label>
				<input type="password" id="senha" name="senha"  placeholder="Senha" required>	<br><br><br>	
							
				<input class="login" type="submit" value="Login" id="login" name="login"></center>
			</form>
		</div>
	</body>
</html>




