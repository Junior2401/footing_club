<?php
class IndexEducateurController {
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
    }

    public function index() {
        // Récupérer le educateur à afficher en utilisant son ID
        $educateurs = $this->educateurDAO->getAll();

        // Inclure la vue pour afficher les détails dueducateur
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/educateurs/index_educateur.php";

    }
}

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
require_once ROOT_PATH . "config/config.php";
require_once ROOT_PATH . "classes/models/Connexion.php";
require_once ROOT_PATH . "classes/models/educateurModel.php";
require_once ROOT_PATH . "classes/dao/educateurDAO.php";
$educateurDAO=new EducateurDAO(new Connexion());
$controller=new IndexEducateurController($educateurDAO);
$controller->index();


?>

