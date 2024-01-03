<?php
class AddLicencieController {
    private $licencieDAO;
    private $categorieDAO;
    private $contactDAO;
    
    public $errors = [];

    public function __construct(LicencieDAO $licencieDAO, CategorieDAO $categorieDAO, ContactDAO $contactDAO) {

        $this->licencieDAO = $licencieDAO;

        $this->categorieDAO = $categorieDAO;

        $this->contactDAO = $contactDAO;
    }
    
    public function index() {

        $categories = $this->categorieDAO->getAll();

        $contacts = $this->contactDAO->getAll();

        // Inclure la vue pour afficher le formulaire d'ajout de licencie
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/licencies/add_licencie.php";        
    }
    
    public function addLicencie() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $licence = $_POST['licence'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $categorie_id = $_POST['categorie_id'];
            $contact_id = $_POST['contact_id'];
            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet LicencieModel avec les données du formulaire
            $nouveauLicencie = new LicencieModel(0, $licence,$nom, $prenom, $categorie_id, $contact_id);
            // Appeler la méthode du modèle (LicencieDAO) pour ajouter le licencie
            if ($this->licencieDAO->create($nouveauLicencie)) {
                // Rediriger vers la page d'accueil après l'ajout
                $_SESSION['msg'] = "Bravo licencie ajoute!";
                header('Location:IndexLicencieController.php');

            } else {
                // Gérer les erreurs d'ajout de licencie
                echo "Erreur lors de l'ajout du licencie.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de licencie
        include('../views/add_licencie.php');
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
$controller=new AddLicencieController($licencieDAO, $categorieDAO, $contactDAO);
if(!isset($_POST['action'])){
$controller->index();
}else{
    $controller->addLicencie();
}


?>

