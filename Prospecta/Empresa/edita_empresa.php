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
			var charCode = (evt.which) ? evt.which : evt.keyCode;  
			if (charCode == 9) return true;  
			if (charCode != 46 && (charCode < 48 || charCode > 57)) return false;             
			campo.maxLength = padrao.length;  
			entrada = campo.value;  
			if (padrao.length > entrada.length && padrao.charAt(entrada.length) != '#') {  
				campo.value = entrada + padrao.charAt(entrada.length);                 
			}  
			return true;  
		}  
		function newDoc() 	
		{
			window.location.assign("http://localhost/prospecta/empresa/lista_empresa.php")
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
			if (DDD.length == 3) 
			{
				DDD=DDD + ')';
				document.forms[0].DDD.value = DDD;
				return false;
			}
		}
		</script>
	</head>
	<body>
		<div align="center">
			<?php
			$conn = mysql_connect('localhost', 'root', '');
			$banco = mysql_select_db('DBSistema', $conn);
			if(!$banco)
			{
				echo "Não foi possível selecionar o banco: ".mysql_error();
				exit;
			}
			//definir a consulta
			$CD=$_GET['CD'];
			$query = "SELECT *  FROM empresa WHERE CD=$CD";
			
			//executa a consulta
			
			$result = mysql_query($query);	
			
			if($result)
			{
				$row = mysql_fetch_assoc($result);	
				$cd=$_GET['CD'];
			}	
			?>
			<br><br>
			<h2>Editar Cadastro da Empresa</h2>
			<form name="cadastro" action="processa_empresa.php" method="POST">
				<table>			
					<tr>
					<input type = "hidden" name="CD" id="CD" value="<?php echo $row['CD']; ?>">
						<td>CNPJ: </td>
						<td><input name="CNPJ" type="text" size="40" maxlength="18" OnKeyPress="return mascara(event, this, '##.###.###/####-##')" value="<?php echo $row['CNPJ'];?>" disabled></td>
					</tr>				
					<tr>
						<td>Razão Social:</td>
						<td><input name="RazSoc" type="text" size="40" maxlength="40" value="<?php echo $row['RazSoc'];?>" required></td>
					</tr>
					<tr>
						<td>Nome Fantasia:</td>
						<td><input name="NmFan" type="text" size="40" maxlength="40" value="<?php echo $row['NmFan'];?>" required></td>
					</tr>
					<tr>
						<td>Telefone:</td>
						<td><input name="DDD" type="text" size="2" placeholder="DDD" maxlength="2" OnKeyPress="return mascara(event, this, '(##)')" value="<?php echo $row['DDD'];?>" required>
						<input name="Tel" type="text" size="33" maxlength="9" OnKeyPress="return mascara(event, this, '####-#####')" value="<?php echo $row['Tel'];?>" required></td>
					</tr>	
					<tr>
						<td>Site:</td>
						<td><input name="Site" type="text" size="40" value="<?php echo $row['Site'];?>"></td>
					</tr>										
					<br>
					<tr>
						<td><input type="button" value="Voltar" target="interno" onclick="newDoc()"></td>
						<td><input type="submit" value="Enviar" onclick="return valida()"></td>
					</tr>
				</table>		
			</form>
			<?php 
				mysql_close($conn);
			?>
		</div>
	</body>
</html>