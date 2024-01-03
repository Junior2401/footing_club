<?php
class UserDAO{

    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    public function login($email, $password) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT COUNT(*) FROM educateurs WHERE email = ? AND password = ? AND role = 1");
            $stmt->execute([$email, md5($password)]);
            $row = $stmt->fetchColumn();      
            var_dump($row);      
            if ($row>0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Oops! Quelque chose c'est mal passée.";
            header('Location:IndexController.php');
        }
    }
    }

?>