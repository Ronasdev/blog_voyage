<?php
class Renderer{
    /**
     * Affiche un template HTML en injectant des $variables
     * 
     * @param string $path
     * @param array $variables
     * @return void
     */
    public static function rendre(String $gabName , array $variables = []):void
    {
        extract($variables);

        require('./vue/'.$gabName.'.php');
    }
}