<?php 

    class Produtor {

        private $idProdutor;
        private $nomeProdutor;
        private $peso;
        private $cidade;
        private $tipoSuino;

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