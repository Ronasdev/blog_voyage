

<?php  include (ROOT_PATH.'/vue/includes/header.php'); ?>
        <!-- Admin Page Wrapper -->
    <main>
        <div class="a-contenant">

                <!-- Left Sidebar -->
                <?php  include (ROOT_PATH.'/vue/includes/adminSidebar.php'); ?>
                <!-- // Left Sidebar -->

            
            <div class="a-contenu">
                <div class="button-group">
                    <a href="<?=BASE_URL.DS.'index.php?controller=categorie&action=admin_creer' ?>" class="btn btn-outline-success">Ajouter Un Pays</a>
                    <a href="<?=BASE_URL.DS.'index.php?controller=categorie&action=adminindex' ?>" class="btn btn-outline-primary">Gérer Les Pays</a>
                </div>
                <?php if(isset($_SESSION['erreurs'])): foreach($_SESSION['erreurs'] as $erreur) :?>
                <div class="content">
                    <li><span style="color: red;"><?= $erreur ;?></span></li>
                                    <?php endforeach; endif;?>

                    <h2 class=" font-poppins" style="color: var(--color-page);">Liste de Catégories des pays</h2>
                    <table class="table  table-striped table-bordered">
                        <thead >
                            <tr>
                                <th>ID </th>
                                <th>Pays </th>
                                <th>Description </th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($categories as $categorie): ?>
                                <tr class="success">
                                    <td> <?= $categorie->id; ?></td>
                                    <td> <?= $categorie->nom; ?></td>
                                    <td> <?= $categorie->description; ?></td>
                                    <td>
                                        <a href="<?= BASE_URL.DS.'index.php?controller=categorie&action=editer&id='.$categorie->id ?>"> <i class="fas fa-edit text-warning "></i> </a> &nbsp;
                                        <a onclick="return confirm('Êtes vous sûr de vouloir supprimer le pays? Soyez sûr de supprimer d\'abord tous les articles liés à la catégorie de ce pays')" href="<?= BASE_URL.DS.'index.php?controller=categorie&action=supprimer&id='.$categorie->id ?>"> <i class="fas fa-trash text-danger"></i> </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="Page navigation mx-auto">
                        <ul class="pagination ">
                        <?php for($i=1; $i <= $nbrePage; $i++){ ?> 
                                <li class=" page-item <?php echo ( ($i==$page)?  'active':'') ?>" ><a class="page-link" href="<?=BASE_URL.DS.'index.php?controller=categorie&action=adminindex&page='. $i; ?>"><?= $i; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="<?= BASE_URL.DS.'public/jquery3/jquery-3.6.0.min.js' ?>"></script>
    <script src="<?= BASE_URL.DS.'public/bootstrap.4.6.1/js/bootstrap.min.js' ?>"></script>
    <script src="<?= BASE_URL.DS.'public/js/app.js' ?>"></script>
</body>
</html>