<?php 

    class Produtor {

        private $id;
        private $nome;
        private $localizacao;
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