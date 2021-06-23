<?php 

    class Suino {

        private $idSuino;
        private $descricao;

        public function __construct()
        {
            
        }

        //Setter automático
        public function __set($propriedade, $valor)
        {
            $this->$propriedade = $valor;
        }

        //Getter automático
        public function __get($propriedade)
        {
            return $this->$propriedade;
        }
    }

?>