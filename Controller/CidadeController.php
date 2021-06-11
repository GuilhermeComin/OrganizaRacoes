<?php
    session_start();

    require ('Model/Cidade.php');
    require ('Dao/CidadeDAO.php');

    function criar() {
            $cidade = new Cidade();

            $cidade->nomecidade = $_POST['txtcidade'];
            $cidade->estado = $_POST['txtestado'];


            $cidadeDAO = new CidadeDAO();
            $cidadeDAO->create($cidade);

            header("location:../View/Cidade/createCidade.php");
    }

    function listar() {
        $cidadeDAO = new CidadeDAO();
        $cidades = $cidadeDAO->search();

        $_SESSION['cidades'] = serialize($cidades);
        header("location:../View/Cidade/listCidade.php");
    }

    function atualizar() {
        $cidade = new Cidade();
        $id = $_GET['id'];
            $cidade->nomecidade = $_POST['txtcidade'];
            $cidade->estado = $_POST['txtestado'];


            $cidadeDAO = new CidadeDAO();
            $cidadeDAO->update($cidade, $id);

            header("location:../View/Cidade/listCidade.php");
    }

    function deletar() {
        $id = $_GET['id'];
        if (isset($id)) {
            $cidadeDAO = new CidadeDAO();
            $cidadeDAO->delete($id);
            header("location:../../Controller/CidadeController.php?operation=listar");
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
            case 'editar';
            atualizar();
            break;
            case 'deletar';
            deletar();
            break;
        }
    }


    

   

?>