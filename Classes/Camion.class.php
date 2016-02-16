<?php

namespace MonApp\Classes;

class Camion extends Vehicule{

	use MonTrait;

	public function __construct(){
		$this->nbRoues = 8;
	}


	public function accelerer(){
		if ($this->vitesse < self::VITESSE_MAX){
			$this->vitesse++;
		}

	}

}