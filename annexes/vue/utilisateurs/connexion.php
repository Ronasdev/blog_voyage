
   
<?php  include (ROOT_PATH.'/vue/includes/header.php'); ?>
    <main class="form-contenant">
        <div class="form-contenu">
            <h1 class="text-center font-rubik-italic">Connexion</h1>
            <span style="color: red;"><?= isset($_SESSION['erreurs']['not_found'])? $_SESSION['erreurs']['not_found'] : '' ?></span>
            <span style="color: red;"><?= isset($_SESSION['erreurs']['not_login'])? $_SESSION['erreurs']['not_login'] : '' ?></span>
            <form action="index.php?controller=utilisateur&action=connect" method="post" class="font-poppins">
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Veuillez entrer votre email !!" > 
                    <span style="color: red;"><?= isset($_SESSION['erreurs']['l_email'])?$_SESSION['erreurs']['l_email']:''?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password"  class="form-control" placeholder="Votre mot de passe !!" > 
                    <span style="color: red;"><?=  isset($_SESSION['erreurs']['l_password'])?$_SESSION['erreurs']['l_password']:''?></span>
                </div>

                <input type="submit" name="submit" id="btn-submit" class="btn btn-outline-dark ml-auto" value="Se connecter">
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