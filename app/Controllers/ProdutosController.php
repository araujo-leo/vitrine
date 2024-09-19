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

    public function createProduto($id){

    }
}