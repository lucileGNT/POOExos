<?php

namespace POOExos\Classes;

/**
 * Classe définissant un camion
 *
 * @author Lucile Gentner <lucile.gentner@gmail.com>
 */

class Camion extends Vehicule{

	use MonTrait;

	/**
	 * Constructeur de la classe
	 *
	 * @return Camion object
	 */
	public function __construct(){
		$this->nbRoues = 8;
	}


	/**
	 * Augmente la vitesse du camion
	 *
	 */
	public function accelerer(){
		if ($this->vitesse < self::VITESSE_MAX){
			$this->vitesse++;
		}

	}

}