<?php
	header('Content-type: text/html; charset=iso-8859-1');
	
	$erro = null;
	$valido = false;
	
	if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true)
	{
		if(strlen(utf8_decode($_POST["nome"])) < 5)
		{
			$erro = "Preencha o campo nome corretamente ( 5 ou mais caracteres)";
		}
		else if (strlen(utf8_decode($_POST["email"])) < 6)
		{
			$erro = "Email inválido, preencha corretamente";
		}
		else if (is_numeric($_POST["idade"]) == false)
		{
			$erro = "Campo Idade deve ser númerico";
		}
		else if (($_POST["sexo"]) != "M" &&  ($_POST["sexo"]) != "F")
		{
			$erro = "Campo idade deve ser númerico";
		}
		else 
		{
			$valido = true;
		}
		
	}
?>
<html>
<head>
	<title>Formulários Avançados</title>
</head>
	<body>
		<?php 
			if ($valido == true)
				echo "Dados enviados com sucesso";
			else 
			{
						
				if (isset($erro))			
					echo $erro . "<br><br>";
			
		?>
				<form method=POST action="Formularios_Avancado.php?validar=true">
					Nome:
					<input type=TEXT name=nome
						<?php 
							if (isset($_POST["nome"]))
								echo "value='" . $_POST["nome"] . "'"; 
						?>			
					><br>
					
					E-mail:
					<input type=TEXT name=email
						<?php 
							if (isset($_POST["email"]))
								echo "value='" . $_POST["email"] . "'"; 
						?>
					><br>
					
					Idade:
					<input type=TEXT name=idade
						<?php 
							if (isset($_POST["idade"]))
								echo "value='" . $_POST["idade"] . "'"; 
						?>
					><br>
					
					Sexo:
					<input type=RADIO name=sexo value="M"
						<?php 
							if (isset($_POST["sexo"]) && $_POST["sexo"] == "M")
								echo "checked"; 
						?>
					>Masculino
					<input type=RADIO name=sexo value="F"
						<?php 
							if (isset($_POST["sexo"]) && $_POST["sexo"] == "F")
								echo "checked"; 
						?>
					>Feminino
					
					<br>
					
					Interesses:
					<input type=CHECKBOX name="humanas"
						<?php 
							if (isset($_POST["humanas"]))
								echo "checked"; 
						?>
					>Ciências Humanas
					<input type=CHECKBOX name="exatas"
						<?php 
							if (isset($_POST["exatas"]))
								echo "checked"; 
						?>
					>Ciências Exatas
					<input type=CHECKBOX name="biologicas"
						<?php 
							if (isset($_POST["biologicas"]))
								echo "checked"; 
						?>
					>Ciências Biológicas
					
					<br>
					
					Estado Civil:
					<select name=estadocivil>
						<option>Selecione...</option>
						<option
							<?php 
							if (isset($_POST["estadocivil"]) && $_POST["estadocivil"] == "Solteiro(a)")
								echo "selected"; 
							?>
						>Solteiro(a)</option>
						
						<option
							<?php 
							if (isset($_POST["estadocivil"]) && $_POST["estadocivil"] == "Casado(a)")
								echo "selected"; 
							?>
						>Casado(a)</option>
						
						<option
							<?php 
							if (isset($_POST["estadocivil"]) && $_POST["estadocivil"] == "Divorciado(a)")
								echo "selected"; 
							?>
						>Divorciado(a)</option>
						
						<option
							<?php 
							if (isset($_POST["estadocivil"]) && $_POST["estadocivil"] == "Viúvo(a)")
								echo "selected"; 
							?>
						>Viúvo(a)</option>
					</select>
					<br>
					
					Senha:
					<input type=PASSWORD name=senha><br>
					
					<input type=SUBMIT value="Enviar">
					
				</form>
		<?php
			}
		?>
	</body>
</html>
