<?php

namespace MonApp\Classes;

class Camion extends Vehicule{

	use MonTrait;

	public function __construct(){
		$this->nbRoues = 8;
	}

}