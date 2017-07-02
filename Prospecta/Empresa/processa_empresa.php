<div align="center">
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
		$sql = "INSERT INTO empresa (CNPJ,  RazSoc,   NmFan,  DDD,  Tel,  Site)
				VALUES ('$CNPJ', '$RazSoc', '$NmFan', '$DDD', '$Tel', '$Site')";

		$result= mysql_query($sql);
		//exibe mensagem com sucesso
		if($result)
		{
			echo "Dados inseridos com sucesso!<br><br>";
			?>
			<td><button name="voltar" type="button" onclick="javascript.href=lista_empresa.php()">Voltar </button></td>
			<?php
		}
		else
		{
			echo "Erro ao inserir os dados: ".mysql_error();
		}
	}
	else
	{
		$CD = $_POST['CD'];
		//comando atualiza
		//$update = "UPDATE empresa SET RazSoc=$RazSoc, NmFan=$NmFan, DDD=$DDD, Tel=$Tel, Site=$Site WHERE CD=$CD";
		$update = "UPDATE `empresa` SET `RazSoc`='$RazSoc',`NmFan`='$NmFan',`DDD`='$DDD',`Tel`='$Tel',`Site`='$Site' WHERE CD = $CD";
		$result=mysql_query($update);	
		if($result)
		{
			echo "Dados alterados com sucesso!<br><br>";
			?>
			<td><button name="voltar" type="button" onclick="javascript.href=lista_empresa.php()">Voltar </button></td>
			<?php
		}
		else
		{
			echo "Erro ao alterar os dados: ".mysql_error();
		}		
	}
	mysql_close($conn);
?>
</div>