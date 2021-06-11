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
                    "SELECT p.*, t.*, r.*, pr.*, c.*
                    FROM pedido p 
                    INNER JOIN turnoPedido t ON p.turno = t.idTurno
                    INNER JOIN tipoRacao r ON p.tipoRacao = r.idRacao
                    INNER JOIN produtor pr ON p.produtor = pr.idProdutor
                    INNER JOIN cidade c ON pr.cidade = c.idCidade
                    ORDER BY p.data"
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

        public function update($pedido, $id) {
            try {
                $statement = $this->connection->prepare(
                    "UPDATE pedido 
                    SET produtor = ?, tiporacao = ?, peso = ?, data = ?, turno = ?
                    WHERE idpedido = ?"
                );

                $statement->bindValue(1, $pedido->produtor);
                $statement->bindValue(2, $pedido->tipoRacao);
                $statement->bindValue(3, $pedido->peso);
                $statement->bindValue(4, $pedido->data);
                $statement->bindValue(5, $pedido->turno);
                $statement->bindValue(6, $id);

                $statement->execute();

                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao listar os produtores";
                echo $e->getMessage();
            }
        }

        public function find() {
            try {
                $statement = $this->connection->prepare(
                    "SELECT p.*, t.*, r.*, pr.*
                    FROM pedido p 
                    INNER JOIN turnoPedido t ON p.turno = t.idTurno
                    INNER JOIN tipoRacao r ON p.tipoRacao = r.idRacao
                    INNER JOIN produtor pr ON p.produtor = pr.idProdutor
                    WHERE data = CURRENT_DATE;"
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

        public function delete($id) {
            try {
                $statement = $this->connection->prepare(
                    "DELETE FROM pedido WHERE idPedido = ?"
                );
                $statement->bindValue(1, $id);
                $statement->execute();

                $this->connection = null;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>