 <?php  include_once (ROOT_PATH.'/vue/includes/header.php'); ?>
 
    <main>
        <div class="jumbotron">
            <div class="contenu">
                <div class="center font-rubik-italic">
                    <h1 style="font-size: 54px;" >Blog de voyage autour du monde</h1>
                    <h2 class="font-italic" style="font-size: 24px;">Voyager à traver le monde afin de découvrir votre passions !</h2>
                </div>
            </div>
        </div>
        <article class="articles pl-2">
            <h1 class="font-poppins text-muted" style="text-align: center;">Les derniers articles</h1>
            <div class="articles-content" >
                <div class="article-list">
                    <?php foreach($articles3 as $article): ?>
                        <div class="article-item">
                            <div class="head">
                            <a href="index.php?controller=article&action=afficher&id=<?= $article->id?>">
                                <img src="public/images/articles/<?= $article->image?>" alt="image article">
                            </a>
                            </div>
                            <div class="content">
                                <h2 class="font-poppins" style="font-size: 18px;"><?= $article->titre?></h2>
                                <p>  <?= substr($article->contenu,0,155 ).'...'?></p>
                                <div class="footer">
                                    <a class="text-info" href="index.php?controller=article&action=afficher&id=<?= $article->id?>">
                                        Lire la suite...
                                    </a>
                                    <small class="float-right">  <i class="fas fa-hand-point-right pr-2 h5 text-success   "></i>
                                        <span class="text-danger"> <?= 'Prix: $'.( $article->prix) ?></span> PAYS: <span><?= $article->nom?></span>
                                    </small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                
                </div>
                <aside class="categorie-list">
                    <h4 class="text-muted font-poppins"> Rechercher par Pays</h4>
                    <?php foreach($categories as $categorie): ?>
                        <a href="#<?= $categorie->nom?>" class="btn btn-cat text-left form-control my-1">
                            <span class="font-rubik-italic font-size-12 d-flex " style="align-items: center;"><i class="fas fa-arrow-circle-right mr-1 "></i>
                             <?= $categorie->nom?> </span>
                        </a>
                    <?php endforeach;?>
                </aside>
            </div>
        </article>
        <hr>
        <?php foreach($categories as $categorie): ?>
            <article class="articles-par-pays mx-5" style="padding-top: 70px;" id="<?= $categorie->nom?>">
                <h1 class="font-poppins text-muted" style="text-align: center;">Tout savoir sur le voyage à <?= $categorie->nom?></h1>
                <div class="list d-flex w-100 justify-content-start flex-wrap">
                <?php foreach($articles as $article): ?>
                    <?php if($article->nom === $categorie->nom): ?>
                        <div class="article-item mb-0">
                            <div class="head">
                            <a href="index.php?controller=article&action=afficher&id=<?= $article->id?>">
                                <img src="public/images/articles/<?= $article->image?>" alt="image article">
                            </a>
                            </div>
                            <div class="content">
                                <h2 class="font-poppins" style="font-size: 18px;"><?= $article->titre?></h2>
                                <p>  <?= substr($article->contenu,0,155 ).'...'?></p>
                                <div class="footer">
                                    <a class="text-info" href="index.php?controller=article&action=afficher&id=<?= $article->id?>">
                                        Lire la suite...
                                    </a>
                                    <small class="float-right">  <i class="fas fa-hand-point-right pr-2 h5 text-success   "></i>
                                        <span class="text-danger"> <?= 'Prix: $'.( $article->prix) ?></span> PAYS: <span><?= $article->nom?></span>
                                    </small>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                <?php endforeach;?>
                </div>
            </article>
            <hr>
        <?php endforeach;?>
    </main>
    <?php  include (ROOT_PATH.'/vue/includes/footer.php'); ?>
    
    