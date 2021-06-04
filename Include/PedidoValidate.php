<?php

class PedidoValidate {
    public static function testarData($varData){

        $hoje = date('Y-m-d');

        if ($varData >= $hoje){
        return true;
        } else 
        return false;
    }
}
?>