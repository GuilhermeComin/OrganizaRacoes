<?php 

    class Cidade {

        private $idCidade;
        private $nomeCidade;
        private $estado;

        public function __construct()
        {
            
        }

        public function __set($propriedade, $valor)
        {
            $this->$propriedade = $valor;
        }

        public function __get($propriedade)
        {
            return $this->$propriedade;
        }
    }

?>