<?php
		session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="content-type" content="text/html"; charset="UTF-8">
		<meta name="author" content="Maykon">
		<meta name="keywords" content="sistema, empresa">
		<title>Gestão Empresarial</title>
		<link rel="stylesheet" type="text/css" href="estilo-d.css">		
	</head>
	<body>	
		<div class="login">
			<form  name="login" action="empresa/login.php" method="POST" >
				<center><h1>Gestão Empresarial</h1></center>
					
						<center><label for="nome"></label>
						<input type="text" id="nome" name="nome" placeholder="Login" required> <br>
						
						<label for="senha"></label>
						<input type="password" id="senha" name="senha"  placeholder="Senha" required>	<br><br><br>	
							
						<input class="login" type="submit" value="Login" id="login" name="login"></center>
			</form>
		</div>
		<?php
			if(isset($_POST['login'])){
				
				$nome = $_POST['nome'];
				$senha = $_POST['senha'];
				$connect = mysql_connect('localhost', 'root', '');
				$db = mysql_select_db('DBSistema');			
						   
				echo $verifica = mysql_query("SELECT * FROM admin WHERE nm_admin = '$nome' AND senha_admin = '$senha'") or die("erro ao selecionar");
				if (mysql_num_rows($verifica)<=0){
						echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
						die();
				}else{
					$_SESSION['nome'] = $nome;
					$_SESSION['login'] = "OK";
					echo '<meta http-equiv="refresh" content="0; url=sistema.php">';
				}
			}
		?>
	</body>
</html>




