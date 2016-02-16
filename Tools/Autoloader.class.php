<?php

namespace MonApp\Tools;

/**
 * Class Autoloader
 */
class Autoloader{

    /**
     * Enregistre notre autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclut le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class){
        if (strpos($class, 'Classes') != false){
            require  '../'.$class .'.class.php';
        }else{
            require  '../'.$class .'.php';
        }
    }

}