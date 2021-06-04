<?php 

    class Pedido {

        private $idPedido;
        private $produtor;
        private $tipoRacao;
        private $peso;
        private $data;
        private $turno;

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