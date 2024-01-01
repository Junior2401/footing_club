
<?php 
        include DOC_ROOT_PATH . "views/layouts/header.php";
            ?>    
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Accueil</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                        <div class="row p-3">
                            <div class="col-xl-3 col-md-6">
                                <a class="btn btn-primary" href="AddCategorieController.php">Nouveau <i class="fa-solid fa-circle-plus"></i></a>
                            </div>
                        </div>
                        <div class="message">
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
                        </div> 
                       </div>                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Liste des categories
                            </div>
                            <div class="card-body">
                                <?php if (count($categories) > 0): ?>
                                <?php $compteur=1; ?>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Nom</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Nom</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($categories as $categorie): ?>
                                            <tr>
                                                <td><?php echo $compteur++; ?></td>
                                                <td><?php echo $categorie->getCode(); ?></td>
                                                <td><?php echo $categorie->getNom(); ?></td>
                                                <td>
                                                    <a  class="btn btn-success btn-sm" href="ShowCategorieController.php?id=<?php echo $categorie->getId(); ?>"><i class="fa-solid fa-circle-info text-white"></i></a>
                                                    <a  class="btn btn-warning btn-sm" href="EditCategorieController.php?id=<?php echo $categorie->getId(); ?>"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                    <a  class="btn btn-danger btn-sm" href="DeleteCategorieController.php?id=<?php echo $categorie->getId(); ?>"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php else: ?>
                                    <p>Aucun categorie trouvé.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </main> 
                <?php 
                    include DOC_ROOT_PATH . "views/layouts/footer.php";                
                ?>

