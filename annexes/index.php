<?php if(!isset($_SESSION)) session_start(); ?>
<?php
define('DS',DIRECTORY_SEPARATOR);
define('BASE_URL','https://blog-merveille.000webhostapp.com/');
define('ROOT_PATH',realpath(dirname(__FILE__)));

require("./Application.php");

/**
 * C'est la page principale du site.
 * L'utilisateur l'appelle à chaque requete qu'il effectue
 * Cette page appelle l'application qui se demarre pour  effectuer le reste du travail
 */
Application::run($_GET);