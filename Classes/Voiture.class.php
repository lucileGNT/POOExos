<?php

namespace MonApp\Classes;

class Voiture extends Vehicule{
	public function accelerer(){
		if ($this->vitesse < 0){
			throw new InvalidSpeedException();
		}
		$this->vitesse++;
	}

}