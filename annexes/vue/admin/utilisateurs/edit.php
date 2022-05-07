
<?php  include (ROOT_PATH.'/vue/includes/header.php'); ?>

    <main>
        <div class="a-contenant">
             <!-- Left Sidebar -->
             <?php  include (ROOT_PATH.'/vue/includes/adminSidebar.php'); ?>
            <!-- // Left Sidebar -->
            <div class="a-contenu">
                <div class="mb-2  d-flex justify-content-between w-50">
                        <a href="<?=BASE_URL.DS.'index.php?controller=utilisateur&action=editer&id='.$user->id ?>" class="btn btn-outline-success">Editer l'utilisateur</a>
                        <a href="<?=BASE_URL.DS.'index.php?controller=utilisateur&action=adminindex' ?>" class="btn btn-outline-primary">Gérer les utilisateurs</a>
                </div>
                <form action="index.php?controller=utilisateur&action=mettre_a_jour" method="post" enctype ='multipart/form-data'>
                    <div>
                        <h2 class="font-rubik-italic text-center">Editer l'utilisateur</h2>

                        <!-- <?php include(BASE_URL.'/app/helpers/formErrors.php'); ?> -->
                        <span style="color: red;"><?= isset($_SESSION['erreur']['user_found'])? $_SESSION['erreur']['not_found'] : '' ?></span>

                        <input type="hidden" name="id" value ="<?= $user->id; ?>">
                        <div class="form-group">
                            <label for="nom">Nom: </label>
                            <input type="text" name="nom" id="nom" class="form-control" value ="<?= $user->nom; ?>" >
                            <span style="color: red;"><?= isset($_SESSION['erreurs']['nom'])?$_SESSION['erreurs']['nom']:''?></span>
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prenom: </label>
                            <input type="text" name="prenom" id="prenom" class="form-control" value ="<?= $user->prenom; ?>" >
                            <span style="color: red;"><?= isset($_SESSION['erreurs']['prenom'])?$_SESSION['erreurs']['prenom']:''?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input type="email" name="email" id="email" class="form-control" value ="<?= $user->email; ?>" > 
                            <span style="color: red;"><?= isset($_SESSION['erreurs']['email'])?$_SESSION['erreurs']['email']:''?></span>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo: </label>
                            <input type="file" name="photo" id="photo" class="form-control"  >
                            <span style="color: red;"><?= isset($_SESSION['erreurs']['photo'])?$_SESSION['erreurs']['photo']:''?></span>
                        </div>
                        <div class="form-group">
                            <select name="admin" id="admin" class="form-control">
                                <option value="1" <?= ($user->admin==1 ?"selected":"") ?>>Administrateur</option>
                                <option value="0"  <?= ($user->admin==0?"selected":"") ?>>Visiteur</option>
                            </select>
                        </div>

                        <input type="submit" name="submit" id="btn-submit" class="btn btn-outline-dark ml-auto" value="S'enregistrer">
                        <?php unset($_SESSION['erreurs']); ?>
                    <div>
                </form>
            </div>
        </div>
    </main>
    
    <script src="<?= BASE_URL.DS.'public/jquery3/jquery-3.6.0.min.js' ?>"></script>
    <script src="<?= BASE_URL.DS.'public/bootstrap.4.6.1/js/bootstrap.min.js' ?>"></script>
    <script src="<?= BASE_URL.DS.'public/js/app.js' ?>"></script>
</body>
</html>

