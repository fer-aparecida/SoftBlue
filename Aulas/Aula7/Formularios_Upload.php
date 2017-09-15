<?php
	header('Content-type: text/html; charset=iso-8859-1');
?>
	
<html>
	<head>
		<title>Formul�rio Upload</title>
	</head>
	<body>
<?php
	if (isset($_REQUEST["envio"]) && $_REQUEST["envio"] == "true")
	{
		$erro = 0;
		if (isset($_FILES["campoArquivo"]))
		{
			$arquivoNome = $_FILES["campoArquivo"]["name"];
			$arquivoTipo = $_FILES["campoArquivo"]["type"];
			$arquivoTamanho = $_FILES["campoArquivo"]["size"];
			$arquivoNomeTemp = $_FILES["campoArquivo"]["tmp_name"];
			
			$erro = $_FILES["campoArquivo"]["error"];
			
			if ($erro == 0)
			{
				if (is_uploaded_file($arquivoNomeTemp))
				{
					if (move_uploaded_file($arquivoNomeTemp, "uploads/".$arquivoNome))
					{
						echo "Sucesso!"."<br>";
						
						echo "Nome original: " . $arquivoNome. "<br>";
						echo "Tipo: " . $arquivoTipo. "<br>";
						echo "Tamanho: " . $arquivoTamanho. "<br>";
						echo "Nome tempor�rio: " . $arquivoNomeTemp. "<br>";
						 
					}
					else 
					{
						$erro = "Falha ao mover o arquivo (permiss�o de acesso, caminho inv�lido).";
					}
				}
				else 
				{
					$erro = "Erro no envio: arquivo n�o recebido com sucesso.";
				}
			}
			else 
			{
				$erro = "Erro no envio: " . $erro;
			}
					
		}
		else 
		{
			$erro = "Arquivo enviado n�o encontrado.";
		}
		
		if ($erro !== 0)
		{
			echo $erro;	
		}
	}

?>
	<form enctype="multipart/form-data" method=POST action="Formularios_Upload.php?envio=true">
		Arquivo:
		<input type=FILE name="campoArquivo"><br>
		<input type=SUBMIT value="Enviar">
		
	</form>
	</body>
</html>


<!--<?php?>-->
