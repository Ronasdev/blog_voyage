
       <!--admin header here -->
       <?php  include (ROOT_PATH.'/vue/includes/header.php'); ?>
      

    <main>
        <!-- Admin Content -->
        <div class="a-contenant">
            
             <!-- Left Sidebar -->
             <?php  include (ROOT_PATH.'/vue/includes/adminSidebar.php'); ?>
            <!-- // Left Sidebar -->
            <div class="a-contenu">
                <div class="button-group">
                    <a href="<?=BASE_URL.DS.'index.php?controller=article&action=admin_creer' ?>" class="btn btn-outline-success">Ajouter un article</a>
                    <a href="<?=BASE_URL.DS.'index.php?controller=article&action=adminindex' ?>" class="btn btn-outline-primary">Gérer les articles</a>
                </div>


                <div class="content">

                    <h2 class="font-poppins text-center" style="color: var(--color-page);">Gérer les articles</h2>
                    <!-- <?php include(ROOT_PATH.'/view/includes/messages.php'); ?> -->

                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                        <?php foreach($articles as $article): ?>
                            <tr>
                                <td><?= $article->id ?></td>
                                <td><?= $article->titre ?></td>
                                <td><?=  $article->nom_auteur ?></td>
                                <td><a href="<?= BASE_URL.DS.'index.php?controller=article&action=editer&id='.$article->id ?>" class="edit"> <i class="fas fa-edit text-warning "></i> </a></td>
                                <td><a href="<?= BASE_URL.DS.'index.php?controller=article&action=supprimer&id='.$article->id ?>" class="delete"> <i class="fas fa-trash text-danger "></i> </a></td>
                                <?php if($article->en_ligne): ?>
                                    <td><a href="<?= BASE_URL.DS.'index.php?controller=article&action=publier&id='.$article->id ?>&en_ligne=0" class="text-info">Dépublier</a></td>
                                <?php else: ?>
                                    <td><a href="<?= BASE_URL.DS.'index.php?controller=article&action=publier&id='.$article->id ?>&en_ligne=1" class="text-success">Publier</a></td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>

                </div>
                <div class="Page navigation mx-auto">
                    <ul class="pagination ">
                    <?php for($i=1; $i <= $nbrePage; $i++){ ?> 
                            <li class=" page-item <?php echo ( ($i==$page)?  'active':'') ?>" ><a class="page-link" href="<?=BASE_URL.DS.'index.php?controller=article&action=adminindex&page='. $i; ?>"><?= $i; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- // Admin Content -->
        
    </main>

    <script src="<?= BASE_URL.DS.'public/jquery3/jquery-3.6.0.min.js' ?>"></script>
    <script src="<?= BASE_URL.DS.'public/bootstrap.4.6.1/js/bootstrap.min.js' ?>"></script>
    <script src="<?= BASE_URL.DS.'public/js/app.js' ?>"></script>

    </body>

</html>