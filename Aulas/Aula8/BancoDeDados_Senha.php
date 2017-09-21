<?php
	
    $erro = null;
    $valido = false;
    
    //Conexão com banco
    try {
        $connection = new PDO("mysql:host=localhost;dbname=cursophp", "root", "");

        $connection->exec("set names utf8"); // garantir que a comunica��o entre o banco e o PHP aceitem caracteres especiais

    }catch(PDOException $e){

        echo "Falha: " . $e->getMessage();
        exit();
            }
    
    if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true)
    {
        if($_POST["senha"] != $_POST["senhaRepete"])
        {
            $erro = "Senhas digitadas diferentes";
            $erro .= "<br><a href='?id=" . $_POST["id"] . "'> Tentar novamente </a>";
            
            echo $erro;
            exit();
        }
      
        else 
        {
            $valido = true;

            //Banco de Dados

            $sql = "UPDATE usuarios SET senha = ? WHERE id = ?";
         

            $stmt = $connection->prepare($sql);
            $passwordHash = md5($_POST["senha"]);
            $stmt->bindParam(1, $passwordHash); // 1 = n�mero da posi��o da ?                 

            $stmt->bindParam(2, $_POST["id"]);

            $stmt->execute();

            if($stmt->errorCode() != "00000"){
                $valido = false;
                $erro = "Erro código " . $stmt->errorCode() . ": ";
                $erro .= implode(",", $stmt->errorInfo());

            }
        }

    }
    else
    {
        $rs = $connection->prepare("SELECT nome, email FROM usuarios WHERE id = ?");
        $rs->bindParam(1, $_REQUEST["id"]);
        
        if ($rs->execute()){
            if ($registro = $rs->fetch(PDO::FETCH_OBJ)){
                $_POST["nome"] = $registro->nome;
                $_POST["email"] = $registro->email;                                
            }
            else{
                $erro = "Registro não encontrado" ;
            }
        }
        else{
            $erro = "Falha na captura do registro";
        }
    }
?>
<html>
<head>
	<title>Banco de dados - Senha</title>
</head>
    <body>
    <?php 
        if ($valido == true){
					
            echo "Senha alterada com sucesso" . "<br>";
            echo "<a href='BancodeDados_lista.php'>Visualizar registros</a>";
        }
        else 
        {
						
            if (isset($erro))			
                echo $erro . "<br><br>";

    ?>
	<form method=POST action="?validar=true">
            
            Nova Senha para o usuário 
            <?php
                echo $_POST["nome"];
                echo " (" . $_POST["email"]. ")";
                echo "<br>";                        
            ?>
            
            Digite a Senha: <br>
            <input type=PASSWORD name=senha><br>
            Digite a Senha novamente: <br>
            <input type=PASSWORD name=senhaRepete><br>
            <input type=HIDDEN  name="id" value = "<?php echo $_REQUEST["id"]; ?>">
                   
            <input type=SUBMIT value="Alterar">

        </form>
    <?php
        }
    ?>
    </body>
</html>
