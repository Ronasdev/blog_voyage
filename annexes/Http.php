<?php
class Http {


 // Fonction de redirection http
    public static function redirect($url)
    {
         // Si l'adresse l'url n'est pas vide,on fait la redirection
        if (!empty($url)) {
            header("Location:$url");
            exit();
        }
    }
}