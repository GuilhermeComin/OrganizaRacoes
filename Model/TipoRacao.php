<?php 

    class TipoRacao {

        private $id;
        private $nomeRacao;
        private $tipoDestino;

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