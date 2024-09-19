<?php 
    require_once '../config/conexao.php';
    require_once "../app/Models/AdminModel.php";


    class AdminController {

        private $AdminModel;

        public function __construct() {
            $this->AdminModel = new AdminModel();
        }


        public function index(){
            echo "dashboard";
        }

        public function listUsers(){
            if(isset($_SESSION['usuario']['tipo_usuario']) && $_SESSION['usuario']['tipo_usuario'] == 3){
                $users = AdminModel::getAllUsers();
                include_once "../app/views/admin/list-users.php";
            }else{
                header('Location: ../');
            }
        }

        public function updateTipoUsuario(){
            $userId = $_POST['userId'];
            $tipoUsuario = $_POST['tipo_usuario'];

            $currentUserData = AdminModel::getAllUsers($userId);

            $isModified = false;

            if($currentUserData['tipo_usuario'] != $tipoUsuario){
                $isModified = true;
            }

            if($isModified == true){
                $this->AdminModel->updateTipoUsuario($userId, $tipoUsuario);
            }else{
                header('Location: ../public/list-users');
            }
           
        }
    }
