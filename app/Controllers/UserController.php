<?php

require_once '../config/conexao.php';
require_once '../app/Models/UserModel.php';

class UserController {
    
    private $userModel; 

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function cadastrar() {
    

        if (!isset($_SESSION['login'])) {
            include_once '../app/views/auth/cadastro.php';
            if (isset($_GET['formulario_cadastro_enviado']) && $_GET['formulario_cadastro_enviado'] === 'true') {
                $dadosCadastro = [
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                ];
                
                try {
                    $this->processarCadastro($dadosCadastro); 
                } catch (Exception $e) {
                    echo 'Erro ao processar o cadastro: ' . $e->getMessage(); 
                }            
            }
        } else {
            header('Location: ../public/');
        }
    }

    private function processarCadastro($dadosCadastro) {
        $this->userModel->cadastrarUsuario($dadosCadastro);
    }

    public function login() {
        if (!isset($_SESSION['login'])) {
            include_once '../app/views/auth/login.php';
            if (isset($_GET['formulario_login_enviado']) && $_GET['formulario_login_enviado'] === 'true') {
                $dadosLogin = [
                    'email' => $_POST['email'],
                    'password' => $_POST['password']
                ];
                
                try {
                    $this->processarLogin($dadosLogin);
                } catch (Exception $e) {
                    echo 'Erro ao processar o cadastro: ' . $e->getMessage(); 
                }            
            }
        } else {
            header('Location: ../public/');
        }
    }

    private function processarLogin($dadosLogin) {
        $this->userModel->loginUsuario($dadosLogin);
    }

    public function logout() {
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            try {
                $this->processarLogout();
            } catch (Exception $e) {
                echo 'Erro ao processar o logout: ' . $e->getMessage(); 
            }
        } else {
            header('Location: ../public/');
        }
    }

    private function processarLogout() {
        session_destroy();
        header('Location: ../public/');
    }
}