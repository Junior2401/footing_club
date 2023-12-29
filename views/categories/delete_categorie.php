<?php include DOC_ROOT_PATH . "views/layouts/header.php"; ?> 

<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Accueil</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Catégories</li>
                        </ol>                         
                        <div class="card mb-4">
                            <div class="card-header bg-warning">
                                <i class="fas fa-table me-1"></i>
                                Suppression du catégorie <?php echo $categorie->getCode(); ?> <?php echo $categorie->getNom(); ?>
                            </div>
                            <div class="card-body">
                                        <form  method="POST" action="./DeleteCategorieController.php?id=<?php echo $categorie->getId(); ?>">
                                            <div class="row mb-3">
                                                <?php if ($categorie): ?>
                                                    <p>Voulez-vous vraiment supprimer la catégorie "<?php echo $categorie->getCode(); ?> <?php echo $categorie->getNom(); ?>" ?</p>
                                                <?php else: ?>
                                                    <p>Le categorie n'a pas été trouvé.</p>
                                                <?php endif; ?>
                                            </div>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                    <div class=" row">
                                                <div class="col-md-2 p-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <div class="d-grid">
                                                            <a href="IndexCategorieController.php" class="btn btn-sm btn-secondary btn-block">
                                                                <i class="fa-solid fa-circle-left"></i>
                                                                Retour
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 p-3">
                                                </div>   
                                                <div class="col-md-2 p-3">
                                                    <div class="form-floating">
                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-sm btn-danger btn-block">
                                                                Supprimer
                                                                <i class="fa-solid fa-trash-can text-white"></i>
                                                            </button>                                                        
                                                        </div>
                                                    </div>
                                                </div>                                                 
                                            </div>
                                    </div>
                                    </form>
                        </div>
                    </div>
                </main> 

<?php include DOC_ROOT_PATH . "views/layouts/footer.php"; ?>