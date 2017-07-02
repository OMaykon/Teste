<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta http-equiv="content-type" content="text/html"; charset="UTF-8">
		<meta name="author" content="Maykon">
		<meta name="keywords" content="sistema, empresa">
		<title> Sistema de Gestão Empresarial </title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<script>
		function mascara(evt, campo, padrao) 
		{
			var DDD = cadastro.DDD.value;
			if (DDD.length == 3) 
			{
				DDD=DDD + ')';
				document.forms[0].DDD.value = DDD;
				return false;
			}
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
			var DDD = cadastro.DDD.value;
		}
		function newDoc() 	
		{
			window.location.assign("http://localhost/prospecta/entrada.html")
		}	
		
		function valida()
		{
			var CNPJ = cadastro.CNPJ.value;
			var DDD = cadastro.DDD.value;
			var Tel = cadastro.Tel.value;
			var RazSoc = cadastro.RazSoc.value;
		
			if (CNPJ.length < 18) 
			{
				alert('CNPJ deve conter 14 números!');
				cadastro.CNPJ.focus();
				return false;
			}
			if (RazSoc.length < 5) 
			{
				alert('Razão Social deve conter mais do que 5 letras!');
				cadastro.RazSoc.focus();
				return false;
			}
			if (DDD.length < 3) 
			{
				alert('DDD deve conter 2 dígitos!');
				cadastro.DDD.focus();
				return false;
			}
			if (Tel.length < 8) 
			{
				alert('Número de telefone faltando números!');
				cadastro.Tel.focus();
				return false;
			}
		}
		</script>
	</head>
	<body>

	<?php
	$conn = mysql_connect('localhost', 'root', '');
		$banco = mysql_select_db('DBSistema', $conn);
		if(!$banco)
		{
			echo "Não foi possível selecionar o banco: ".mysql_error();
			exit;
		}	
	?>
		<br><br>
		<h2  align="center">Cadastro de Empresa</h2>
		<form name="cadastro" action="processa_empresa.php" method="POST">
			<table align="center">
					<td>CNPJ:</td>
					<td><input name="CNPJ" type="text" size="40" m ="18" maxlength="18" OnKeyPress="return mascara(event, this, '##.###.###/####-##')"  autofocus required ></td>
				<tr>
					<td>Razão Social:</td>
					<td><input name="RazSoc" type="text" size="40" maxlength="50" onkeyup="ddd(this)" required></td>
				</tr>				
				<tr>
					<td>Nome Fantasia:</td>
					<td><input name="NmFan" "type="text" size="40" id="" maxlength="50" onkeyup="keyupFunction" required></td>				
				</tr> 
				<tr>
					<td>Telefone:</td>
					<td><input name="DDD" id="ddd" type="text" size="2" maxlength="2" placeholder="DDD"  OnKeyPress="return mascara(event, this, '(##)')"  required>
					<input name="Tel" type="text" size="33" maxlength="9" OnKeyPress="return mascara(event, this, '####-#####')" required></td>					
				</tr> 
				<tr>
					<td>Site:</td>
					<td><input name="Site" type="text" size="40" maxlength="40"></td>				
				</tr> 
				
				<td><input type="button" value="Voltar" target="interno" onclick="newDoc()"></td>
				<td><input type="submit" value="Enviar" target="interno" onclick="return valida()"></td>
				</tr>
			</table>
		</form>
	</body>
</html>