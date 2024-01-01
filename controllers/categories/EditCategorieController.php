<?php
class EditCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function editCategorie($categorieId) {
        // Récupérer le categorie à modifier en utilisant son ID
        $categorie = $this->categorieDAO->getById($categorieId);

        if (!$categorie) {
            // Le categorie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le categorie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $code = $_POST['code'];
            $nom = $_POST['nom'];


            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du categorie
            $categorie->setCode($code);
            $categorie->setNom($nom);
            // Appeler la méthode du modèle (CategorieDAO) pour mettre à jour le categorie
            if ($this->categorieDAO->update($categorie)) {
                // Rediriger vers la page de détails du categorie après la modification
                //header('Location:IndexCategorieController.php?id=' . $categorieId);
                $_SESSION['msg'] = "Bravo catégorie modifié!";
                header('Location:IndexCategorieController.php');
                exit();
            } else {
                // Gérer les erreurs de mise à jour du categorie
                echo "Erreur lors de la modification du categorie.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du categorie
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/categories/edit_categorie.php";  
        //include('../views/edit_categorie.php');
    }
}

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
require_once ROOT_PATH . "config/config.php";
require_once ROOT_PATH . "classes/models/Connexion.php";
require_once ROOT_PATH . "classes/models/CategorieModel.php";
require_once ROOT_PATH . "classes/dao/CategorieDAO.php";
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new EditCategorieController($categorieDAO);
$controller->editCategorie($_GET['id']);
?>

