<?php
header('Content-type: text/html; charset=iso-8859-1');
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Formulário Simples: Form</title>
	</head>
	<body>
		<form method=POST action="Formularios_SimplesTratamento.php">
			Nome: 
			<input type=TEXT name=nome><br>
			Sobrenome:
			<input type=TEXT name=sobrenome><br>
			Estado civil:
			<select name=estadocivil>
				<option>Solteiro</option>
				<option>Casado</option>
				<option>Divorciado</option>
				<option>Viúvo</option>
			</select>
			<br><br>
			<input type=RESET value="Limpar">
			<input type=SUBMIT value="Enviar">
		</form>
	</body>
</html>	

