<?php
class DashboardController {
/*     private $contactDAO;
 */
    private $licencieDAO;
    private $educateurDAO;
    private $categorieDAO;
    private $contactDAO;

    public $errors = array(); 

    public function __construct(LicencieDAO $licencieDAO, EducateurDAO $educateurDAO, CategorieDAO $categorieDAO, ContactDAO $contactDAO) {

        $this->licencieDAO = $licencieDAO;

        $this->educateurDAO = $educateurDAO;

        $this->categorieDAO = $categorieDAO;

        $this->contactDAO = $contactDAO;

    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les contacts depuis le modÃ¨le
        //$contacts = $this->contactDAO->getAll();
        $categories = $this->categorieDAO->getCount();

        $contacts = $this->contactDAO->getCount();

        $educateurs = $this->educateurDAO->getCount();

        $licencies = $this->licencieDAO->getCount();
        // Inclure la vue pour afficher le tableau de board
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/dashboard/dashboard.php";
        //require_once("views/dashboard.php");
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
$licencieDAO=new LicencieDAO(new Connexion());
$categorieDAO=new CategorieDAO(new Connexion());
$contactDAO=new ContactDAO(new Connexion());
$educateurDAO=new EducateurDAO(new Connexion());
$controller=new DashboardController($licencieDAO, $educateurDAO, $categorieDAO, $contactDAO);
$controller->index();

?>
