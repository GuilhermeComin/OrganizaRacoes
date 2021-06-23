<?php

    require 'Persistence/ConnectionDB.php';

    class CidadeDAO {

        private $connection = null;

        public function __construct() {
            $this->connection = ConnectionDB::getInstance();
        }

        //Função de insert no banco de dados na tabela das cidades
        public function create ($cidade) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO cidade (nomecidade, estado) VALUES (?, ?)"
                );

                $statement->bindValue(1, $cidade->nomecidade);
                $statement->bindValue(2, $cidade->estado);

                $statement->execute();

                $this->connection = null;

            } catch (PDOException $e) {
                echo "Ocorreram erros ao inserir uma nova cidade";
                echo $e->getMessage();
            }
        }

        //Função que realiza o update no banco na tabela das cidades
        public function update ($cidade, $id) {
            try {
                $statement = $this->connection->prepare(
                    "UPDATE cidade
                    SET nomecidade = ?, estado = ?
                    WHERE idcidade = ?"
                );

                $statement->bindValue(1, $cidade->nomecidade);
                $statement->bindValue(2, $cidade->estado);
                $statement->bindValue(3, $id);

                $statement->execute();

                $this->connection = null;

            } catch (PDOException $e) {
                echo "Ocorreram erros ao atualizar uma cidade";
                echo $e->getMessage();
            }
        }

        //Função que faz um select em todas as cidades
        public function search() {
            try {
                $statement = $this->connection->prepare(
                    "SELECT *
                    FROM cidade"
                );
                $statement->execute();
                $dados = $statement->fetchAll();
                $this->connection = null;

                return $dados;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao listar as cidades";
                echo $e->getMessage();
            }
        }

        //Função que deleta a cidade no banco
        public function delete($id) {
            try {
                $statement = $this->connection->prepare(
                    "DELETE FROM cidade WHERE idcidade = ?"
                );
                $statement->bindValue(1, $id);
                $statement->execute();

                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao deletar a cidade";
                echo $e->getMessage();
            }
        }
    }
?>