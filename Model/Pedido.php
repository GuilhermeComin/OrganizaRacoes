<?php 

    class Pedido {

        private $idPedido;
        private $nomeProdutor;
        private $data;
        private $racao;
        private $periodo;

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