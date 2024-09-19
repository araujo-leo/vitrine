    <?php 
    require_once "../app/Models/UserModel.php";


    class HomeController {
        
        public function index() {
            $users = UserModel::getAllUsers(); 

            foreach($users as $user){
                var_dump($user);
                echo "<br>";
                echo "<br>";
            }


            include "../app/views/home.php";

            


    }}