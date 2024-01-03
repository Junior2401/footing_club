<?php
class ConnexionController {
    public function index() {

    // Inclure la vue pour afficher la liste des contacts
    define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
    require DOC_ROOT_PATH."index.php";
    }
}

$controller=new ConnexionController();
$controller->index();

?>
