<?php

    require 'Persistence/ConnectionDB.php';

    class PedidoDAO {

        private $connection = null;

        public function __construct() {
            $this->connection = ConnectionDB::getInstance();
        }

        //Função que faz o insert dos pedidos no banco
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
                echo "Ocorreram erros ao inserir um novo pedido";
                echo $e->getMessage();
            }
        }

        //Função que realiza um select nos pedidos, realizando alguns inner joins para apresentação de outros resultados necessários nas telas visuais
        public function search() {
            try {
                $statement = $this->connection->prepare(
                    "SELECT *
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
                echo "Ocorreram erros ao listar os pedidos";
                echo $e->getMessage();
            }
        }

        //Função que realiza o update da ração no banco
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
                echo "Ocorreram erros ao atualizar os pedidos";
                echo $e->getMessage();
            }
        }

        //Função que faz um select dos pedidos e outras tabelas somente na data de hoje 
        public function find() {
            try {
                $statement = $this->connection->prepare(
                    "SELECT *
                    FROM pedido p 
                    INNER JOIN turnoPedido t ON p.turno = t.idTurno
                    INNER JOIN tipoRacao r ON p.tipoRacao = r.idRacao
                    INNER JOIN produtor pr ON p.produtor = pr.idProdutor
                    INNER JOIN cidade c ON pr.cidade = c.idCidade
                    WHERE data = CURRENT_DATE;"
                );
                $statement->execute();
                $dados = $statement->fetchAll();
                $this->connection = null;

                return $dados;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao listar os pedidos";
                echo $e->getMessage();
            }
        }

        //Função que realiza o delete dos pedidos no banco 
        public function delete($id) {
            try {
                $statement = $this->connection->prepare(
                    "DELETE FROM pedido WHERE idPedido = ?"
                );
                $statement->bindValue(1, $id);
                $statement->execute();

                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao deletar o pedido";
                echo $e->getMessage();
            }
        }
    }
?>