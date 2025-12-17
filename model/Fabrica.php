<?php
    require_once "Carro.php";

    class Fabrica{
        private array $carros = [];

        public function setCarros(object $carro): void{ //Carros $carro (?)
            array_push($this->carros, $carro);
        }
        
        public function venderCarro(string $modelo, string $cor): void{
            $achou = false;
            foreach($this->carros as $i => $carro){
                if($carro->getModelo() == $modelo && $carro->getCor() == $cor){
                    $achou = true;
                    array_splice($this->carros, $i, 1);
                }
            }
            if($achou == false){
                echo "<p>Nenhum carro com esta cor e modelo cadastrado.</p>";
                echo '<form action="processa.php" method="post">';
                echo '<input type="hidden" name="acao" value="vender">';
                echo '<button type="submit">⬅️Retornar</button>';
                echo '</form>'; 
            }else{   
                echo "O carro foi vendido!";
                echo "<br><a href='../view/index.html'>⬅️Voltar ao menu</a>";
            }
        }

        public function fabricarCarro(int $i, array $cor, array $modelo): object{
            $carro = new Carro();
            $carro->setCor($cor[$i]);
            $carro->setModelo($modelo[$i]);
            $this->setCarros($carro);
            return $carro;
        }

        public function geraInfoCarros(): string{
            $info = "";
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