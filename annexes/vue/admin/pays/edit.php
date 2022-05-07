
        <!--admin header here -->
        <?php  include (ROOT_PATH.'/vue/includes/header.php'); ?>
    <main>
        <div class="a-contenant">
             <!-- Left Sidebar -->
             <?php  include (ROOT_PATH.'/vue/includes/adminSidebar.php'); ?>
            <!-- // Left Sidebar -->
            <div class="a-contenu">

                <div class="mb-2  d-flex justify-content-between w-50">
                    <a href="<?=BASE_URL.DS.'index.php?controller=categorie&action=editer&id='.$categorie->id ?>" class="btn btn-outline-success">Editer le pays</a>
                    <a href="<?=BASE_URL.DS.'index.php?controller=categorie&action=adminindex' ?>" class="btn btn-outline-primary">Gérer la categorie des pays</a>
                </div>
                <form action="index.php?controller=categorie&action=mettre_a_jour" method="post">
                    <div>
                        <h2 class="font-rubik-italic text-center">Editer le pays</h2>

                        <input type="hidden" name="id" value ="<?= $categorie->id; ?>">
                        <div class="form-group">
                            <label for="nom">Nom: </label>
                            <input type="text" name="nom" id="nom" class="form-control" value ="<?= $categorie->nom; ?>" >
                            <span style="color: red;"><?= isset($_SESSION['erreurs']['nom'])?$_SESSION['erreurs']['nom']:''?></span>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" rows="10" class="form-control" id="description"><?= $categorie->description ?></textarea>
                            <span style="color: red;"><?= isset($_SESSION['erreurs']['description'])?$_SESSION['erreurs']['description']:''?></span>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-outline-dark">Mettre à jours</button>
                        </div>
                    </div>
                    <?php unset($_SESSION['erreurs']); ?>
                </form>
            </div>
        </div>
    </main>



    <script src="<?= BASE_URL.DS.'public/jquery3/jquery-3.6.0.min.js' ?>"></script>
    <script src="<?= BASE_URL.DS.'public/bootstrap.4.6.1/js/bootstrap.min.js' ?>"></script>
    <script src="<?= BASE_URL.DS.'public/js/app.js' ?>"></script>

    </body>

</html>