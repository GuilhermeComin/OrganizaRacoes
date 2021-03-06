<?php

    require 'Persistence/ConnectionDB.php';

    class ProdutorDAO {

        private $connection = null;

        public function __construct() {
            $this->connection = ConnectionDB::getInstance();
        }

        //Função que realiza o insert dos produtores no banco
        public function create ($produtor) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO Produtor (nomeProdutor, cidade, tipoSuino) VALUES (?, ?, ?)"
                );

                $statement->bindValue(1, $produtor->nomeProdutor);
                $statement->bindValue(2, $produtor->cidade);
                $statement->bindValue(3, $produtor->tipoSuino);

                $statement->execute();

                $this->connection = null;
                
            } catch (PDOException $e) {
                echo "Ocorreram erros ao inserir um novo produtor";
                echo $e->getMessage();
            }
        }

        //Função que realiza o update dos produtores no banco
        public function update ($produtor, $id) {
            try {
                $statement = $this->connection->prepare(
                    "UPDATE Produtor 
                    SET nomeProdutor = ?, cidade = ?, tipoSuino = ?
                    WHERE idProdutor = ?"
                );

                $statement->bindValue(1, $produtor->nomeProdutor);
                $statement->bindValue(2, $produtor->cidade);
                $statement->bindValue(3, $produtor->tipoSuino);
                $statement->bindValue(4, $id);

                $statement->execute();

                $this->connection = null;

            } catch (PDOException $e) {
                echo "Ocorreram erros ao atualizar um produtor";
                echo $e->getMessage();
            }
        }

        //Função que realiza o select de todos os produtores no banco
        public function search() {
            try {
                $statement = $this->connection->prepare(
                    "SELECT p.*, s.*, c.*
                    FROM produtor p 
                    INNER JOIN tipoSuino s ON p.tipoSuino = s.idsuino
                    INNER JOIN cidade c ON p.cidade = c.idcidade"
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

        //Função que realiza o select de todas as rações no banco (solução para futuro conflito no app)
        public function searchRacao() {
            try {
                $statement = $this->connection->prepare(
                    "SELECT r.*, s.*
                    FROM tipoRacao r INNER JOIN tipoSuino s ON r.tipoDestino = s.idsuino"
                );
                $statement->execute();
                $dados = $statement->fetchAll();
                $this->connection = null;

                return $dados;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao listar as rações";
                echo $e->getMessage();
            }
        }

        //Função que realiza o delete dos produtores no banco
        public function delete($id) {
            try {
                $statement = $this->connection->prepare(
                    "DELETE FROM produtor WHERE idprodutor = ?"
                );
                $statement->bindValue(1, $id);
                $statement->execute();

                $this->connection = null;

            } catch (PDOException $e) {
                echo "Ocorreram erros ao deletar o produtor";
                echo $e->getMessage();
            }
        }
    }
?>