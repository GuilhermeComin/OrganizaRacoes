<?php

    require 'Persistence/ConnectionDB.php';

    class RacaoDAO {

        private $connection = null;

        public function __construct() {
            $this->connection = ConnectionDB::getInstance();
        }

        //Função que realiza o insert das rações no banco
        public function create ($racao) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO tipoRacao (idRacao, nomeRacao, tipoDestino) VALUES (?, ?, ?)"
                );

                $statement->bindValue(1, $racao->idRacao);
                $statement->bindValue(2, $racao->nomeRacao);
                $statement->bindValue(3, $racao->tipoDestino);

                $statement->execute();

                $this->connection = null;

            } catch (PDOException $e) {
                echo "Ocorreram erros ao inserir um novo produtor";
                echo $e->getMessage();
            }
        }

        //Função que realiza o select de todas as rações no banco
        public function search() {
            try {
                $statement = $this->connection->prepare(
                    "SELECT r.*, s.*
                    FROM tipoRacao r INNER JOIN tipoSuino s ON r.tipoDestino = s.idsuino
                    ORDER BY idracao"
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

        //Função que realiza o update das rações no banco
        public function update ($racao, $id) {
            try {
                $statement = $this->connection->prepare(
                    "UPDATE  tipoRacao 
                    SET idRacao = ?, nomeRacao = ?, tipoDestino = ?
                    WHERE idRacao = ?" 
                );

                $statement->bindValue(1, $racao->idRacao);
                $statement->bindValue(2, $racao->nomeRacao);
                $statement->bindValue(3, $racao->tipoDestino);
                $statement->bindValue(4, $id);

                $statement->execute();

                $this->connection = null;

            } catch (PDOException $e) {
                echo "Ocorreram erros ao atualizar a Ração";
                echo $e->getMessage();
            }
        }

        //Função que realiza o delete das rações no banco
        public function delete($id) {
            try {
                $statement = $this->connection->prepare(
                    "DELETE FROM tipoRacao WHERE idRacao = ?"
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