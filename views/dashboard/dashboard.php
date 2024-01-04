            <?php   
            /*if(!isset($_SESSION['email'])){
                header('Location:ConnexionController.php');
            }*/
                include DOC_ROOT_PATH . "views/layouts/header.php";
                //var_dump($_SESSION);
                //include_once('layouts/header.php'); 
            ?>    
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
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

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Licenciés <b><span class="info-box-number float-right"><?php echo $licencies ?></span></b></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Educateurs <b><span class="info-box-number float-right"><?php echo $educateurs ?></span></b></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Contacts <b><span class="info-box-number float-right"><?php echo $contacts ?></span></b></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Catégories <b><span class="info-box-number float-right"><?php echo $categories ?></span></b></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main> 
                <?php 
                    include DOC_ROOT_PATH . "views/layouts/footer.php";                
                ?>

