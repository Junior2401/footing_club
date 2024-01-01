<?php
class IndexLicencieController {
    private $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }

    public function Index() {
        // Récupérer le licencie à afficher en utilisant son ID
        $licencies = $this->licencieDAO->getAll();

        // Inclure la vue pour afficher les détails dulicencie
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/licencies/index_licencie.php";

    }
}

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
require_once ROOT_PATH . "config/config.php";
require_once ROOT_PATH . "classes/models/Connexion.php";
require_once ROOT_PATH . "classes/models/licencieModel.php";
require_once ROOT_PATH . "classes/dao/licencieDAO.php";
$licencieDAO=new LicencieDAO(new Connexion());
$controller=new IndexLicencieController($licencieDAO);
$controller->Index();


?>

