<div align="center">
<script>
	function newDoc() 	
	{
		window.location.assign("http://localhost/prospecta/entrada.html")
	}
	function lista() 	
	{
		window.location.assign("http://localhost/prospecta/empresa/lista_empresa.php")
	}		
</script>
<?php
	$conn = mysql_connect('localhost','root','');
	$banco = mysql_select_db('DBSistema',$conn);
	if(!$banco)
	{
		echo "Não foi possível selecionar o banco!".mysql_error();
	}
	
	$RazSoc= $_POST["RazSoc"];
	$NmFan = $_POST["NmFan"];
	$DDD = $_POST["DDD"];	
	$Tel = $_POST["Tel"];	
	$Site = $_POST["Site"];	
	
	if(!isset($_POST['CD'])) //insere quando não existe o $_POST['cd']
	{
		$CNPJ = $_POST["CNPJ"];
		$verifica1 = mysql_query("SELECT * FROM empresa WHERE CNPJ = '$CNPJ'");
		if (mysql_num_rows($verifica1)>0)
		{ 
			?>
			<br><br>
			<h2 style="color:white">Empresa já cadastrada!</h2>
			<br><br>
			<td><input type="button" value="Voltar" target="interno" onclick="newDoc()"></td>
			<?php
		}
		
		$verifica2 = mysql_query("SELECT * FROM empresa WHERE CNPJ ='$CNPJ'") or die ("erro 2");
		if (mysql_num_rows($verifica2)<=0) 
		{
			$sql = "INSERT INTO empresa (CNPJ,  RazSoc,   NmFan,  DDD,  Tel,  Site)
				VALUES ('$CNPJ', '$RazSoc', '$NmFan', '$DDD', '$Tel', '$Site')";

			$result= mysql_query($sql);
			//exibe mensagem com sucesso
			if($result)
			{
				?>
				<br><br>
				<h2 style="color:white">Dados inseridos com sucesso!</h2>
				<br><br>
				<td><input type="button" value="Voltar" target="interno" onclick="newDoc()"></td>
				<?php
			}
			else
			{
				?>
				<br><br>
				<h2 style="color:white">Erro ao inserir dados!</h2>
				<br><br>
				<td><button name="voltar" type="button" onclick="lista()">Voltar </button></td>
				<?php
			}
		}	
	}
	else
	{
		$CD = $_POST['CD'];
		//comando atualiza
		$update = "UPDATE `empresa` SET `RazSoc`='$RazSoc',`NmFan`='$NmFan',`DDD`='$DDD',`Tel`='$Tel',`Site`='$Site' WHERE CD = $CD";
		$result=mysql_query($update);	
		if($result)
		{
			?>
			<br><br>
			<h2 style="color:white">Dados alterados com sucesso!</h2>
			<br><br>
			<td><button name="voltar" type="button" onclick="lista()">Voltar </button></td>
			<?php
		}
		else
		{
			?>
			<br><br>
			<h2 style="color:white">Erro ao alterar dados!</h2>
			<br><br>
			<td><button name="voltar" type="button" onclick="lista()">Voltar </button></td>
			<?php
		}		
	}
	mysql_close($conn);
?>
</div>