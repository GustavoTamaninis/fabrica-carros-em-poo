<?php 
    abstract class Produtos{
        protected string $modelo;
        protected string $cor;

        public function getModelo(): string{
            return $this->modelo;
        }

        public function setModelo(string $modelo): void{
            $this->modelo = $modelo;
        }

        public function getCor(): string{
            return $this->cor;
        }

        public function setCor(string $cor): void{
            $this->cor = $cor;
        }
    }
?>