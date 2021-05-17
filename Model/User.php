<?php 

    class User {
        private $id;
        private $nome;
        private $sobrenome;
        private $idade;
        private $password;
        private $email;


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