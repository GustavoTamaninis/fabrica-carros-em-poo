<?php
    require_once "Carro.php";

    class Fabrica{
        private array $carros = [];

        public function setCarros(object $carro): void{ //Carros $carro (?)
            array_push($this->carros, $carro);
            
        }
        
        public function venderCarro(){
            //irá retirar um carro do array;
        }

        public function fabricarCarro($i, $cor, $modelo): object{
            //deverá acrescenter um (ou mais) carros ao array;
            $carro = new Carro();
            $carro->setCor($cor[$i]);
            $carro->setModelo($modelo[$i]);
            $this->setCarros($carro);
            return $carro;
        }

        public function getInfoCarros($carros){
            //devo usar get para cada um dos atributos do carro;
        }
    }
?>