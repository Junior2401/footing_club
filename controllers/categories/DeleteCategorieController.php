<?php
class DeleteCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function deleteCategorie($categorieId) {
        // Récupérer le categorie à supprimer en utilisant son ID
        $categorie = $this->categorieDAO->getById($categorieId);

        if (!$categorie) {
            // Le categorie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le categorie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le categorie en appelant la méthode du modèle (CategorieDAO)
            if ($this->categorieDAO->deleteById($categorieId)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:IndexCategorieController.php');
                exit();
            } else {
                // Gérer les erreurs de suppression du categorie
                echo "Erreur lors de la suppression du categorie.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du categorie
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/categories/delete_categorie.php";
        //include('../views/delete_categorie.php');
    }
}

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
require_once ROOT_PATH . "config/config.php";
require_once ROOT_PATH . "classes/models/Connexion.php";
require_once ROOT_PATH . "classes/models/CategorieModel.php";
require_once ROOT_PATH . "classes/dao/CategorieDAO.php";
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new DeleteCategorieController($categorieDAO);
$controller->deleteCategorie($_GET['id']);


?>

