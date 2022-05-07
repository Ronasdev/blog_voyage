
   
<?php  include (ROOT_PATH.'/vue/includes/header.php'); ?>

    <main class="form-contenant ">
        <div class="form-contenu">
            <h1 class="font-rubik-italic text-center">Enregistrement</h1>
            <span style="color: red;"><?= isset($_SESSION['erreurs']['user_found'])? $_SESSION['erreurs']['not_found'] : '' ?></span>
            <form action="index.php?controller=utilisateur&action=register" method="post" enctype="multipart/form-data" class="font-poppins">
                <div class="form-group">
                    <label for="nom">Nom: </label>
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="votre nom !!" >
                    <span style="color: red;"><?= isset($_SESSION['erreurs']['nom'])?$_SESSION['erreurs']['nom']:''?></span>
                </div>
                <div class="form-group">
                    <label for="prenom">Prenom: </label>
                    <input type="text" name="prenom" id="prenom" class="form-control" placeholder="votre prenom !!" >
                    <span style="color: red;"><?= isset($_SESSION['erreurs']['prenom'])?$_SESSION['erreurs']['prenom']:''?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="votre email !!" > 
                    <span style="color: red;"><?= isset($_SESSION['erreurs']['email'])?$_SESSION['erreurs']['email']:''?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Votre mot de passe !!" >
                    <span style="color: red;"><?=  isset($_SESSION['erreurs']['password'])?$_SESSION['erreurs']['password']:''?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password confirmation: </label>
                    <input type="password" name="password-confirm" id="password-confirm" class="form-control" placeholder="Votre mot de passe !!" >
                    <span style="color: red;"><?=  isset($_SESSION['erreurs']['password-confirm'])?$_SESSION['erreurs']['password-confirm']:''?></span>
                </div>
                <div class="form-group">
                    <label for="photo">Photo: </label>
                    <input type="file" name="photo" id="photo" class="form-control"  >
                    <span style="color: red;"><?= isset($_SESSION['erreurs']['photo'])?$_SESSION['erreurs']['photo']:''?></span>
                </div>

                <input type="submit" name="submit" id="btn-submit" class="btn btn-outline-dark ml-auto" value="S'enregistrer">
            </form>
        </div>
    </main>

        <footer>

        </footer>
    <script src="<?= BASE_URL.DS.'public/jquery3/jquery-3.6.0.min.js' ?>"></script>
    <script src="<?= BASE_URL.DS.'public/bootstrap.4.6.1/js/bootstrap.min.js' ?>"></script>
    <script src="<?= BASE_URL.DS.'public/js/app.js' ?>"></script>
</body>
</html>