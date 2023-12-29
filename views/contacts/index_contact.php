
<?php 
        include DOC_ROOT_PATH . "views/layouts/header.php";
            ?>    
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Accueil</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Contacts</li>
                        </ol>
                        <div class="row p-3">
                            <div class="col-xl-3 col-md-6">
                                <a class="btn btn-primary" href="AddContactController.php">Nouveau <i class="fa-solid fa-circle-plus"></i></a>
                            </div>
                        </div>
                        <div class="message">
                            <?php 
                                    if(isset($_SESSION['msg'])){

                                    echo '<div class="reuissir btn-success">';
                                                echo $_SESSION['msg'];
                                                unset($_SESSION['msg']);
                                    echo '</div>';
                                            }
                                    if(isset($_SESSION['echec'])){

                                    echo '<div class="echec btn-danger">';
                                                echo $_SESSION['echec'];
                                                unset($_SESSION['echec']);
                                    echo '</div>';
                                    }
                            ?>
                       </div>                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Liste des contacts
                            </div>
                            <div class="card-body">
                                <?php if (count($contacts) > 0): ?>
                                <?php $compteur=1; ?>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($contacts as $contact): ?>
                                            <tr>
                                                <td><?php echo $compteur++; ?></td>
                                                <td><?php echo $contact->getNom(); ?></td>
                                                <td><?php echo $contact->getPrenom(); ?></td>
                                                <td><?php echo $contact->getEmail(); ?></td>
                                                <td><?php echo $contact->getTelephone(); ?></td>
                                                <td>
                                                    <a  class="btn btn-success btn-sm" href="ShowContactController.php?id=<?php echo $contact->getId(); ?>"><i class="fa-solid fa-circle-info text-white"></i></a>
                                                    <a  class="btn btn-warning btn-sm" href="EditContactController.php?id=<?php echo $contact->getId(); ?>"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                    <a  class="btn btn-danger btn-sm" href="DeleteContactController.php?id=<?php echo $contact->getId(); ?>"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php else: ?>
                                    <p>Aucun contact trouvé.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </main> 
                <?php 
                    include DOC_ROOT_PATH . "views/layouts/footer.php";                
                ?>

