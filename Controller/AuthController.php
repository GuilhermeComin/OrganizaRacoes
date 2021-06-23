<?php
    session_start();
    require 'Model/User.php';
    require 'Dao/UserDAO.php';

    //Função de Login 
    function login() {
        $usuario = $_POST['txtusuario'];
        $senha = $_POST['txtsenha'];

        $userDao = new UserDAO();

        //verifica se o usuário existe, caso sim manda para tela principal, caso não manda de volta ao login
        $user = $userDao->find($usuario, $senha);

        if ($user) {
            $_SESSION['usuario'] = serialize($user);
            header("location:../../View/app.php");
        }
        else {
            unset($_SESSION['usuario']);
            header("location:../../index.php");
        }
    }
    //Função de Logout
    function logout() {
        unset($_SESSION['usuario']);
        header("location:../../index.php");
    }

    //Switch para pegar a operação (login ou logout)
    $operacao = $_GET['operation'];
    if (isset($operacao)) {
        switch($operacao) {
            case 'login';
            login();
            break;
            case 'logout';
            logout();
            break;
        }
    }
?>