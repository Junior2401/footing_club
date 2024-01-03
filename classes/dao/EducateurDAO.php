<?php
class EducateurDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    // MÃ©thode pour insÃ©rer un nouveau educateur dans la base de donnÃ©es
    public function create(EducateurModel $educateur) {
        try {
            var_dump([$educateur->getEmail(), $educateur->getPassword(), $educateur->getRole(), $educateur->getLicencieId()]);
            $stmt = $this->connexion->pdo->prepare("INSERT INTO educateurs (email, password, role, licencie_id) VALUES (?, ?, ?, ?)");
            $stmt->execute([$educateur->getEmail(), $educateur->getPassword(), $educateur->getRole(), $educateur->getLicencieId()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer un educateur par son ID
    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM educateurs WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($row) {
                return new EducateurModel($row['id'], $row['email'],$row['password'], $row['role'], $row['licencie_id'], null, null, null);
            } else {
                $_SESSION['error'] = "Oops! Quelque chose c'est mal passée.";
                header('Location:IndexEducateurController.php');
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }


    public function licencieByLicence($licence) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM licencies WHERE licence = ?");
            $stmt->execute([$licence]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['licence']!=null) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }    



    public function getLastLicencie() {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM licencies ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $licenceId = $row['id'];
            return $licenceId;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    } 



    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les educateurs
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM educateurs, licencies WHERE educateurs.licencie_id = licencies.id ORDER BY educateurs.id DESC");
            $educateurs = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $educateurs[] = new EducateurModel($row['id'], $row['email'],$row['password'], $row['role'], $row['licencie_id'], $row['licence'],$row['nom'], $row['prenom']);
            }

            return $educateurs;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }




    public function getCount() {
        try {
            $educateurs = $this->connexion->pdo->query("SELECT COUNT(*) FROM educateurs");
            $educateurs = $educateurs->fetchColumn(); 
            return $educateurs;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }




    // MÃ©thode pour mettre Ã  jour un educateur
    public function update(EducateurModel $educateur) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE educateurs SET email = ?,  password = ?, role = ?, licencie_id = ? WHERE id = ?");
            $stmt->execute([$educateur->getEmail(), $educateur->getPassword(), $educateur->getRole(), $educateur->getLicencieId(), $educateur->getId()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }

    // MÃ©thode pour supprimer un educateur par son ID
    public function deleteById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM educateurs WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }
}
?>
