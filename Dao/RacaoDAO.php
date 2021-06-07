<?php

    require 'Persistence/ConnectionDB.php';

    class RacaoDAO {

        private $connection = null;

        public function __construct() {
            $this->connection = ConnectionDB::getInstance();
        }

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
    }
?>