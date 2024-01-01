
<?php 
        include DOC_ROOT_PATH . "views/layouts/header.php";
            ?>    
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Accueil</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Licenciés</li>
                        </ol>
                        <div class="row p-3">
                            <div class="col-xl-3 col-md-6">
                                <a class="btn btn-primary" href="AddLicencieController.php">Nouveau <i class="fa-solid fa-circle-plus"></i></a>
                            </div>
                        </div>
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

                        </div>                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Liste des licencies
                            </div>
                            <div class="card-body">
                                <?php if (count($licencies) > 0): ?>
                                <?php $compteur=1; ?>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Licence</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Licence</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($licencies as $licencie): ?>
                                            <tr>
                                                <td><?php echo $compteur++; ?></td>
                                                <td><?php echo $licencie->getLicence(); ?></td>
                                                <td><?php echo $licencie->getNom(); ?></td>
                                                <td><?php echo $licencie->getPrenom(); ?></td>
                                                <td>
                                                    <a  class="btn btn-success btn-sm" href="ShowLicencieController.php?id=<?php echo $licencie->getId(); ?>"><i class="fa-solid fa-circle-info text-white"></i></a>
                                                    <a  class="btn btn-warning btn-sm" href="EditLicencieController.php?id=<?php echo $licencie->getId(); ?>"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                    <a  class="btn btn-danger btn-sm" href="DeleteLicencieController.php?id=<?php echo $licencie->getId(); ?>"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php else: ?>
                                    <p>Aucun licencie trouvé.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </main>                 
                <?php 
                    include DOC_ROOT_PATH . "views/layouts/footer.php";                
                ?>

