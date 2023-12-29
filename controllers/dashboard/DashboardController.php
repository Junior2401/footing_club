<?php
class DashboardController {
/*     private $contactDAO;
 */
    public function __construct(/*ContactDAO $contactDAO*/) {
        //$this->contactDAO = $contactDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les contacts depuis le modÃ¨le
        //$contacts = $this->contactDAO->getAll();

        // Inclure la vue pour afficher le tableau de board
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/dashboard/dashboard.php";
        //require_once("views/dashboard.php");
    }
}

// require_once("../config/config.php");
// require_once("../classes/models/Connexion.php");
// require_once("../classes/models/ContactModel.php");
// require_once("../classes/dao/ContactDAO.php");
// $contactDAO=new ContactDAO(new Connexion());
// $controller=new HomeController($contactDAO);
$controller=new DashboardController();
$controller->index();

?>
