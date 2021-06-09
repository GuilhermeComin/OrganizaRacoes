<?php
    session_start();

    require ('Model/Pedido.php');
    require ('Include/PedidoValidate.php');
    require ('Dao/PedidoDAO.php');

    function criar() {
        $erros = array();

        if (!PedidoValidate::testarData($_POST['txtdata'])) {
                $erros[] = 'Data Inválida';
        }

        if (count($erros)== 0) {

            $pedido = new Pedido();

            $pedido->produtor = $_POST['txtprodutor'];
            $pedido->tipoRacao = $_POST['txttipoRacao'];
            $pedido->peso = $_POST['txtpeso'];
            $pedido->data = $_POST['txtdata'];
            $pedido->turno = $_POST['txtturno'];

            $pedidoDAO = new PedidoDAO();
            $pedidoDAO->create($pedido);

            header("location:../View/Pedido/createPedido.php?operation=cadastrar");
            
        } else {
        echo "<script>alert('Data Inválida!');</script>";
        }

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
            case 'atualizar';
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