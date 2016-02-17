<?php 

namespace POOExos\Classes;

/**
 * Classe définissant une moto
 *
 * @author Lucile Gentner <lucile.gentner@gmail.com>
 */

class Moto extends Vehicule{
	
	use MonTrait;

	/**
	 * Augmente la vitesse de la moto
	 *
	 * @return Moto object
	 */
	public function accelerer(){
		$this->vitesse = $this->vitesse + 2;
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