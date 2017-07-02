<!DOCTYOPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="content-type" content="text/html"; charset="UTF-8">
		<meta name="author" content="Maykon">
		<meta name="keywords" content="sistema, empresa">
		<title> Sistema de Gestão Empresarial </title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	<body align="center">
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
						echo "Falha ao excluir dados do banco";
						die(); 
					}
					Else 
					{
						echo "Empresa deletada com sucesso!";
					}
					mysql_close($conn);
				?>
		</section>
	</body>
</html>