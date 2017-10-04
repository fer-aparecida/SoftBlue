<html>
<head>
	<title>OO: Abstração Interfaces</title>
</head>
<body>  
    
<?php
    abstract class InstrumentoMusical{
        public $volume;
        public abstract function tocar();
    }
    
    interface Transportavel{
        public function transportar();
    }
    
    class Guitarra extends InstrumentoMusical implements Transportavel{
        public function tocar(){
            echo 'Tocando guitarra <br>';
        }
        
        public function transportar() {
            echo 'Transporte de guitarra: entrar em contato com a loja de música. <br>';
        }
    }
    
    class Computador implements Transportavel{
        public function transportar() {
            echo "Transporte de computador: chame a softblue! <br>";
            
        }
    }
    
    $guitarra = new Guitarra();
    $guitarra->tocar();
    $guitarra->transportar();
    
    $computador = new Computador();
    
    $computador->transportar();
?>
    
</body>
</html>