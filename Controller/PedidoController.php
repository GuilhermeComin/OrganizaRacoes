<?php
    session_start();

    require ('Model/Pedido.php');
    require ('Dao/PedidoDAO.php');

    function criar() {

            $pedido = new Pedido();

            $pedido->produtor = $_POST['txtprodutor'];
            $pedido->tipoRacao = $_POST['txttipoRacao'];
            $pedido->peso = $_POST['txtpeso'];
            $pedido->data = $_POST['txtdata'];
            $pedido->turno = $_POST['txtturno'];

            $pedidoDAO = new PedidoDAO();
            $pedidoDAO->create($pedido);

            header("location:../View/Pedido/createPedido.php");
            
    }

    function listar() {
        $pedidoDAO = new PedidoDAO();
        $pedidos = $pedidoDAO->search();

        $_SESSION['pedidos'] = serialize($pedidos);
        header("location:../View/Pedido/listPedido.php");
    }

    function listaHoje() {
        $pedidoDAO = new PedidoDAO();
        $pedidos = $pedidoDAO->find();

        $_SESSION['pedidoshoje'] = serialize($pedidos);
        header("location:../View/app.php?ok");
    }

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

    function deletar() {
        $id = $_GET['id'];
        if (isset($id)) {
            $pedidoDAO = new PedidoDAO();
            $pedidoDAO->delete($id);
            header("location:../../Controller/PedidoController.php?operation=listar");
        }
    }

    function deletarHoje() {
        $id = $_GET['id'];
        if (isset($id)) {
            $pedidoDAO = new PedidoDAO();
            $pedidoDAO->delete($id);
            unset($_SESSION['pedidoshoje']);
            header("location:../../View/app.php");
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
            case 'hoje';
            listaHoje();
            break;
            case 'deletarhj';
            deletarHoje();
            break;
        }
    }


    

   

?>