<?php  include (ROOT_PATH.'/vue/includes/header.php'); ?>
<main>


    <article class="article-show mb-4">
        <div class="container article-wrapper">
            <div class="head">
                <div class="article-info-box">
                    <img src="public/images/articles/<?= $article->image?>" alt="image article">
                </div>
            </div>
            <div class="article-body">
                <div class="article-title-m font-rubik-italic" >
                    <h2><?= $article->titre ;?></h2>
                    <small class="t">  <i class="fas fa-hand-point-right pr-2 h5 text-success   "></i>
                        <span class="text-danger h4"> <?= 'Prix: $'.( $article->prix) ?></span></span>
                    </small>
                </div>
                
                <div class="inventory_info_m text-justify">
                    <p><?= $article->contenu;?></p>
                </div>
                <div class="article-footer">
                    <span class="text-success"><small>Ecrit le <?= date("d-m-Y à H\h:i\m", strtotime($article->date_create));?> </small></span> 
                </div>
            </div>
            <div class="comment">
                <h2 class="font-poppins mt-5" style="font-size: 24px;">Déjà <?= count($commentaires)?> Commentaire(s)</h2>
                <?php if (empty($_SESSION['user'])): ?>
                    <small class="text-danger font-poppins mb-2">Vous devez vous connecter avant de commenter un article</small>
                <?php endif; ?>
                <form action="index.php?controller=commentaire&action=inserer&id=<?= $article->id ?>" method="post">
                    <div class="form-group">
                        <textarea class="form-control" name="contenu" id="" rows="5"></textarea>
                    </div>
                    <input type="hidden" name="id_aut" value="<?= ($_SESSION['user']['id'])?? '' ?>">
                    <button type="submit" class="btn btn-dark" style="float: right;">Commenter</button>
                </form>
                <div class="comment-list mt-5 pt-4">
                    <?php foreach($commentaires as $comment): ?>
                        <div>
                            <h5 class="text-muted font-size-14 font-rubik-italic"> <img class="profil" src="<?= BASE_URL.DS.'public/images/users/'. $comment->photo?>" alt=""><?=$comment->prenom ?></h5>
                            <p class="mx-5 font-rubik font-italic"><?=$comment->contenu ?> <br>
                                <small class="text-secondary"> Commenté le <?= $comment->date_create ?></small>
                            </p>
                           
                            <hr>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
         <aside class="afficher-categorie-list">
                <h4 class="text-muted font-poppins"> Rechercher par Pays</h4>
                <?php foreach($categories as $categorie): ?>
                    <a href="<?=BASE_URL?>/index.php?controller=article&action=index#<?= $categorie->nom ?>" class="btn btn-cat text-left form-control my-1">
                        <span class="font-rubik-italic font-size-12 d-flex " style="align-items: center;"><i class="fas fa-arrow-circle-right mr-1 "></i>
                            <?= $categorie->nom?> </span>
                    </a>
                <?php endforeach;?>
            </aside>
    </article>
    
    </main>
    <?php  include (ROOT_PATH.'/vue/includes/footer.php'); ?>