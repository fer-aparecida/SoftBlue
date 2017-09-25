<html>
<head>
	<title>Sessão e Cookies: Autenticação</title>
</head>
<body>
    
<?php
    session_start();
    if(isset($_COOKIE["visitas"]))
    {
        $visitas = $_COOKIE["visitas"] + 1;
            
    }
    else{
        $visitas = 1;
    }
    
    //$tempo = time() + 30*24*60*60;
    setcookie("visitas", $visitas, time() + 30*24*60*60);
    
    echo "Essa é a sua visita número " . $visitas . " em nosso site.<br>";
    
    if (isset($_REQUEST["autenticar"]) && $_REQUEST["autenticar"] == true){
        $hashDaSenha = md5($_POST["senha"]);
        
        try{
            $connection = new PDO("mysql:host=localhost;dbname=cursophp", "root", "");
            $connection->exec("set names utf8"); 
            
        }catch(PDOException $e){
            echo "Falha: " . $e->getMessage();
            exit();       
        }
        
        $sql = "SELECT nome FROM usuarios WHERE email = ? and senha = ?";
        
        $rs = $connection->prepare($sql);
        
        //$rs = $connection->prepare("SELECT nome FROM usuarios WHERE email = ? and senha = ?");            
        $rs->bindParam(1, $_POST["email"]);
        $rs->bindParam(2, $hashDaSenha);
        echo $sql;
        if ($rs->execute()){
            echo "teste";
            if ($registro = $rs->fetch(PDO::FETCH_OBJ)){
                session_start();
                $_SESSION["usuario"] = $registro->nome;
                
                header("location: SessaoCookies_Sigiloso.php");
                
            }
            else{
                echo "Dados inválidos";
            }
               
        }        
        else{
            echo "Falha no acesso ao usuário<br>";  
            $erro = "Erro código " . $rs->errorCode() . ": ";
            $erro .= implode(",", $rs->errorInfo());
            echo $erro;
        }
    }    
?>
    <form method ="POST" action="?autenticar=true">
        E-mail: <input type="TEXT" name="email"><br>
        Senha: <input type="PASSWORD" name="senha"><br>
        <input type="submit" value="Autenticar">
        
    </form>
</body>
</html>

