<?php
    session_start();
    
    require ('Model/TipoRacao.php');
    require ('Dao/RacaoDAO.php');

    //Função de create das rações
    function criar() {
        $racao = new TipoRacao();

        $racao->idRacao = $_POST['txtidracao'];
        $racao->nomeRacao = $_POST['txtnomeracao'];
        $racao->tipoDestino = $_POST['txtdestino'];

        $racaoDAO = new RacaoDAO();
        $racaoDAO->create($racao);

        header("location:../View/Racao/createRacao.php?inserir=1");
    }

    //Função de read das rações
    function listar() {
        $racaoDAO = new RacaoDAO();
        $racoes = $racaoDAO->search();

        $_SESSION['racoes'] = serialize($racoes);
        header("location:../View/Racao/listRacao.php");
    }

    //Função de update das rações
    function atualizar() {
        $id = $_GET['id'];
        $racao = new TipoRacao();

        $racao->idRacao = $_POST['txtidracao'];
        $racao->nomeRacao = $_POST['txtnomeracao'];
        $racao->tipoDestino = $_POST['txtdestino'];


        $racaoDAO = new RacaoDAO();
        $racaoDAO->update($racao, $id);

        header("location:../View/Racao/listRacao.php");
    }

    //Função de delete das rações
    function deletar() {
        $id = $_GET['id'];
        if (isset($id)) {
            $racaoDAO = new RacaoDAO();
            $racaoDAO->delete($id);
            header("location:../../Controller/RacaoController.php?operation=listar");
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