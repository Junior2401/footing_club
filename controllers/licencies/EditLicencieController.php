<?php
class EditLicencieController {

    private $licencieDAO;

    private $contactDAO;

    private $categorieDAO;


    public function __construct(LicencieDAO $licencieDAO, ContactDAO $contactDAO, CategorieDAO $categorieDAO) {

        $this->licencieDAO = $licencieDAO;

        $this->contactDAO = $contactDAO;

        $this->categorieDAO = $categorieDAO;
    }

    public function editLicencie($licencieId) {
        
        // Récupérer le contact à modifier en utilisant son ID
        $licencie = $this->licencieDAO->getById($licencieId);
        $categorieSelect = $this->categorieDAO->getById($licencie->getCategorieId());
        $contactSelect = $this->contactDAO->getById($licencie->getContactId());
        $categories = $this->categorieDAO->getAll();
        $contacts = $this->contactDAO->getAll();

        if (!$licencie) {
            // La licencié n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            $_SESSION['error'] = "Le licencie n'a pas été trouvé!";
            header('Location:IndexLicencieController.php');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $id = $licencieId;
            $licence = $_POST['licence'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $categorie_id = $_POST['categorie_id'];
            $contact_id = $_POST['contact_id'];


            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du contact
            $licencie->setId($id);
            $licencie->setLicence($licence);
            $licencie->setNom($nom);
            $licencie->setPrenom($prenom);
            $licencie->setCategorieId($categorie_id);
            $licencie->setContactId($contact_id);

            // Appeler la méthode du modèle (ContactDAO) pour mettre à jour le contact
            if ($this->licencieDAO->update($licencie)) {
                // Rediriger vers la page de détails du contact après la modification
                //header('Location:IndexContactController.php?id=' . $contactId);
                $_SESSION['msg'] = "Bravo licencie modifié!";
                header('Location:IndexLicencieController.php');
                exit();
            } else {
                // Gérer les erreurs de mise à jour du contact
                echo "Erreur lors de la modification du licencié.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du contact
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/licencies/edit_licencie.php";  
        //include('../views/edit_contact.php');
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
$controller=new EditLicencieController($licencieDAO, $contactDAO, $categorieDAO); 
$controller->editLicencie($_GET['id']);
?>

