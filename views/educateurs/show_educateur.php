<?php include DOC_ROOT_PATH . "views/layouts/header.php"; ?> 

<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Accueil</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Licencies</li>
                        </ol>                         
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Détail du licencie <b> <?php echo $licencie->getNom(); ?> <?php echo $licencie->getPrenom(); ?></b>
                            </div>
                            <div class="card-body">
                                <?php if ($licencie): ?>
                                    <p>
                                        <div class=" row">
                                            <div class="col-md-3 p-3">
                                                <strong>Licence :</strong>                                            
                                            </div>
                                            <div class="col-md-9 p-3">
                                                <?php echo $licencie->getLicence(); ?>
                                            </div>                                               
                                        </div>                                    
                                    </p>
                                    <p>
                                        <div class=" row">
                                            <div class="col-md-3 p-3">
                                                <strong>Catégorie :</strong>                                            
                                            </div>
                                            <div class="col-md-9 p-3">
                                            <?php echo $categorie->getNom(); ?> ( <?php echo $categorie->getCode(); ?>)
                                            </div>                                               
                                        </div>                                    
                                    </p>
                                    <p>
                                        <div class=" row">
                                            <div class="col-md-3 p-3">
                                                <strong>Contact :</strong>                                     
                                            </div>
                                            <div class="col-md-9 p-3">
                                                <?php echo $contact->getNom(); ?>  <?php echo $contact->getPrenom(); ?>
                                            </div>                                               
                                        </div>                                    
                                    </p>
                                    <p>
                                        <div class=" row">
                                            <div class="col-md-3 p-3">
                                                <strong>E-mail :</strong>                                            
                                            </div>
                                            <div class="col-md-8 p-3">
                                                <?php echo $educateur->getEmail(); ?>
                                            </div>                                               
                                        </div>                                    
                                    </p>
                                    <p>
                                        <div class=" row">
                                            <div class="col-md-3 p-3">
                                                <strong>Rôle :</strong>                                     
                                            </div>
                                            <div class="col-md-9 p-3">
                                                <?php if($educateur->getRole()){ echo "Administrateur" ; }else{ echo "Utilisateur" ; }  ?>
                                            </div>                                               
                                        </div>                                    
                                    </p>                                   

                                <?php else: ?>
                                    <p>Le licencie n'a pas été trouvé.</p>
                                <?php endif; ?>
                            </div>
                            <div class="card-footer text-center py-3">
                                            <div class=" row">
                                                <div class="col-md-2 p-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <div class="d-grid">
                                                            <a href="IndexEducateurController.php" class="btn btn-sm btn-secondary btn-block">
                                                                <i class="fa-solid fa-circle-left"></i>
                                                                Retour
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-9 p-3">
                                                </div>                                               
                                            </div>
                                    </div>                            
 
                        </div>
                    </div>
                </main> 

<?php include DOC_ROOT_PATH . "views/layouts/footer.php"; ?>