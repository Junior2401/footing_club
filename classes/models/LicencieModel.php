<?php

class LicencieModel {

    private $id;

    private $licence;

    private $nom;

    private $prenom;

    private $categorie_id;

    private $contact_id;



    public function __construct($id, $licence, $nom, $prenom, $categorie_id, $contact_id) {

        $this->id = $id;

        $this->licence = $licence;

        $this->nom = $nom;

        $this->prenom = $prenom;

        $this->categorie_id = $categorie_id;

        $this->contact_id = $contact_id;

    }



    public function getId() {

        return $this->id;

    }



    public function getLicence() {

        return $this->licence;

    }



    public function getNom() {

        return $this->nom;

    }



    public function getPrenom() {

        return $this->prenom;

    }



    public function getCategorieId() {

        return $this->categorie_id;

    }



    public function getContactId() {

        return $this->contact_id;

    }

    

    

    public function setId($id) {

        $this->id=$id;

    }




    public function setLicence($licence) {

        $this->id=$licence;

    }




    public function setNom($nom) {

        $this->nom=$nom;

    }



    public function setPrenom($prenom) {

        $this->prenom=$prenom;

    }



    public function setCategorieId($categorie_id) {

        $this->categorie_id=$categorie_id;

    }



    public function setContactId($contact_id) {

        $this->contact_id=$contact_id;

    }




}

?>

