<?php

    require ('Model/Pedido.php');
    require ('Include/PedidoValidate.php');

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

        header("location:../View/Pedido/createPedido.php");
        
    } else {
    echo "<script>alert('Data Inválida!');</script>"; }

   

?>