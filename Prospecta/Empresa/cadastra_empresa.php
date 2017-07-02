<!DOCTYOPE HTML>
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
	<h2  align="center">Cadastro de Empresa</h2>
	<form name="cadastro" action="processa_empresa.php" method="POST" onsubmit="valida_cnpj(this.cnpj)">
		<table align="center">
				<td>CNPJ:</td>
				<td><input name="CNPJ" type="text" size="40" m ="18" maxlength="18" OnKeyPress="return mascara(event, this, '##.###.###/####-##')"  autofocus required ></td>
			<tr>
				<td>Razão Social:</td>
				<td><input name="RazSoc" type="text" size="40" maxlength="50" required></td>
			</tr>				
			<tr>
				<td>Nome Fantasia:</td>
				<td><input name="NmFan" "type="text" size="40" maxlength="50" required></td>				
			</tr> 
			<tr>
				<td>Telefone:</td>
				<td><input name="DDD" type="text" size="2" maxlength="2" placeholder="DDD" OnKeyPress="return mascara(event, this, '(##)')" required>
				<input name="Tel" type="text" size="33" maxlength="9" OnKeyPress="return mascara(event, this, '####-#####')" required></td>					
			</tr> 
			<tr>
				<td>Site:</td>
				<td><input name="Site" type="text" size="40" maxlength="40"></td>				
			</tr> 
			<tr>
				<td colspan="2"><input type="submit" value="Enviar" onclick="valida_cnpj()"></td>
				<td><button name="voltar" type="button" onclick="javascript:history.back()">Voltar </button></td>
			</tr>
		</table>
	</form>
</body>
</html>