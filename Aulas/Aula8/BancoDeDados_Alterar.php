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

            //Banco de Dados

            $sql = "UPDATE usuarios SET nome = ?, email= ?, idade= ?, sexo= ?, estado_civil= ?, humanas = ?, exatas = ?, biologicas = ? WHERE id = ?";
             

            $stmt = $connection->prepare($sql);

            $stmt->bindParam(1, $_POST["nome"]); // 1 = n�mero da posi��o da ?
            $stmt->bindParam(2, $_POST["email"]);
            $stmt->bindParam(3, $_POST["idade"]);
            $stmt->bindParam(4, $_POST["sexo"]);
            $stmt->bindParam(5, $_POST["estadocivil"]);

            $checkHumanas = isset($_POST["humanas"]) ? 1 : 0;
            $stmt->bindParam(6, $checkHumanas);

            $checkExatas = isset($_POST["exatas"]) ? 1 : 0;
            $stmt->bindParam(7, $checkExatas);

            $checkBiologicas = isset($_POST["biologicas"]) ? 1 : 0;
            $stmt->bindParam(8, $checkBiologicas);

            $stmt->bindParam(9, $_POST["id"]);

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
        $rs = $connection->prepare("SELECT * FROM usuarios WHERE id = ?");
        $rs->bindParam(1, $_REQUEST["id"]);
        
        if ($rs->execute()){
            if ($registro = $rs->fetch(PDO::FETCH_OBJ)){
                $_POST["nome"] = $registro->nome;
                $_POST["email"] = $registro->email;
                $_POST["idade"] = $registro->idade;
                $_POST["sexo"] = $registro->sexo;
                $_POST["estadocivil"] = $registro->estado_civil;
                
                
                $_POST["humanas"] = $registro->humanas == 1 ? true : null;
                $_POST["exatas"] = $registro->exatas == 1 ? true : null;
                $_POST["biologicas"] = $registro->biologicas == 1 ? true : null;                
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
	<title>Banco de dados - Alterar</title>
</head>
    <body>
    <?php 
        if ($valido == true){
					
            echo "Dados alterados com sucesso" . "<br>";
            echo "<a href='BancodeDados_lista.php'>Visualizar registros</a>";
        }
        else 
        {
						
            if (isset($erro))			
                echo $erro . "<br><br>";

    ?>
	<form method=POST action="?validar=true">
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
                    if (isset($_POST["estadocivil"]) && $_POST["estadocivil"] == "Vi�vo(a)")
                        echo "selected"; 
                ?>
                >Viúvo(a)</option>
            </select>
            <br>
            <br>    
            <!--Senha:
            <input type=PASSWORD name=senha><br>-->
            <input type=HIDDEN  name="id" value = "<?php echo $_REQUEST["id"]; ?>">
                   
            <input type=SUBMIT value="Alterar">

        </form>
    <?php
        }
    ?>
    </body>
</html>
