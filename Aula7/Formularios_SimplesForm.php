<?php
header('Content-type: text/html; charset=iso-8859-1');
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>		
		<title>Formulário Simples: Form</title>
	</head>
	<body>
		<form method=POST action="Formularios_SimplesTratamento.php" >
		  <table width="200px" align="center" style="margin-top: 50px;">
		  <tr><td>
			<table class="table table-striped">
				<tr>
					<td>Nome:</td>
					<td><input type=TEXT name=nome></td>
				</tr>
				<tr>
					<td>Sobrenome:</td>
					<td><input type=TEXT name=sobrenome></td>
				</tr>
				<tr>
					<td>Estado Civil:</td>
					<td>
						<select name=estadocivil class="form-control">
							<option>Solteiro</option>
							<option>Casado</option>
							<option>Divorciado</option>
							<option>Viúvo</option>
						</select>
					</td>
				</tr>				
				<tr>
					<td colspan="2" align="center">
						<button type="RESET" class="btn btn-primary">Limpar</button>
						<button type="SUBMIT" class="btn btn-success">Enviar</button>
					</td>
				</tr>
			</table></td></tr>
			</table>
			<!-- Nome: 
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
			<input type=SUBMIT value="Enviar"> -->
		</form>
	</body>
</html>	

