<?php 

    class User {

        private $nome;
        private $password;

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