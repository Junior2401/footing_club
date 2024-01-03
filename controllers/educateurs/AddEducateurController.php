<?php
class AddEducateurController {
    private $licencieDAO;
    private $educateurDAO;
    private $categorieDAO;
    private $contactDAO;

    public $errors = array(); 

    public function __construct(LicencieDAO $licencieDAO, EducateurDAO $educateurDAO, CategorieDAO $categorieDAO, ContactDAO $contactDAO) {

        $this->licencieDAO = $licencieDAO;

        $this->educateurDAO = $educateurDAO;

        $this->categorieDAO = $categorieDAO;

        $this->contactDAO = $contactDAO;

    }
    
    public function index() {

        $errors = array();
        $email = "";

        $categories = $this->categorieDAO->getAll();

        $contacts = $this->contactDAO->getAll();

        // Inclure la vue pour afficher le formulaire d'ajout de educateur
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/educateurs/add_educateur.php";        
    }
    
    public function addEducateur() {

        $errors = array(); 
        $role = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $licence = $_POST['licence'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $categorie_id = $_POST['categorie_id'];
            $contact_id = $_POST['contact_id'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $password_1 = $_POST['password_1'];
            $password_2 = $_POST['password_2'];
            if (empty($email)) { array_push($errors, "L'email est obligatoire"); }
            if (empty($password_1)) { array_push($errors, "Mot de passe obligatoire"); }
            if (empty($password_2)) { array_push($errors, "Confirmation mot de passe obligatoire"); }
            if ($password_1 != $password_2) {
                array_push($errors, "Les mot de passe ne sont pas conforme.");
            }

            // Valider les données du formulaire (ajoutez des validations si nécessaire)
            $verification = $this->educateurDAO->licencieByLicence($licence);

            if($verification){
                $_SESSION['error'] = "Le code de l'éducateur existe déjà dans la base de données!";
                header('Location:AddEducateurController.php');
            }else{
                var_dump($_POST);
                // Créer un nouvel objet LicencieModel avec les données du formulaire
                $nouveauLicencie = new LicencieModel(0, $licence,$nom, $prenom, $categorie_id, $contact_id);
                // Appeler la méthode du modèle (LicencieDAO) pour ajouter le educateur
                if ($this->licencieDAO->create($nouveauLicencie)) {
                    // Rediriger vers la page d'accueil après l'ajout
                    $licencieId = $this->educateurDAO->getLastLicencie();
                    $nouveauEducateur="";
                    if($role=="admin"){
                        $nouveauEducateur = new EducateurModel(0, $email, md5($password_1), 1, $licencieId, null, null, null);
                    }elseif($role=="user"){
                        $nouveauEducateur = new EducateurModel(0, $email, md5($password_1), 0, $licencieId, null, null, null);
                    }
                    $nouveauEducateur;
                    if($this->educateurDAO->create($nouveauEducateur)){
                        $_SESSION['msg'] = "Bravo educateur ajoute!";
                        header('Location:IndexEducateurController.php');
                    }else{
                        $_SESSION['error'] = "Oops! Quelque chose c'est mal passée!";
                        header('Location:AddEducateurController.php');
                    }


                } else {
                    $_SESSION['error'] = "Oops! Quelque chose c'est mal passée!";
                    header('Location:IndexEducateurController.php');
                }
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de educateur
        include('../views/add_educateur.php');
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
require_once ROOT_PATH . "classes/models/EducateurModel.php";
require_once ROOT_PATH . "classes/dao/EducateurDAO.php";
$licencieDAO=new LicencieDAO(new Connexion());
$categorieDAO=new CategorieDAO(new Connexion());
$contactDAO=new ContactDAO(new Connexion());
$educateurDAO=new EducateurDAO(new Connexion());
$controller=new AddEducateurController($licencieDAO, $educateurDAO, $categorieDAO, $contactDAO);
if(!isset($_POST['action'])){
    $controller->index();
}else{
    $controller->addEducateur();
}


?>

