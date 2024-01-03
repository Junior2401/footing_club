<?php

class EducateurModel {

    private $id;

    private $email;

    private $password;

    private $role;

    private $licencie_id;

    private $licence;

    private $nom;

    private $prenom;



    public function __construct($id, $email, $password, $role, $licencie_id, $licence, $nom, $prenom) {

        $this->id = $id;

        $this->email = $email;

        $this->password = $password;

        $this->role = $role;

        $this->licencie_id = $licencie_id;

        $this->licence = $licence;

        $this->nom = $nom;

        $this->prenom = $prenom;

    }



    public function getId() {

        return $this->id;

    }





    public function getEmail() {

        return $this->email;

    }



    public function getPassword() {

        return $this->password;

    }



    public function getRole() {

        return $this->role;

    }



    

    public function getLicencieId() {

        return $this->licencie_id;

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

    

    

    public function setId($id) {

        $this->id=$id;

    }



    public function setEmail($email) {

        $this->email=$email;

    }



    public function setPassword($password) {

        $this->password=$password;

    }



    public function setRole($role) {

        $this->role=$role;

    }



    public function setLicenceId($licencie_id) {

        $this->licencie_id=$licencie_id;

    }


    public function setLicence($licence) {

        $this->licence=$licence;

    }



    public function setNom($nom) {

        $this->nom=$nom;

    }



    public function setPrenom($prenom) {

        $this->prenom=$prenom;

    }



    // Vous pouvez ajouter des mÃ©thodes supplÃ©mentaires ici pour manipuler les donnÃ©es du contact

}

?>

