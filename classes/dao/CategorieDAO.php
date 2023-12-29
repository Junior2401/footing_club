<?php
class CategorieDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    // MÃ©thode pour insÃ©rer un nouveau categorie dans la base de donnÃ©es
    public function create(CategorieModel $categorie) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO categories (code, nom) VALUES (?, ?)");
            $stmt->execute([$categorie->getCode(), $categorie->getNom()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer un categorie par son ID
    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM categories WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new CategorieModel($row['id'],$row['code'], $row['nom']);
            } else {
                return null; // Aucun categorie trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les categories
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM categories");
            $categories = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categories[] = new CategorieModel($row['id'],$row['code'], $row['nom']);
            }

            return $categories;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }

    // MÃ©thode pour mettre Ã  jour un categorie
    public function update(CategorieModel $categorie) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE categories SET code = ?, nom = ? WHERE id = ?");
            $stmt->execute([$categorie->getCode(), $categorie->getNom(), $categorie->getId()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }

    // MÃ©thode pour supprimer un categorie par son ID
    public function deleteById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM categories WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }
}
?>
