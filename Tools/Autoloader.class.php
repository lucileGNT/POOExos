<?php

namespace POOExos\Tools;


/**
 * Class Autoloader
 *
 * @author Lucile Gentner <lucile.gentner@gmail.com>
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
            require  DIR_WWW.$class .'.class.php';
        }else{
            require  DIR_WWW.$class .'.php';
        }
    }

}