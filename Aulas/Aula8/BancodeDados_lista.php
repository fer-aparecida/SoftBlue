<?php
	header('Content-type: text/html; charset=iso-8859-1');
        //Testando git no netbeans
?>
	
<html>
	<head>
		<title>banco de dados - lista</title>
	</head>
	<body>
		<table border=1>
			<tr>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Idade</th>
				<th>Sexo</th>
				<th>Estado Civil</th>
				<th>Humanas</th>
				<th>Exatas</th>
				<th>Biol�gicas</th>
				<th>Hash da senha</th>	
				<th>A��es</th>			
			</tr>
			
			<?php 
				//Conex�o com o banco de dados
				try {
					$connection = new PDO("mysql:host=localhost;dbname=cursophp", "root", "");
				
					$connection->exec("set names utf8"); // garantir que a comunica��o entre o banco e o PHP aceitem caracteres especiais
						
				}catch(PDOException $e){
				
					echo "Falha: " . $e->getMessage();
					exit();
				}
				//Exclus�o 
				if (isset($_REQUEST["excluir"]) && $_REQUEST["excluir"] == true)
				{
					$stmt = $connection->prepare("DELETE FROM usuarios WHERE id = ?");
					
					$stmt->bindParam(1, $_REQUEST["id"]);
					
					$stmt->execute();
					
					if ($stmt->errorCode() != "00000")
					{
						echo "Erro c�digo " . $stmt->errorCode() . ": ";
						echo implode(",", $stmt->errorInfo());
					}
					else 
					{
						echo "sucesso: Usu�rio removido com sucesso.";
					}				
					
				}
				
				//Garregando a lista // Sele��o
				$rs = $connection->prepare("SELECT * FROM usuarios");
				
				if ($rs->execute())
				{
					while($registro = $rs->fetch(PDO::FETCH_OBJ)) //Vai ler linha a linha
					{
						echo "<tr>";
						
						echo "<td>" . $registro->nome . "</td>";
						echo "<td>" . $registro->email . "</td>";
						echo "<td>" . $registro->idade . "</td>";
						echo "<td>" . $registro->sexo . "</td>";
						echo "<td>" . $registro->estado_civil . "</td>";
						echo "<td>" . $registro->humanas . "</td>";
						echo "<td>" . $registro->exatas . "</td>";
						echo "<td>" . $registro->biologicas . "</td>";
						echo "<td>" . $registro->senha . "</td>";
						echo "<td>";
						echo "<a href='?excluir=true&id=" . $registro->id . "'>(exclus�o)</a>";
						echo "</td>";
						echo "<td>";
						echo "<a href='?alterar=true&id=" . $registro->id . "'>(alterar)</a>";
						echo "</td>";
						echo "</tr>";
					}
				}
				else 
				{
					echo "Falha na sele��o de usu�rios.";
				 
				}
				
				
			?>
			
		</table>
		
		<br>
		<a href="Formularios_Avancado_Banco.php">Criar um novo registro</a>
	</body>
</html>