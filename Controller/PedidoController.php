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

    function atualizar() {

    }

    function deletar() {

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