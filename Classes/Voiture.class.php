<?php

namespace POOExos\Classes;

/**
 * Classe définissant une voiture
 *
 * @author Lucile Gentner <lucile.gentner@gmail.com>
 */

class Voiture extends Vehicule{


	/**
	 * Augmente la vitesse de la voiture
	 *
	 * @return Moto object
	 */
	public function accelerer(){
		if ($this->vitesse < 0){
			throw new InvalidSpeedException();
		}
		$this->vitesse++;
	}

	/**
	 * Retourne le prix formaté
	 *
	 * @param float le prix à formater
	 *
	 * @return string le prix formaté
	 */
	public function getPrixFormate(){
		return $this->formaterPrix($this->prix);
	}

}