<?php
    session_start();

    require ('Model/Produtor.php');
    require ('Dao/ProdutorDAO.php');


    function criar() {
        $produtor = new Produtor();

        $produtor->nomeProdutor = $_POST['txtprodutor'];
        $produtor->cidade = $_POST['txtcidade'];
        $produtor->tipoSuino = $_POST['txtsuino'];

        $produtorDao = new ProdutorDAO();
        $produtorDao->create($produtor);

        header("location:../View/Produtor/createProdutor.php?operation=cadastrar");
    }

    function listar() {
        $produtorDAO = new ProdutorDAO();
        $produtores = $produtorDAO->search();

        $_SESSION['produtores'] = serialize($produtores);
        header("location:../View/Produtor/listProdutor.php");
    }

    function atualizar() {

    }

    function deletar() {
        $id = $_GET['id'];
        if (isset($id)) {
            $produtorDAO = new ProdutorDAO();
            $produtorDAO->delete($id);
            header("location:../../Controller/ProdutorController.php?operation=listar");
        }
    }
    
    $operacao = $_GET['operation'];
    if (isset($operacao)) {
        switch($operacao) {
            case 'cadastrar';
            criar();
            break;
            case 'listar';
            listar();
            break;
            case 'atualizar';
            atualizar();
            break;
            case 'deletar';
            deletar();
            break;
        }
    }


        
?>