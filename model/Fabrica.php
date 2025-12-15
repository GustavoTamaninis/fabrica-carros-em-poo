<?php
    require_once "Carro.php";

    class Fabrica{
        private array $carros = [];

        public function setCarros(object $carro): void{
            array_push($this->carros, $carro);
        }
        
        public function venderCarro(){
            //irá retirar um carro do array;
        }

        public function fabricarCarro(int $qtdeCarros, $cor, $modelo){
            //deverá acrescenter um (ou mais) carros ao array;
            $carro = new Carro();
            $carro->setCor($cor);
            $carro->setModelo($modelo);
        }

        public function getInfoCarros($carros){
            //devo usar get para cada um dos atributos do carro;
        }
    }
?>