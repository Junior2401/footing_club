<?php
class ShowLicencieController {
    private $licencieDAO;

    private $contactDAO;

    private $categorieDAO;


    public function __construct(LicencieDAO $licencieDAO, ContactDAO $contactDAO, CategorieDAO $categorieDAO) {

        $this->licencieDAO = $licencieDAO;

        $this->contactDAO = $contactDAO;

        $this->categorieDAO = $categorieDAO;
    }

    public function showLicencie($licencieId) {
        // Récupérer le licencie à afficher en utilisant son ID
        $licencie = $this->licencieDAO->getById($licencieId);
        $categorie = $this->categorieDAO->getById($licencie->getCategorieId());
        $contact = $this->contactDAO->getById($licencie->getContactId());

        // Inclure la vue pour afficher les détails du licencie
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/licencies/show_licencie.php"; 
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
$licencieDAO=new LicencieDAO(new Connexion());
$categorieDAO=new CategorieDAO(new Connexion());
$contactDAO=new ContactDAO(new Connexion());
$controller=new ShowLicencieController($licencieDAO, $contactDAO, $categorieDAO);
$controller->showLicencie($_GET['id']);


?>

