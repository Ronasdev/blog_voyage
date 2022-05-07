
        <!--admin header here -->
        <?php  include (ROOT_PATH.'/vue/includes/header.php'); ?>
    <main>
        <div class="a-contenant">
             <!-- Left Sidebar -->
             <?php  include (ROOT_PATH.'/vue/includes/adminSidebar.php'); ?>
            <!-- // Left Sidebar -->
            <div class="a-contenu">

                <div class="mb-2  d-flex justify-content-between w-50">
                    <a href="<?=BASE_URL.DS.'index.php?controller=article&action=editer&id='.$article->id ?>" class="btn btn-outline-success">Editer l'aticle</a>
                    <a href="<?=BASE_URL.DS.'index.php?controller=article&action=adminindex' ?>" class="btn btn-outline-primary">Gérer les articles</a>
                </div>
                <form action="index.php?controller=article&action=mettre_a_jour" method="post" enctype ='multipart/form-data'>
                    <div>
                        <h2 class="font-rubik-italic text-center">Editer l'article</h2>

                        <!-- <?php include(BASE_URL.'/app/helpers/formErrors.php'); ?> -->
                        <?php if(isset($_SESSION['erreurs'])): foreach($_SESSION['erreurs'] as $erreur) :?>
                            <li><span style="color: red;"><?= $erreur ;?></span></li>
                        <?php endforeach; endif;?>
                        <?php unset($_SESSION['erreurs']);  
                        unset($_SESSION['articles']); ?>

                        <input type="hidden" name="id" value ="<?= $article->id; ?>">
                        <input type="hidden" name="id_aut" value ="<?= $article->id_aut; ?>">
                        <div class="form-group">
                            <label>Titre</label>
                            <input type="text" name="titre" class="form-control" value ="<?= $article->titre ?>" class="text-input">
                        </div>
                        <div class="form-group">
                            <label>Contenu</label>
                            <textarea name="contenu"  rows="10" class="form-control" id="contenu"><?= $article->contenu ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" class="text-input">
                        </div>
                        <div class="form-group">
                            <label>Prix</label>
                            <input type="number" name="prix" class="form-control" value ="<?=  $article->prix ?>" class="text-input">
                        </div>
                        <div class="form-group">
                            <label>Pays</label>
                            <select name="id_cat" class="form-control" class="text-input">
                                 <option > </option>
                                <?php foreach($categories as $categorie):?>
                                  <?php if(!empty($article->id_cat) && $article->id_cat == $categorie->id): ?>

                                        <option selected value="<?= $categorie->id; ?>"> <?=  $categorie->nom;?></option>
                                    <?php else: ?>
                                        <option  value="<?= $categorie->id; ?>"> <?=  $categorie->nom;?></option>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <?php if(empty($article->en_ligne) && $article->en_ligne == 0): ?>
                                <label for=""> <input type="checkbox" class="form-control" name="en_ligne"> Publier </label>
                            <?php else: ?>
                                <label for=""> <input type="checkbox" class="form-control" checked name="en_ligne"> Publier </label>
                             <?php endif ;?>

                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-outline-dark">Mettre à jours</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>


    <script src="<?= BASE_URL.DS.'public/jquery3/jquery-3.6.0.min.js' ?>"></script>
    <script src="<?= BASE_URL.DS.'public/bootstrap.4.6.1/js/bootstrap.min.js' ?>"></script>
    <script src="<?= BASE_URL.DS.'public/js/app.js' ?>"></script>

    </body>

</html>