<?php

    require ('Model/TipoRacao.php');

        $racao = new TipoRacao();

        $racao->idRacao = $_POST['txtidracao'];
        $racao->nomeRacao = $_POST['txtnomeracao'];
        $racao->tipoDestino = $_POST['txtdestino'];

       echo "tacerto";
?>