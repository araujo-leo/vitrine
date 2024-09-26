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

    public static function createProduto($nomeProduto, $categoriaProduto, $descricaoProduto, $preco, $quantidadeEstoque){
        require '../config/conexao.php';

        $sql = "INSERT INTO produtos (nome_produto, categoria_produto, descricao_produto, preco, quantidade_estoque)
            VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisii", $nomeProduto, $categoriaProduto, $descricaoProduto, $preco, $quantidadeEstoque);

        if ($stmt->execute()) {
            echo "Produto cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar o produto: " . $stmt->error;
        }
    }

    public static function deleteProduto(){
        
    }
}   