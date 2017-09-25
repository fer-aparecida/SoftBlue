<html>
<head>
	<title>Sessão e Cookies: Conteúdo Sigiloso</title>
</head>
<body>  
    
<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        echo "Erro";
        exit();
    }
        
    echo "Olá " . $_SESSION["usuario"];
    
?>
    [Conteúdo privado / sigiloso]
</body>
</html>

