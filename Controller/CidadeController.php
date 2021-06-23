<?php
    session_start();

    require ('Model/Cidade.php');
    require ('Dao/CidadeDAO.php');

    //Função de create de nova cidade
    function criar() {
            $cidade = new Cidade();

            $cidade->nomecidade = $_POST['txtcidade'];
            $cidade->estado = $_POST['txtestado'];


            $cidadeDAO = new CidadeDAO();
            $cidadeDAO->create($cidade);

            header("location:../View/Cidade/createCidade.php?inserir=1");
    }

    //Função de read das cidades
    function listar() {
        $cidadeDAO = new CidadeDAO();
        $cidades = $cidadeDAO->search();

        $_SESSION['cidades'] = serialize($cidades);
        header("location:../View/Cidade/listCidade.php");
    }

    //Função de update das cidades
    function atualizar() {
        $cidade = new Cidade();
        $id = $_GET['id'];
            $cidade->nomecidade = $_POST['txtcidade'];
            $cidade->estado = $_POST['txtestado'];


            $cidadeDAO = new CidadeDAO();
            $cidadeDAO->update($cidade, $id);

            header("location:../View/Cidade/listCidade.php");
    }

    //Função de delete das cidades
    function deletar() {
        $id = $_GET['id'];
        if (isset($id)) {
            $cidadeDAO = new CidadeDAO();
            $cidadeDAO->delete($id);
            header("location:../../Controller/CidadeController.php?operation=listar");
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