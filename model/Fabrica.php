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
            $carro = new Carro();
            $carro->setCor($cor[$i]);
            $carro->setModelo($modelo[$i]);
            $this->setCarros($carro);
            return $carro;
        }

        public function geraInfoCarros(){
            $info = "<h2>🏭 Informações dos Carros:</h2>";
            if(!empty($this->carros)){
                foreach($this->carros as $i => $carro){
                $info .= "<p>🚗 " . ($i+1) . "º Carro </p>";
                $info .= "<p><strong>Modelo:</strong> {$carro->getModelo()}</p>";
                $info .= "<p><strong>Cor:</strong> {$carro->getCor()}</p><br>";
            }
            }else{
                $info .= "<p>Nenhum carro cadastrado.</p>";
                echo "<br><a href='../view/index.html'>⬅️Voltar ao menu</a>";
            }

            return $info;
        }
    }
?>