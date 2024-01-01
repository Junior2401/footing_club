<?php
class DeleteLicencieController {
    private $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }

    public function deleteLicencie($licencieId) {
        // Récupérer le licencie à supprimer en utilisant son ID
        $licencie = $this->licencieDAO->getById($licencieId);

        if (!$licencie) {
            // Le licencie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le licencie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le licencie en appelant la méthode du modèle (LicencieDAO)
            if ($this->licencieDAO->deleteById($licencieId)) {
                // Rediriger vers la page d'accueil après la suppression
                $_SESSION['msg'] = "Bravo, le licencié a été supprimé!";
                header('Location:IndexLicencieController.php');
                exit();
            } else {
                // Gérer les erreurs de suppression du licencie
                echo "Erreur lors de la suppression du licencie.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du licencie
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/licencies/delete_licencie.php";
        //include('../views/delete_licencie.php');
    }
}

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
require_once ROOT_PATH . "config/config.php";
require_once ROOT_PATH . "classes/models/Connexion.php";
require_once ROOT_PATH . "classes/models/LicencieModel.php";
require_once ROOT_PATH . "classes/dao/LicencieDAO.php";
$licencieDAO=new LicencieDAO(new Connexion());
$controller=new DeleteLicencieController($licencieDAO);
$controller->deleteLicencie($_GET['id']);


?>

