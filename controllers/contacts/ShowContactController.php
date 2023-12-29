<?php
class ShowContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function ShowContact($contactId) {
        // Récupérer le contact à afficher en utilisant son ID
        $contact = $this->contactDAO->getById($contactId);

        // Inclure la vue pour afficher les détails du contact
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/contacts/show_contact.php"; 
        //include('../views/contacts/index_contact.php');
    }
}

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
require_once ROOT_PATH . "config/config.php";
require_once ROOT_PATH . "classes/models/Connexion.php";
require_once ROOT_PATH . "classes/models/ContactModel.php";
require_once ROOT_PATH . "classes/dao/ContactDAO.php";
$contactDAO=new ContactDAO(new Connexion());
$controller=new ShowContactController($contactDAO);
$controller->ShowContact($_GET['id']);


?>

