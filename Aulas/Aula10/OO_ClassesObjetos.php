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
            $this->setCor($cor);
            $this->setVelocidade(0);
        }
        
        public function getVelocidade(){
            return $this->velocidade;            
        }
        
        public function getCor(){
            return $this->cor;
        }
        
        private function setVelocidade($velocidade){
            
            if ($velocidade > 110 || $velocidade < 0){
                echo "Velocidade não permitida.<br>";
            }else{
                
                $this->velocidade = $velocidade;
            }
        }
        
        public function setCor($cor){
            $this->cor = $cor;
        }
        
        public function acelerar(){
            $this->setVelocidade($this->getVelocidade() + 1);
        }
        
        public function frear(){
            $this->setVelocidade($this->getVelocidade() - 1);
        }
                
    }
    
    //$meuCarro = new Carro();
    
    //$meuCarro->velocidade = 50;
    //$meuCarro->cor = "Preto";
    
    $meuCarro = new Carro("Vermelha");
    echo "O carro de cor " . $meuCarro->getCor() . " está andando: " . $meuCarro->getVelocidade() . " km.<br>";
    
    //$meuCarro->setVelocidade(70);
     
    echo "O carro de cor " . $meuCarro->getCor() . " está andando: " . $meuCarro->getVelocidade() . " km.<br>";
    
    //$meuCarro->setVelocidade(70);
     $meuCarro->acelerar();
     $meuCarro->acelerar();
     $meuCarro->acelerar();
     $meuCarro->acelerar();
     $meuCarro->acelerar();
     $meuCarro->frear();
     $meuCarro->frear();
    echo "O carro de cor " . $meuCarro->getCor() . " está andando: " . $meuCarro->getVelocidade() . " km.<br>";
    
?>
   
    </body>
</html>

