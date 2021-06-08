<?php

    require 'Persistence/ConnectionDB.php';

    class UserDAO {

        private $connection = null;

        public function __construct() {
            $this->connection = ConnectionDB::getInstance();
        }

        public function create ($user) {
        }

        public function find($usuario, $senha) {
            try {
                $statement = $this->connection->prepare(
                    "SELECT * FROM usuario WHERE usuario = ? and senha = ?"
                );
                $statement->bindValue(1, $usuario);
                $statement->bindValue(2, $senha);
                $statement->execute();
                $user = $statement->fetchAll();

                $this->connection = null;

                return $user;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>