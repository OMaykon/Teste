<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta http-equiv="content-type" content="text/html"; charset="UTF8">
		<meta name="author" content="Maykon">
		<meta name="keywords" content="Sistema, teste, empresa">
		<title> Sistema de Gestão Empresarial </title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<script>
		function mascara(evt, campo, padrao) 
		{
			var charCode = (evt.which) ? evt.which : evt.keyCode;  
			if (charCode == 9) return true;  
			if (charCode != 46 && (charCode < 48 || charCode > 57)) return false;             
			campo.maxLength = padrao.length;  
			entrada = campo.value;  
			if (padrao.length > entrada.length && padrao.charAt(entrada.length) != '#') 
			{  
				campo.value = entrada + padrao.charAt(entrada.length);                 
			}  
			return true;  
		}  
		function newDoc() 	
		{
			window.location.assign("http://localhost/prospecta/entrada.html")
		}	
		</script>
	</head>

	<body><br>
		<h2 align="center">Buscar Empresa</h2>
		<form name="busca" action="processa_busca.php" method="POST" align="center">
		<table align="center">
			<tr>
				<td>
					<input type="search" name="CNPJ" id="CNPJ" placeholder="CNPJ" OnKeyPress="return mascara(event, this, '##.###.###/####-##')" autofocus required>
				</td>
			</tr> 
			<tr>
				<td>
					<input type="submit" value="Buscar">
					<input type="button" value="Voltar" target="interno" onclick="newDoc()">
				</td>
			</tr>
		</table>
	</form>
	</body>
</html>