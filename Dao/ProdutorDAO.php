<?php

    require 'Persistence/ConnectionDB.php';

    class ProdutorDAO {

        private $connection = null;

        public function __construct() {
            $this->connection = ConnectionDB::getInstance();
        }

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
    }
?>