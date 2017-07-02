<?php
session_start();

	if(isset($_POST['login']))
	{
		$nome = $_POST['nome'];
		$senha = $_POST['senha'];
		$connect = mysql_connect('localhost', 'root', '');
		$db = mysql_select_db('DBSistema');			
						   
		$verifica = mysql_query("SELECT * FROM admin WHERE nm_admin = '$nome' AND senha_admin = '$senha'") or die ("erro ao selecionar");
		if (mysql_num_rows($verifica)<=0)
		{
			echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
			die();
		}
		else
		{
			$_SESSION['nome'] = $nome;
			$_SESSION['login'] = "OK";
			echo '<meta http-equiv="refresh" content="0; url=sistema.php">';
		}
	}
?>