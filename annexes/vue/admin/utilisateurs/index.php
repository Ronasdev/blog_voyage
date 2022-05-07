

   <!--admin header here -->
   <?php  include (ROOT_PATH.'/vue/includes/header.php'); ?>
        <!-- Admin Page Wrapper -->
    <main>
        <div class="a-contenant">

        <!-- Left Sidebar -->
        <?php  include (ROOT_PATH.'/vue/includes/adminSidebar.php'); ?>
        <!-- // Left Sidebar -->

        <div class="a-contenu">
            <div class="content">
            <h2 class=" font-poppins" style="color: var(--color-page);">Liste des utilisateurs</h2>
            <table class="table  table-striped table-bordered">
                <thead >
                    <tr>
                        <th>ID </th>
                        <th>Photo </th>
                        <th>Nom </th>
                        <th>Prenom </th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td> <?= $user->id; ?></td>
                            <td><img class="profil" src="<?=BASE_URL.'/public/images/users/'.$user->photo?>" alt="profil"></td>
                            <td> <?= $user->nom; ?></td>
                            <td> <?= $user->prenom; ?></td>
                            <td> <?= $user->email; ?></td>
                            <?php if($user->admin): ?>
                            <td>
                                <a href="<?= BASE_URL.DS.'index.php?controller=utilisateur&action=changerRole&id='.$user->id ?>&admin=0"> Admin <button class="btn btn-outline-info">dévenir visiteur</button> </a></td>
                                <?php else: ?>
                                    <td><a href="<?= BASE_URL.DS.'index.php?controller=utilisateur&action=changerRole&id='.$user->id ?>&admin=1">Visiteur <button class="btn btn-outline-secondary">dévenir admin</button></a></td>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= BASE_URL.DS.'index.php?controller=utilisateur&action=editer&id='.$user->id ?>"> <i class="fas fa-edit text-warning "></i> </a> &nbsp;
                                <a onclick="return confirm('Êtes vous sûr de vouloir supprimer l\'utilisateur')" href="<?= BASE_URL.DS.'index.php?controller=utilisateur&action=supprimer&id='.$user->id ?>"> <i class="fas fa-trash text-danger"></i> </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="Page navigation mx-auto">
                <ul class="pagination ">
                <?php for($i=1; $i <= $nbrePage; $i++){ ?> 
                        <li class=" page-item <?php echo ( ($i==$page)?  'active':'') ?>" ><a class="page-link" href="<?=BASE_URL.DS.'index.php?controller=utilisateur&action=adminindex&page='. $i; ?>"><?= $i; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </main>

    <script src="<?= BASE_URL.DS.'public/jquery3/jquery-3.6.0.min.js' ?>"></script>
    <script src="<?= BASE_URL.DS.'public/bootstrap.4.6.1/js/bootstrap.min.js' ?>"></script>
    <script src="<?= BASE_URL.DS.'public/js/app.js' ?>"></script>
</body>
</html>