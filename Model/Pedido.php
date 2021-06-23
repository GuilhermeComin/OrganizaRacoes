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