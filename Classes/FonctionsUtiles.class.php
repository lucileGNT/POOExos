<?php

namespace POOExos\Classes;

/**
 * Trait contenant quelques fontions utiles
 *
 * @author Lucile Gentner <lucile.gentner@gmail.com>
 */

trait FonctionsUtiles
{

/**
 * Fonction retournant un Hello World
 *
 *
 * @return string Hello World
 */
  public function hello()
  {
    echo 'Hello world !';
  }

/**
 * Formate un prix
 *
 * @param float le prix à formater
 *
 * @return string le prix formaté
 */

  public function formaterPrix($prix){
  	return number_format($prix,2,',',' ')."€";
  }

  /**
 * "Camelize" un texte donné
 *
 * @param string le texte à cameliser
 *
 * @return string le texte camélisé
 */

  public static function toCamelCase($text){
	$array = explode('_', $text);
	foreach ($array as &$item){
		$item = ucfirst($item); 
	}
	return implode($array);

  }
}