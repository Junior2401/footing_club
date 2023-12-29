<?php
class DeleteContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function deleteContact($contactId) {
        // Récupérer le contact à supprimer en utilisant son ID
        $contact = $this->contactDAO->getById($contactId);

        if (!$contact) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le contact n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le contact en appelant la méthode du modèle (ContactDAO)
            if ($this->contactDAO->deleteById($contactId)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:IndexContactController.php');
                exit();
            } else {
                // Gérer les erreurs de suppression du contact
                echo "Erreur lors de la suppression du contact.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du contact
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/contacts/delete_contact.php";
        //include('../views/delete_contact.php');
    }
}

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
require_once ROOT_PATH . "config/config.php";
require_once ROOT_PATH . "classes/models/Connexion.php";
require_once ROOT_PATH . "classes/models/ContactModel.php";
require_once ROOT_PATH . "classes/dao/ContactDAO.php";
$contactDAO=new ContactDAO(new Connexion());
$controller=new DeleteContactController($contactDAO);
$controller->deleteContact($_GET['id']);


?>

