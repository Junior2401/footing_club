<?php
class AddCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }
    
    public function index() {
        // Inclure la vue pour afficher le formulaire d'ajout de categorie
        define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
        require DOC_ROOT_PATH . "views/categories/add_categorie.php";        
    }
    
    public function addCategorie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $code = $_POST['code'];
            $nom = $_POST['nom'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet CategorieModel avec les données du formulaire
            $nouveauCategorie = new CategorieModel(0, $code, $nom);
            // Appeler la méthode du modèle (CategorieDAO) pour ajouter le categorie
            if ($this->categorieDAO->create($nouveauCategorie)) {
                // Rediriger vers la page d'accueil après l'ajout
                $_SESSION['msg'] = "Bravo categorie ajoute!";
                header('Location:IndexCategorieController.php');

            } else {
                // Gérer les erreurs d'ajout de categorie
                echo "Erreur lors de l'ajout du categorie.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de categorie
        include('../views/add_categorie.php');
    }
}


define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
require_once ROOT_PATH . "config/config.php";
require_once ROOT_PATH . "classes/models/Connexion.php";
require_once ROOT_PATH . "classes/models/CategorieModel.php";
require_once ROOT_PATH . "classes/dao/CategorieDAO.php";
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new AddCategorieController($categorieDAO);
if(!isset($_POST['action'])){
$controller->index();
}else{
    $controller->addCategorie();
}


?>

