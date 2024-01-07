
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Ajouter un éducateur</h3></div>
                                    <div class="card-body">
                                    <div class="message">
                                        <?php 
                                                if(isset($_SESSION['msg'])):
                                        ?>

                                                <div class="alert alert-success alert-dismissible">
                                                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                                    <?php echo $_SESSION['msg'];
                                                            unset($_SESSION['msg']);
                                                    ?>
                                                </div>

                                        <?php endif ?>
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

                                        <?php  if (count($errors) > 0) : ?>
                                            <div class="error">
                                                    <?php foreach ($errors as $eror) : ?>
                                                    <p><?php echo $eror ?></p>
                                                    <?php endforeach ?>
                                            </div>
                                        <?php  endif ?>        
                                        
                                        <?php 
                                                if(isset($_SESSION['errors'])):
                                        ?>
                                            <?php  if (count($errors) > 0) : ?>
                                                <div class="alert alert-danger alert-dismissible">
                                                <h5><i class="fa-solid fa-circle-exclamation"></i> Alert!</h5>
                                                    <?php foreach ($errors as $eror) : ?>
                                                        <p><?php echo $eror ?></p>
                                                    <?php endforeach ?>
                                                </div>
                                            <?php  endif ?>  
                                        <?php endif ?>                                         

                                    </div> 
                                        <form  method="POST" action="./AddEducateurController.php">
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Saisissez une licence" name="licence" required />
                                                        <label for="inputFirstName">licence</label>
                                                    </div>
                                                </div>
                                            </div>                                        
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Saisissez nom" name="nom" required />
                                                        <label for="inputFirstName">Nom</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Saisissez prénom" name="prenom" required />
                                                        <label for="inputLastName">Prénom</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-control form-control-sm select2" name="categorie_id" style="width: 100%;">
                                                            <option class="text-center" selected disabled>** Toutes les catégories **</option>
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
                                                            <option class="text-center" selected disabled>** Touts les contacts **</option>
                                                            <?php foreach ($contacts as $contact): ?>
                                                                <option value="<?php echo $contact->getId(); ?>" ><?php echo $contact->getNom(); ?> <?php echo $contact->getPrenom(); ?></option>
                                                            <?php endforeach; ?>
                                                        </select>                                                               
                                                        <label for="inputLastName">Contacts</label>
                                                    </div>
                                                </div>                                            
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-8">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="email" placeholder="Saisissez l'e-amil" name="email"  value="<?php echo $email; ?>" required />
                                                        <label for="inputFirstName">E-mail</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="row mb-9">
                                                        <div class="col-md-2">
                                                        </div>                                                     
                                                        <div class="col-md-2">
                                                            <input class="form-check-input justify-content-center" id="role" type="radio" name="role"  value="user" />
                                                        </div>                                                       
                                                        <div class="col-md-6">
                                                            <label for="role">User</label>
                                                        </div>
                                                    </div>                                                
                                                </div>                                                
                                                <div class="col-md-2">
                                                    <div class="row mb-9">
                                                        <div class="col-md-2">
                                                        </div>                                                     
                                                        <div class="col-md-2">
                                                            <input class="form-check-input justify-content-center" id="role" type="radio" name="role"  value="admin" />
                                                        </div>                                                       
                                                        <div class="col-md-6">
                                                            <label for="role">Admin</label>
                                                        </div>
                                                    </div>                                                
                                                </div>                                                      
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password_1" type="password" name="password_1" />
                                                        <label for="password_1">Mot de passe</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="password_2" type="password" name="password_2"  />
                                                        <label for="password_2">Confirmation</label>
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
                                                            <button type="submit" name="action" class="btn btn-sm btn-success btn-block">
                                                                Enregistrer
                                                                <i class="fa-solid fa-floppy-disk"></i>
                                                            </button>                                                        
                                                        </div>
                                                    </div>
                                                </div>                                                 
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php 
                    include DOC_ROOT_PATH . "views/layouts/footer.php";                
                ?>