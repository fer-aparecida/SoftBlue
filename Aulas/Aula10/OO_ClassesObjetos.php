<html>
    <head>
        <title>OO_Classes e Objetos</title>
    </head> 
    <body>  
    
<?php
  
    class Carro{
        private $velocidade;
        private $cor;
        
        public function __construct($cor) {
            $this->cor = $cor;
            $this->velocidade = 0;
        }
        
        public function getVelocidade(){
            return $this->velocidade;            
        }
        
        public function getCor(){
            return $this->cor;
        }
        
        public function setVelocidade($velocidade){
            
            if ($velocidade > 110){
                echo "Velocidade não permitida.<br>";
            }else{
                
                $this->velocidade = $velocidade;
            }
        }
    }
    
    //$meuCarro = new Carro();
    
    //$meuCarro->velocidade = 50;
    //$meuCarro->cor = "Preto";
    
    $meuCarro = new Carro("Vermelha");
    echo "O carro de cor " . $meuCarro->getCor() . " está andando: " . $meuCarro->getVelocidade() . " km.<br>";
    
    $meuCarro->setVelocidade(70);
     
    echo "O carro de cor " . $meuCarro->getCor() . " está andando: " . $meuCarro->getVelocidade() . " km.<br>";
    
    $meuCarro->setVelocidade(70);
     
    echo "O carro de cor " . $meuCarro->getCor() . " está andando: " . $meuCarro->getVelocidade() . " km.<br>";
    
?>
   
    </body>
</html>

