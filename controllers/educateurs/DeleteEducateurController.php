<?php
class DeleteEducateurController {
    private $licencieDAO;

    private $educateurDAO;

    public function __construct(LicencieDAO $licencieDAO, EducateurDAO $educateurDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->educateurDAO = $educateurDAO;
    }

    public function deleteEducateur($educateurId) {

        // Récupérer le éducateur à supprimer en utilisant son ID
        $educateur = $this->educateurDAO->getById($educateurId);
        $licencie_id = $educateur->getLicencieId();
        $licencie = $this->licencieDAO->getById($educateur->getLicencieId());

        if (!$educateur) {
            // L'éducateur' n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            $_SESSION['error'] = "L'éducateur' n'a pas été trouvé!";
            header('Location:IndexEducateurController.php');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Supprimer l'éducateur' en appelant la méthode du modèle (EducateurDAO)
            if ($this->educateurDAO->deleteById($educateurId)) {
                if($this->licencieDAO->deleteById($licencie_id)){
                    // Rediriger vers la page d'accueil après la suppression
                    $_SESSION['msg'] = "Bravo, l'éducateur a été supprimé!";
                    header('Location:IndexEducateurController.php');                    
                }
            } else {
                // Gérer les erreurs de suppression de l'éducateur
                $_SESSION['error'] = "Erreur lors de la suppression de l'éducateur.";
                header('Location:IndexEducateurController.php');                
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du licencie
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/educateurs/delete_educateur.php";
        //include('../views/delete_educateur.php');
    }
}

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
require_once ROOT_PATH . "config/config.php";
require_once ROOT_PATH . "classes/models/Connexion.php";
require_once ROOT_PATH . "classes/models/EducateurModel.php";
require_once ROOT_PATH . "classes/dao/EducateurDAO.php";
require_once ROOT_PATH . "classes/models/LicencieModel.php";
require_once ROOT_PATH . "classes/dao/LicencieDAO.php";
$educateurDAO=new EducateurDAO(new Connexion());
$licencieDAO=new LicencieDAO(new Connexion());
$controller=new DeleteEducateurController($licencieDAO, $educateurDAO);
$controller->deleteEducateur($_GET['id']);


?>

