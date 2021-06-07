<?php
    session_start();
    
    require ('Model/TipoRacao.php');
    require ('Dao/RacaoDAO.php');

        $racao = new TipoRacao();

        $racao->idRacao = $_POST['txtidracao'];
        $racao->nomeRacao = $_POST['txtnomeracao'];
        $racao->tipoDestino = $_POST['txtdestino'];

        $racaoDAO = new RacaoDAO();
        $racaoDAO->create($racao);

        header("location:../View/Racao/createRacao.php");
?>