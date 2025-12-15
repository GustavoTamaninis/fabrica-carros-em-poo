<?php
    require_once "Carro.php";

    class Fabrica{
        private $carros = [];
        
        public function venderCarro(){
            //irá retirar um carro do array;
        }

        public function fabricarCarro(int $qtdeCarros){
            //deverá acrescenter um (ou mais) carros ao array;
        }

        public function getInfoCarros($carros){
            //devo usar get para cada um dos atributos do carro;
        }
    }
?>