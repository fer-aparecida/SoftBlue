<?php
header('Content-type: text/html; charset=iso-8859-1');
?>
<html>
<head>
	<title>Formul�rios Simples: Tratamento</title>
</head>
	<body>
<?php
	if (isset($_POST["nome"])) {
		echo "Nome informado: " . $_POST["nome"] . "<br>";
	}
	else {
		echo "Nome n�o informado". "<br>";
	}
	if (isset($_POST["sobrenome"])) {
		echo "Sobrenome informado: " . $_POST["sobrenome"] . "<br>";
	}
	else {
		echo "Sobre Nome n�o informado";
	}
	if (isset($_POST["estadocivil"])) {
		echo "Estado Civil informado: " . $_POST["estadocivil"] . "<br>";
	}
	else {
		echo "Estado Civil n�o informado";
	}
?>	
	</body>
</html>	


