<?php

    require 'Persistence/ConnectionDB.php';

    class CidadeDAO {

        private $connection = null;

        public function __construct() {
            $this->connection = ConnectionDB::getInstance();
        }

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
                echo "Ocorreram erros ao inserir um novo produtor";
                echo $e->getMessage();
            }
        }

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
                echo "Ocorreram erros ao listar os produtores";
                echo $e->getMessage();
            }
        }

        public function delete($id) {
            try {
                $statement = $this->connection->prepare(
                    "DELETE FROM cidade WHERE idcidade = ?"
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