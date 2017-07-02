<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta http-equiv="content-type" content="text/html"; charset="UTF-8">
		<meta name="author" content="Maykon">
		<meta name="keywords" content="sistema, empresa">
		<title> Sistema de Gestão Empresarial </title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	<script>
	function lista() 	
	{
		window.location.assign("http://localhost/prospecta/empresa/lista_empresa.php")
	}	
	</script>
		
	<body>
		<section>
				<?php
					$conn = mysql_connect('localhost', 'root', '');
					$banco = mysql_select_db('DBSistema', $conn);
					if(!$banco)
					{
						echo "Não foi possível selecionar o banco: ".mysql_error();
						exit;
					}
					$CD=$_GET['CD'];
					$sql_delete = "DELETE FROM empresa WHERE CD=$CD";
					mysql_query($sql_delete);
					if(mysql_errno($conn))
					{					
						?>
						<br><br>
						<h2 style="color:white">Falha ao excluir dados!</h2>
						<br><br>
						<td><button name="voltar" type="button" onclick="lista()">Voltar </button></td>
						<?php
					die(); 
					}
					Else 
					{
						?>
						<br><br>
						<h2 style="color:white">Dados deletados com sucesso!</h2>
						<br><br>
						<td><button name="voltar" type="button" onclick="lista()">Voltar </button></td>
						<?php
					}
					mysql_close($conn);
				?>
		</section>
	</body>
</html>