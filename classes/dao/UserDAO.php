<?php
class UserDAO{

    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    public function login($email, $password) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT COUNT(*) FROM educateurs WHERE email = ? AND password = ? AND roles = 1");
            $stmt->execute([$email, password_hash($password, PASSWORD_BCRYPT)]);
            $row = $stmt->fetchColumn();          
            if ($row>0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Oops! Quelque chose c'est mal passée.";
            header('Location:dashboard/DashboardController.php');
        }
    }
    }

?>