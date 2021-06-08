<?php
    session_start();
    require 'Model/User.php';
    require 'Dao/UserDAO.php';

    function login() {
        $usuario = $_POST['txtusuario'];
        $senha = $_POST['txtsenha'];

        $userDao = new UserDAO();
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

    function logout() {
        unset($_SESSION['usuario']);
        header("location:../../index.php");
    }

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