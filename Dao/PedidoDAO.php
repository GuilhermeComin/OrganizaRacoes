<?php

    require 'Persistence/ConnectionDB.php';

    class PedidoDAO {

        private $connection = null;

        public function __construct() {
            $this->connection = ConnectionDB::getInstance();
        }

        public function create ($pedido) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO pedido (produtor, tiporacao, peso, data, turno) VALUES (?, ?, ?, ?, ?)"
                );

                $statement->bindValue(1, $pedido->produtor);
                $statement->bindValue(2, $pedido->tipoRacao);
                $statement->bindValue(3, $pedido->peso);
                $statement->bindValue(4, $pedido->data);
                $statement->bindValue(5, $pedido->turno);

                $statement->execute();

                $this->connection = null;

            } catch (PDOException $e) {
                echo "Ocorreram erros ao inserir um novo produtor";
                echo $e->getMessage();
            }
        }

        public function search() {
            try {
                $statement = $this->connection->prepare(
                    "SELECT * FROM pedido"
                );
                $statement->execute();
                $dados = $statement->fetchAll();
                $this->connection = null;

                return $dados;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao listar os produtores";
                echo $e->getMessage();
            }
        }
    }
?>