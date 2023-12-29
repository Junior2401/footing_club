<?php
class ShowCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function ShowCategorie($categorieId) {
        // Récupérer le categorie à afficher en utilisant son ID
        $categorie = $this->categorieDAO->getById($categorieId);

        // Inclure la vue pour afficher les détails du categorie
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/categories/show_categorie.php"; 
        //include('../views/categories/index_categorie.php');
    }
}

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
require_once ROOT_PATH . "config/config.php";
require_once ROOT_PATH . "classes/models/Connexion.php";
require_once ROOT_PATH . "classes/models/CategorieModel.php";
require_once ROOT_PATH . "classes/dao/CategorieDAO.php";
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new ShowCategorieController($categorieDAO);
$controller->ShowCategorie($_GET['id']);


?>

