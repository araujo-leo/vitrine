<?php


class ProdutosModel{

    public static function index(){
        require '../config/conexao.php';

        $sql = "SELECT * FROM produtos;";

        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 1) {
            $produtos = array();
            while ($row = $resultado->fetch_assoc()) {
                $produtos[] = $row;
            }
            return $produtos;
        } elseif ($resultado->num_rows == 1) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }


    }

    public static function exibir($n){
        require '../config/conexao.php';

        $sql = "SELECT * FROM produtos WHERE categoria_produto = " .$n.";";

        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 1) {
            $produtos = array();
            while ($row = $resultado->fetch_assoc()) {
                $produtos[] = $row;
            }
            return $produtos;
        } elseif ($resultado->num_rows == 1) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }
    }

    public static function createProduto(){
        
    }
}