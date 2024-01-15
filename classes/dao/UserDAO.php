<?php
class UserDAO{

    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    public function login($email, $password) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT COUNT(*) FROM educateurs WHERE email = ? AND roles = 1");
            $stmt->execute([$email]);
            $row = $stmt->fetchColumn();
            
            if ($row > 0) {
                // Fetch the hashed password from the database
                $stmt = $this->connexion->pdo->prepare("SELECT password FROM educateurs WHERE email = ? AND roles = 1");
                $stmt->execute([$email]);
                $hashedPassword = $stmt->fetchColumn();
            
                // Verify the entered password against the stored hash
                if (password_verify($password, $hashedPassword)) {
                    return true;
                } else {
                    return false;
                }
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