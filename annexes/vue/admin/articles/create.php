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
                    <a href="<?=BASE_URL.DS.'index.php?controller=article&action=admin_creer' ?>" class="btn btn-outline-success">Ajouter un article</a>
                    <a href="<?=BASE_URL.DS.'index.php?controller=article&action=adminindex' ?>" class="btn btn-outline-primary">Gérer les articles</a>
                </div>
                <form action="index.php?controller=article&action=admin_inserer" method="post" enctype ='multipart/form-data'>
                
                    <div>
                        <h2 class="font-rubik-italic text-center">Ajouter un article</h2>
                        <!-- <?php  include (BASE_URL.'/app/helpers/formErrors.php'); ?> -->
                        <?php if(isset($_SESSION['erreurs'])): foreach($_SESSION['erreurs'] as $erreur) :?>
                            <li><span style="color: red;"><?= $erreur ;?></span></li>
                        <?php endforeach; endif;?>
                        
                        <?php unset($_SESSION['erreurs']); 
                        unset($_SESSION['articles']); ?>
                     

                        <input type="hidden" name="id_aut" value="<?= ($_SESSION['user']['id'])?? '' ?>">
                        <div  class="form-group">
                            <label>Titre</label>
                            <input type="text" name="titre" class="form-control" value ="<?= ($_SESSION['articles']['titre'])?? '' ?>" >
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea name="contenu" rows="10" class="form-control" id="contenu"><?= ($_SESSION['articles']['contenu']) ?? '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" >
                        </div>
                        <div class="form-group">
                            <label>Prix</label>
                            <input type="number" class="form-control" name="prix" value ="<?= ($_SESSION['articles']['prix'])?? '' ?>" >
                        </div>
                        <div class="form-group">
                            <label>Categorie de Pays</label>
                            <select name="id_cat" class="form-control" >
                                <option></option>
                                <?php foreach($categories as $key=>$categorie):?>
                                <?php if(!empty(($_SESSION['articles']['id_cat'])) && $_SESSION['articles']['id_cat'] == $categorie->id): ?>

                                        <option selected value="<?= $categorie->id; ?>"> <?=  $categorie->nom;?></option>
                                    <?php else: ?>
                                        <option  value="<?= $categorie->id; ?>"> <?=  $categorie->nom;?></option>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <?php if(empty($_SESSION['articles']['published'])): ?>
                                <label for=""> <input type="checkbox" class="form-control" name="en_ligne"> Publier </label>
                            <?php else: ?>
                                <label for=""> <input type="checkbox" class="form-control" checked name="en_ligne"> Publier </label>
                            <?php endif ;?>

                        </div>
                        <div class="form-group text-center">
                            <button type="submit"class="btn btn-outline-dark " >Ajouter l'article</button>
                        </div>
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