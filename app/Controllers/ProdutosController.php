<?php
require_once '../config/conexao.php';
require_once '../app/models/ProdutosModel.php';
class ProdutosController{

    private $ProdutosModel;

    public function __construct() {
        $this->ProdutosModel = new ProdutosModel();
    }

    public function index(){
        $produtos = ProdutosModel::index();
        var_dump($produtos);
    }

    public function exibirInfantil(){
        $produtos = ProdutosModel::exibir(1);
        var_dump($produtos);
    }

    public function exibirMasculino(){
        $produtos = ProdutosModel::exibir(2);
        var_dump($produtos);
    }

    public function exibirFeminino(){
        $produtos = ProdutosModel::exibir(3);
        var_dump($produtos);
    }

    public function formProduto(){ 
        include "../app/views/admin/formulario_produto.php";
    }

    public function createProduto(){
        if(isset($_SESSION['usuario']['tipo_usuario']) && $_SESSION['usuario']['tipo_usuario'] != 1){
            /* $nomeProduto = $_POST['nomeProduto'];
            $categoriaProduto = $_POST['categoriaProduto'];
            $nomeProduto = $_POST['nomeProduto'];
            $categoriaProduto = $_POST['categoriaProduto'];
            $descricaoProduto = $_POST['descricaoProduto'];
            $preco = $_POST['preco'];
            $quantidadeEstoque = $_POST['quantidadeEstoque']; */

            $nomeProduto = "Camiseta marcos teste"; 
            $categoriaProduto = 2;         
            $descricaoProduto = 'camiseta do marcos 1323'; 
            $preco = 45.99;  
            $quantidadeEstoque = 14;  
    
            $this->ProdutosModel->createProduto($nomeProduto, $categoriaProduto, $descricaoProduto, $preco, $quantidadeEstoque);
        }else{
            header('Location: ../');
            exit();
        }
    }
}