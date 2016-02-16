<?php 

namespace MonApp\Classes;

class Moto extends Vehicule{
	
	use MonTrait;


	public function accelerer(){
		$this->vitesse = $this->vitesse + 2;
	}
}