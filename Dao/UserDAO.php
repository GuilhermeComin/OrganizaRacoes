<?php

    require 'Persistence/ConnectionDB.php';

    class UserDAO {

        private $connection = null;

        public function __construct() {
            $this->connection = ConnectionDB::getInstance();
        }

        //Função que realiza a busca do usuário para futura verificação do login
        public function find($usuario, $senha) {
            try {
                $statement = $this->connection->prepare(
                    "SELECT * FROM usuario WHERE usuario = ? and senha = md5(?)"
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