<?php
class EditEducateurController {

    private $licencieDAO;

    private $educateurDAO;

    private $contactDAO;

    private $categorieDAO;


    public function __construct(LicencieDAO $licencieDAO, EducateurDAO $educateurDAO, ContactDAO $contactDAO, CategorieDAO $categorieDAO) {

        $this->licencieDAO = $licencieDAO;

        $this->educateurDAO = $educateurDAO;

        $this->contactDAO = $contactDAO;

        $this->categorieDAO = $categorieDAO;
    }

    public function editEducateur($getId) {
        
        // Récupérer le contact à modifier en utilisant son ID
        $educateur = $this->educateurDAO->getById($getId);


        if(!$educateur) {

                $licencie = $this->licencieDAO->getById($getId);

                if(!$licencie){
                    $_SESSION['error'] = "Oops! Quelque chose c'est mal passée.";
                    header('Location:IndexEducateurController.php');                    
                }

                $categorieSelect = $this->categorieDAO->getById($licencie->getCategorieId());
                $contactSelect = $this->contactDAO->getById($licencie->getContactId());
                $categories = $this->categorieDAO->getAll();
                $contacts = $this->contactDAO->getAll();
    
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Récupérer les données du formulaire
                    $id = $_POST['id'];
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
                        $_SESSION['msg'] = "Bravo éducateur modifié!";
                        header('Location:IndexEducateurController.php');
                        exit();
                    } else {
                        // Gérer les erreurs de mise à jour du contact
                        echo "Erreur lors de la modification de l'éducateur.";
                    }                    
                }                
        }else{

            $licencie = $this->licencieDAO->getById($educateur->getLicencieId());
            $categorieSelect = $this->categorieDAO->getById($licencie->getCategorieId());
            $contactSelect = $this->contactDAO->getById($licencie->getContactId());
            $categories = $this->categorieDAO->getAll();
            $contacts = $this->contactDAO->getAll();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $id = $_POST['id'];
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
                    $_SESSION['msg'] = "Bravo éducateur modifié!";
                    header('Location:IndexEducateurController.php');
                    exit();
                } else {
                    // Gérer les erreurs de mise à jour du contact
                    echo "Erreur lors de la modification de l'éducateur.";
                }
            }            
        }



        // Inclure la vue pour afficher le formulaire de modification du contact
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/educateurs/edit_educateur.php";  
        //include('../views/edit_contact.php');
    }
}

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
require_once ROOT_PATH . "config/config.php";
require_once ROOT_PATH . "classes/models/EducateurModel.php";
require_once ROOT_PATH . "classes/dao/EducateurDAO.php";
require_once ROOT_PATH . "classes/models/Connexion.php";
require_once ROOT_PATH . "classes/models/LicencieModel.php";
require_once ROOT_PATH . "classes/dao/LicencieDAO.php";
require_once ROOT_PATH . "classes/models/CategorieModel.php";
require_once ROOT_PATH . "classes/dao/CategorieDAO.php";
require_once ROOT_PATH . "classes/models/ContactModel.php";
require_once ROOT_PATH . "classes/dao/ContactDAO.php";
$educateurDAO=new educateurDAO(new Connexion());
$licencieDAO=new LicencieDAO(new Connexion());
$categorieDAO=new CategorieDAO(new Connexion());
$contactDAO=new ContactDAO(new Connexion());
$controller=new EditEducateurController($licencieDAO, $educateurDAO, $contactDAO, $categorieDAO); 
$controller->editEducateur($_GET['id']);
?>

