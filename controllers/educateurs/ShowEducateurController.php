<?php
class ShowEducateurController {
    private $licencieDAO;

    private $contactDAO;

    private $categorieDAO;

    private $educateurDAO;


    public function __construct(LicencieDAO $licencieDAO, ContactDAO $contactDAO, CategorieDAO $categorieDAO, EducateurDAO $educateurDAO) {

        $this->licencieDAO = $licencieDAO;

        $this->contactDAO = $contactDAO;

        $this->categorieDAO = $categorieDAO;

        $this->educateurDAO = $educateurDAO;
    }

    public function showEducateur($educateurId) {
        // Récupérer le licencie à afficher en utilisant son ID
        $educateur = $this->educateurDAO->getById($educateurId);
        $licencie = $this->licencieDAO->getById($educateur->getLicencieId());
        $categorie = $this->categorieDAO->getById($licencie->getCategorieId());
        $contact = $this->contactDAO->getById($licencie->getContactId());


        // Inclure la vue pour afficher les détails du licencie
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/educateurs/show_educateur.php"; 
        //include('../views/licencies/index_licencie.php');
    }
}

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
require_once ROOT_PATH . "config/config.php";
require_once ROOT_PATH . "classes/models/Connexion.php";
require_once ROOT_PATH . "classes/models/LicencieModel.php";
require_once ROOT_PATH . "classes/dao/LicencieDAO.php";
require_once ROOT_PATH . "classes/models/CategorieModel.php";
require_once ROOT_PATH . "classes/dao/CategorieDAO.php";
require_once ROOT_PATH . "classes/models/ContactModel.php";
require_once ROOT_PATH . "classes/dao/ContactDAO.php";
require_once ROOT_PATH . "classes/models/EducateurModel.php";
require_once ROOT_PATH . "classes/dao/EducateurDAO.php";
$educateurDAO=new EducateurDAO(new Connexion());
$licencieDAO=new LicencieDAO(new Connexion());
$categorieDAO=new CategorieDAO(new Connexion());
$contactDAO=new ContactDAO(new Connexion());
$controller=new ShowEducateurController($licencieDAO, $contactDAO, $categorieDAO, $educateurDAO);
$controller->showEducateur($_GET['id']);


?>

