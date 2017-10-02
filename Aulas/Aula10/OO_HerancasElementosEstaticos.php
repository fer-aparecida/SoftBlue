<html>
    <head>
        <title>OO: Heranças e Elementos Estáticos</title>
    </head> 
    <body>  
    
<?php
    //Herança
    class InstrumentoMusical{
        public $isPercussao;
        public $volume;
        
        public function __construct($isPercussao, $volume) {
            $this->isPercussao = $isPercussao;
            $this->volume = $volume;            
        }
        // poderia ser final, impedindo sobrescrita
        public function tocar(){
            echo "Tocando no volume: " . $this->volume . " decibéis. <br>";
        }
        
      
        
    }
    
    class Guitarra extends InstrumentoMusical{
        public function tocar(){
            echo "Amplificador ligado em: " . $this->volume . " decibéis. <br>";
        }
        
        public function tocarGuitarra(){
            $this->tocar();
            parent::tocar();
        }
    
    }
    
    $instrumentoMusical = new InstrumentoMusical(TRUE, 80);
    
    if($instrumentoMusical->isPercussao){
        echo "Instrumento de percussão, volume: " . $instrumentoMusical->volume . "<br>";
    }
    else{
        echo "Instrumento não tem percussão, volume: " . $instrumentoMusical->volume . "<br>";
    }
    
    $instrumentoMusical->tocar();
    $guitarra = new Guitarra(FALSE, 40);
    
    if($guitarra->isPercussao){
        echo "Instrumento de percussão, volume: " . $guitarra->volume . "<br>";
    }
    else{
        echo "Instrumento não tem percussão, volume: " . $guitarra->volume . "<br>";
    }
    
    $guitarra->tocar();
    echo "<br><br>";
    
    $guitarra->tocarGuitarra();
    
    
    echo "<br><br>";
    
    //Elementos estaticos
    
    class EscalaMusical{
        public static $escalaDoMaior = "C D E F G A B C";
        
        public static function calculaDecibies($watts){
            return $watts/10;
        }
    }
    
    echo EscalaMusical::$escalaDoMaior . "<br>";
    
    echo EscalaMusical::calculaDecibies(123) . "<br>";
    
    
    
?>

    </body>
</html>

