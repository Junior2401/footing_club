
            <?php 
                if(!isset($_SESSION['email'])){
                    header("Location:../HomeController.php");
                }    
                include DOC_ROOT_PATH . "views/layouts/header.php";
            ?>    
                <main>
                    <div class="container">
                    <h1 class="mt-4">Accueil</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Educateurs</li>
                        </ol>
                        
                                <div class="row justify-content-center">
                                    <div class="col-lg-9">
                                        <div class="card shadow-lg border-0 rounded-lg">
                                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Modifier Educateur</h3></div>
                                            <div class="card-body">
                                            <div class="message">
                                                <?php 
                                                        if(isset($_SESSION['error'])):
                                                ?>

                                                        <div class="alert alert-danger alert-dismissible">
                                                        <h5><i class="fa-solid fa-circle-exclamation"></i> Alert!</h5>
                                                            <?php echo $_SESSION['error'];
                                                                    unset($_SESSION['error']);
                                                            ?>
                                                        </div>

                                                <?php endif ?>

                                            </div> 
                                        <?php if ($licencie): ?>
                                        <form  method="POST" action="./EditEducateurController.php?id=<?php echo $licencie->getId(); ?>">
                                                <div class="row mb-3">
                                                    <div class="col-md-4">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" id="inputFirstName" type="text" name="licence" value="<?php echo $licencie->getLicence(); ?>" required />
                                                            <label for="inputFirstName">licence</label>
                                                        </div>
                                                    </div>
                                                </div>             
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" id="inputFirstName" type="text" name="nom" value="<?php echo $licencie->getNom(); ?>" required />
                                                            <label for="inputFirstName">Nom</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input class="form-control" id="inputLastName" type="text" name="prenom"  value="<?php echo $licencie->getPrenom(); ?>" required />
                                                            <label for="inputLastName">Prénom</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <select class="form-control form-control-sm select2" name="categorie_id" style="width: 100%;">
                                                                <option class="bg-info" value="<?php echo $categorieSelect->getId(); ?>" selected><?php echo $categorieSelect->getCode(); ?> <?php echo $categorieSelect->getNom(); ?></option>
                                                                    <?php foreach ($categories as $categorie): ?>
                                                                        <option value="<?php echo $categorie->getId(); ?>" ><?php echo $categorie->getCode(); ?> <?php echo $categorie->getNom(); ?></option>
                                                                    <?php endforeach; ?>
                                                            </select>                                                        
                                                            <label for="inputEmail">Catégories</label>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <select class="form-control form-control-sm select2" name="contact_id" style="width: 100%;">
                                                                <option class="bg-info" value="<?php echo $contactSelect->getId(); ?>" selected><?php echo $contactSelect->getNom(); ?> <?php echo $contactSelect->getPrenom(); ?></option>
                                                                <?php foreach ($contacts as $contact): ?>
                                                                    <option value="<?php echo $contact->getId(); ?>" ><?php echo $contact->getNom(); ?> <?php echo $contact->getPrenom(); ?></option>
                                                                <?php endforeach; ?>
                                                            </select>                                                               
                                                            <label for="inputLastName">Contacts</label>
                                                        </div>
                                                    </div>                                            
                                                </div>                                       
                                            </div>
                                    <div class="card-footer text-center py-3">
                                            <div class=" row">
                                                <div class="col-md-4 p-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <div class="d-grid">
                                                            <a href="IndexEducateurController.php" class="btn btn-sm btn-secondary btn-block">
                                                                <i class="fa-solid fa-circle-left"></i>
                                                                Retour
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 p-3">
                                                </div>   
                                                <div class="col-md-4 p-3">
                                                    <div class="form-floating">
                                                        <div class="d-grid">
                                                            <button type="submit" name="action" class="btn btn-sm btn-warning btn-block">
                                                                Modifier
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </button>                                                        
                                                        </div>
                                                    </div>
                                                </div>                                                 
                                            </div>
                                    </div>
                                    </form>
                                    <?php else: ?>
                                        <p>La licencié n'a pas été trouvé.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php 
                    include DOC_ROOT_PATH . "views/layouts/footer.php";                
                ?>
