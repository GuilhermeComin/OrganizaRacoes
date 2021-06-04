<?php

    require ('Model/Produtor.php');

        $produtor = new Produtor();

        $produtor->nomeProdutor = $_POST['txtprodutor'];
        $produtor->cidade = $_POST['txtcidade'];
        $produtor->tipoSuino = $_POST['txtsuino'];

        header("location:../View/Produtor/createProdutor.php");
?>