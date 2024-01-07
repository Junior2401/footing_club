<?php

    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
    require_once ROOT_PATH . "config/config.php";
    require_once ROOT_PATH . "classes/models/Connexion.php";    
    require_once ROOT_PATH . "classes/models/UserModel.php";
    require_once ROOT_PATH . "classes/dao/UserDAO.php";
    

    class UserController {
        private $userDAO;

        public function __construct(UserDAO $userDAO){
            $this->userDAO = $userDAO;
        }

        public function login($email, $password) {
            $user = $this->userDAO->login($email, $password);
            if ($user) {
                $_SESSION['msg'] = "Authentification reussi.";
                $_SESSION['email']= $email;
                header('Location:dashboard/DashboardController.php'); 
            } else {
                $_SESSION['error'] = "Nom d'utilisateur ou mot de passe erroné.";
                require ROOT_PATH."/views/index.php";
            }
        }

        public function logout() {
            session_destroy();
            header("Location:HomeController.php");
        }
    }


    $userDAO=new UserDAO(new Connexion());
    $controller=new UserController($userDAO);
    
    if(isset($_POST['email'])){
        $controller->login($_POST['email'], $_POST['password']);        
    }else{
        $controller->logout();
    }



?>