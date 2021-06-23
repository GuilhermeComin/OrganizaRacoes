<?php
    session_start();

    require ('Model/Pedido.php');
    require ('Dao/PedidoDAO.php');

    //Função create de pedido
    function criar() {
        $pedido = new Pedido();

        $pedido->produtor = $_POST['txtprodutor'];
        $pedido->tipoRacao = $_POST['txttipoRacao'];
        $pedido->peso = $_POST['txtpeso'];
        $pedido->data = $_POST['txtdata'];
        $pedido->turno = $_POST['txtturno'];

        $pedidoDAO = new PedidoDAO();
        $pedidoDAO->create($pedido);

        header("location:../View/Pedido/createPedido.php?inserir=1");
            
    }

    //Função read de pedido
    function listar() {
        $pedidoDAO = new PedidoDAO();
        $pedidos = $pedidoDAO->search();

        $_SESSION['pedidos'] = serialize($pedidos);
        header("location:../View/Pedido/listPedido.php");
    }

    //Função read somente dos pedidos da data de hoje
    function listaHoje() {
        $pedidoDAO = new PedidoDAO();
        $pedidos = $pedidoDAO->find();

        $_SESSION['pedidoshoje'] = serialize($pedidos);
        header("location:../View/app.php?ok");
    }

    //Função de update dos pedidos
    function atualizar() {
        $id = $_GET['id'];
        $pedido = new Pedido();

        $pedido->produtor = $_POST['txtprodutor'];
        $pedido->tipoRacao = $_POST['txttipoRacao'];
        $pedido->peso = $_POST['txtpeso'];
        $pedido->data = $_POST['txtdata'];
        $pedido->turno = $_POST['txtturno'];

        $pedidoDAO = new PedidoDAO();
        $pedidoDAO->update($pedido, $id);

        header("location:../View/Pedido/listPedido.php");
    }

    //Função de delete dos pedidos
    function deletar() {
        $id = $_GET['id'];
        if (isset($id)) {
            $pedidoDAO = new PedidoDAO();
            $pedidoDAO->delete($id);
            header("location:../../Controller/PedidoController.php?operation=listar");
        }
    }

    //Função de delete dos pedidos no relatório dos pedidos de hoje
    function deletarHoje() {
        $id = $_GET['id'];
        if (isset($id)) {
            $pedidoDAO = new PedidoDAO();
            $pedidoDAO->delete($id);
            unset($_SESSION['pedidoshoje']);
            header("location:../../View/app.php");
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
            case 'hoje';
            listaHoje();
            break;
            case 'deletarhj';
            deletarHoje();
            break;
        }
    }
?>