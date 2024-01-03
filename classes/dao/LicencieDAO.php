<?php
class LicencieDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    // MÃ©thode pour insÃ©rer un nouveau licencie dans la base de donnÃ©es
    public function create(LicencieModel $licencie) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO licencies (licence, nom, prenom, categorie_id, contact_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$licencie->getLicence(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getCategorieId(), $licencie->getContactId()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer un licencie par son ID
    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM licencies WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new LicencieModel($row['id'], $row['licence'],$row['nom'], $row['prenom'], $row['categorie_id'], $row['contact_id']);
            } else {
                $_SESSION['error'] = "Oops! Quelque chose c'est mal passée.";
                header('Location:IndexLicencieController.php');
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les licencies
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM licencies ORDER BY id DESC");
            $licencies = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $licencies[] = new LicencieModel($row['id'],$row['licence'],$row['nom'], $row['prenom'], $row['categorie_id'], $row['contact_id']);
            }

            return $licencies;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }




    public function getCount() {
        try {
            $licencies = $this->connexion->pdo->query("SELECT COUNT(*) FROM licencies");
            $licencies = $licencies->fetchColumn();            
            return $licencies;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }    

    // MÃ©thode pour mettre Ã  jour un licencie
    public function update(LicencieModel $licencie) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE licencies SET licence = ?,  nom = ?, prenom = ?, categorie_id = ?, contact_id = ? WHERE id = ?");
            $stmt->execute([$licencie->getLicence(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getCategorieId(), $licencie->getContactId(), $licencie->getId()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }

    // MÃ©thode pour supprimer un licencie par son ID
    public function deleteById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM licencies WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }
}
?>
