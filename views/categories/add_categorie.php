
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
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                        
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div class="card shadow-lg border-0 rounded-lg">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Ajouter categorie</h3></div>
                                    <div class="card-body">
                                        <?php 
                                                if(isset($_SESSION['error'])){
                                                    echo '<div class="reuissir">';
                                                                echo $_SESSION['error'];
                                                                unset($_SESSION['error']);
                                                    echo '</div>';
                                                }
                                                if(isset($_SESSION['echec'])){
                                                    echo '<div class="echec  btn-danger">';
                                                                echo $_SESSION['echec'];
                                                                unset($_SESSION['echec']);
                                                    echo '</div>';
                                                }
                                        ?>
                                        <form  method="POST" action="./AddCategorieController.php">
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Saisissez code" name="code" required />
                                                        <label for="inputFirstName">Code</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Saisissez nom" name="nom" required />
                                                        <label for="inputLastName">Nom</label>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                    <div class=" row">
                                                <div class="col-md-4 p-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <div class="d-grid">
                                                            <a href="IndexCategorieController.php" class="btn btn-sm btn-secondary btn-block">
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