<?php

    class ConnectionDB extends PDO {
        private static $instance = null;

        public function __construct($dsn, $usuario, $senha) {
            parent::__construct($dsn, $usuario, $senha);
        }
            
        public static function getInstance() {
            if (!isset(self::$instance)) {
                try {
                    self::$instance = new ConnectionDB(
                        "pgsql:dbname=testePedido;host=localhost",
                        "postgres",
                        "masterkey"
                    );
                    echo "Conexão efetuada com sucesso ao banco de dados";
                } catch (PDOException $e){
                    echo "Ocorreram eros ao tentar conectar ao banco de dados";
                    echo $e ->getMessage();
                    die();
                    exit();
                }
            }
            return self::$instance;
        }
    }
?>