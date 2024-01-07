<?php
class HomeController {
    public function index() {

    // Inclure la vue pour afficher la liste des contacts
    define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/footing_club/');
    //require DOC_ROOT_PATH."index.php";
    include('../views/index.php');
    }
}

$controller=new HomeController();
$controller->index();

?>
