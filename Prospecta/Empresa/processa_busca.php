<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta http-equiv="content-type" content="text/html"; charset="UTF-8">
		<meta name="author" content="Maykon">
		<meta name="keywords" content="sistema, empresa">
		<title> Sistema de Gestão Empresarial </title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
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
			?>
			<br><br>
			<h2 align="center"> Resultado da busca</h2>
			
			<br>
			<table width="100%" border="1px">
				<form>
					<tr>  
						<th bgcolor="#d0d0d0">CNPJ:</th> 
						<th bgcolor="#d0d0d0">Razão Social: </th> 
						<th bgcolor="#d0d0d0">Nome Fantasia: </th> 
						<th bgcolor="#d0d0d0">DDD: </th> 
						<th bgcolor="#d0d0d0">Telefone: </th> 
						<th bgcolor="#d0d0d0">Site: </th>
						<th colspan="2" bgcolor="#d0d0d0" >Ação: </th>
					</tr>
					<?php
						$CNPJ= $_POST['CNPJ'];
						$query = "SELECT * FROM empresa WHERE CNPJ = '$CNPJ'";
						$result = mysql_query($query);
						if($result)
						{ 
							while($row = mysql_fetch_assoc($result))
							{
								echo "<td>".$row['CNPJ']."</td>";
								echo "<td>".$row['RazSoc']."</td>";
								echo "<td>".$row['NmFan']."</td>";
								echo "<td>".$row['DDD']."</td>";
								echo "<td>".$row['Tel']."</td>";
								echo "<td>".$row['Site']."</td>";
								echo "<td><a href= 'edita_empresa.php?CD=".$row['CD']."'>Editar</a></td>";	
								
								?>
								<td><a href="#" onclick="javascript: if(confirm('Você realmente deseja excluir?')) 
									location.href='deleta_empresa.php?CD=<?php echo $row['CD'];?>'">Deletar</a></td>
								</tr>	
								<?php 
							}	
						}	
						$verifica2 = mysql_query("SELECT * FROM empresa WHERE CNPJ ='$CNPJ'") or die ("erro 2");
						if (mysql_num_rows($verifica2)<=0) 
						{
							echo"<script language='javascript' type='text/javascript'>alert('Empresa não cadastrada');window.location.href='busca_empresas.php';</script>";
						}	
											
					mysql_close($conn);
					?>
				</form>
			</table>
		</section>
	</body>
</html>