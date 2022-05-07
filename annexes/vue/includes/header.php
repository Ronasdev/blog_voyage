<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitre ?></title>
    <link rel="stylesheet" href="<?=BASE_URL.DS.'public/font-awesome.5.15.4/css/all.min.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.DS.'public/bootstrap.4.6.1/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <header class="container">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark  fixed-top " >
        <a class="navbar-brand font-rubik-italic" href="<?=BASE_URL?>/index.php?controller=article&action=index"><img src="<?=BASE_URL?>/public/images/logo.jpg" alt="">Blog_Voyage</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=BASE_URL?>/index.php?controller=article&action=index"> <i class="fas fa-home"></i> Accueil <span class="sr-only">(current)</span></a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true"> <i class="fas fa-envelope"></i> Contact</a>
                </li> -->
                
                <li class="nav-item dropdown pr-1">
                <?php if(!empty($_SESSION['user'])): ?>
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['user']['prenom'] ?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <?php if($_SESSION['user']['admin'] == '1') : ?>
                            <a class="dropdown-item" href="<?=BASE_URL?>/index.php?controller=article&action=adminindex"> <i class="fas fa-list    "></i> Dashboard</a>
                        <?php endif ; ?>
                        <a class="dropdown-item" href="<?=BASE_URL?>/index.php?controller=utilisateur&action=deconnecter"> <i class="fas fa-sign-out-alt    "></i> Deconnexion</a>
                    </div>
                <?php else : ?>
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mon compte</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="<?=BASE_URL?>/index.php?controller=utilisateur&action=login"><i class="fas fa-sign-in-alt"></i> Connexion</a>
                    <a class="dropdown-item" href="<?=BASE_URL?>/index.php?controller=utilisateur&action=editer_enregistrement"><i class="fas fa-user-plus"></i>Inscription</a>
                    </div>
                <?php endif ; ?>
                </li>
            </ul>
        </div>
    </nav>
    </header>
