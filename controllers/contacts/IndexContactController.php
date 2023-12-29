<?php
class IndexContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function Index() {
        // Récupérer le contact à afficher en utilisant son ID
        $contacts = $this->contactDAO->getAll();

        // Inclure la vue pour afficher les détails du contact
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/contacts/index_contact.php";

    }
}

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
require_once ROOT_PATH . "config/config.php";
require_once ROOT_PATH . "classes/models/Connexion.php";
require_once ROOT_PATH . "classes/models/ContactModel.php";
require_once ROOT_PATH . "classes/dao/ContactDAO.php";
$contactDAO=new ContactDAO(new Connexion());
$controller=new IndexContactController($contactDAO);
$controller->Index();


?>

