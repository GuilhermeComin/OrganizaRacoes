<?php
    session_start();

    require ('Model/Produtor.php');
    require ('Dao/ProdutorDAO.php');

        $produtor = new Produtor();

        $produtor->nomeProdutor = $_POST['txtprodutor'];
        $produtor->cidade = $_POST['txtcidade'];
        $produtor->tipoSuino = $_POST['txtsuino'];

        $produtorDao = new ProdutorDAO();
        $produtorDao->create($produtor);

        header("location:../View/Produtor/createProdutor.php");
?>