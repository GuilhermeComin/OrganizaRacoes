<?php
    session_start();
    
    require ('Model/TipoRacao.php');
    require ('Dao/RacaoDAO.php');


    function criar() {
        $racao = new TipoRacao();

        $racao->idRacao = $_POST['txtidracao'];
        $racao->nomeRacao = $_POST['txtnomeracao'];
        $racao->tipoDestino = $_POST['txtdestino'];

        $racaoDAO = new RacaoDAO();
        $racaoDAO->create($racao);

        header("location:../View/Racao/createRacao.php?operation=cadastrar");
    }

    function listar() {
        $racaoDAO = new RacaoDAO();
        $racoes = $racaoDAO->search();

        $_SESSION['racoes'] = serialize($racoes);
        header("location:../View/Racao/listRacao.php");
    }

    function atualizar() {

    }

    function deletar() {
        $id = $_GET['id'];
        if (isset($id)) {
            $racaoDAO = new RacaoDAO();
            $racaoDAO->delete($id);
            header("location:../../Controller/RacaoController.php?operation=listar");
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