<?php
    session_start();

    require ('Model/Produtor.php');
    require ('Dao/ProdutorDAO.php');

    //Função de create do produtor
    function criar() {
        $produtor = new Produtor();

        $produtor->nomeProdutor = $_POST['txtprodutor'];
        $produtor->cidade = $_POST['txtcidade'];
        $produtor->tipoSuino = $_POST['txtsuino'];

        $produtorDao = new ProdutorDAO();
        $produtorDao->create($produtor);

        header("location:../View/Produtor/createProdutor.php?inserir=1");
    }

    //Função do read dos produtores
    function listar() {
        $produtorDAO = new ProdutorDAO();
        $produtores = $produtorDAO->search();

        $_SESSION['produtores'] = serialize($produtores);
        header("location:../View/Produtor/listProdutor.php");
    }

    //Função do update dos produtores
    function atualizar() {
        $id = $_GET['id'];
        $produtor = new Produtor();

        $produtor->nomeProdutor = $_POST['txtprodutor'];
        $produtor->cidade = $_POST['txtcidade'];
        $produtor->tipoSuino = $_POST['txtsuino'];

        $produtorDao = new ProdutorDAO();
        $produtorDao->update($produtor, $id);

        header("location:../View/Produtor/listProdutor.php");
    }

    //Função do delete dos produtores
    function deletar() {
        $id = $_GET['id'];
        if (isset($id)) {
            $produtorDAO = new ProdutorDAO();
            $produtorDAO->delete($id);
            header("location:../../Controller/ProdutorController.php?operation=listar");
        }
    }
    
    //Switch para pegar a operação 
    $operacao = $_GET['operation'];
    if (isset($operacao)) {
        switch($operacao) {
            case 'cadastrar';
            criar();
            break;
            case 'listar';
            listar();
            break;
            case 'editar';
            atualizar();
            break;
            case 'deletar';
            deletar();
            break;
        }
    }


        
?>