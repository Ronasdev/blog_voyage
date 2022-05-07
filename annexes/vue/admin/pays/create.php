
        <!--admin header here -->
        <?php  include (ROOT_PATH.'/vue/includes/header.php'); ?>
        <!-- Admin Page Wrapper --> 
    <main>


        <!-- Admin Content -->
        <div class="a-contenant">
             <!-- Left Sidebar -->
            <?php  include (ROOT_PATH.'/vue/includes/adminSidebar.php'); ?>
            <!-- // Left Sidebar -->
            <div class="a-contenu">
                <div class="mb-2  d-flex justify-content-between w-50  ">
                    <a href="<?=BASE_URL.DS.'index.php?controller=categorie&action=admin_creer' ?>" class="btn btn-outline-success">Ajouter un Nouveau pays</a>
                    <a href="<?=BASE_URL.DS.'index.php?controller=categorie&action=adminindex' ?>" class="btn btn-outline-primary">Gérer la catégorie des Pays</a>
                </div>
                <form action="index.php?controller=categorie&action=admin_inserer" method="post" enctype ='multipart/form-data'>
                
                    <div>
                        <h2 class="font-rubik-italic text-center">Ajouter un nouveau Pays</h2>

                        <?php if(isset($_SESSION['erreurs'])): foreach($_SESSION['erreurs'] as $erreur) :?>
                            <li><span style="color: red;"><?= $erreur ;?></span></li>
                        <?php endforeach; endif;?>

                        <div  class="form-group">
                            <label>Pays</label>
                            <input type="text" name="nom" class="form-control" value ="<?= ($_SESSION['pays']['nom'])?? '' ?>" >
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="10" id="contenu"><?= ($_SESSION['pays']['description']) ?? '' ?></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit"class="btn btn-outline-dark " >Ajouter le Pays</button>
                        </div>
                        <?php unset($_SESSION['erreurs']); 
                        unset($_SESSION['pays']); ?>
                    </div>
                    
                </form>

            </div>
        </div>
        <!-- // Admin Content -->
    </main>


    <script src="<?= BASE_URL.DS.'public/jquery3/jquery-3.6.0.min.js' ?>"></script>
    <script src="<?= BASE_URL.DS.'public/bootstrap.4.6.1/js/bootstrap.min.js' ?>"></script>
    <script src="<?= BASE_URL.DS.'public/js/app.js' ?>"></script>

    </body>

</html>