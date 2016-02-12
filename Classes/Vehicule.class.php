<?php

namespace MonApp\Classes;

class Vehicule{

	use MonTrait;

	protected $id;
	protected $marque;
	protected $modele;
	protected $couleur;
	protected $nbRoues;
	protected $prix;
	protected $vitesse;
	const VITESSE_MAX = 130;
	
	public function _construct(){
		$this->marque = 'Peugeot';
		$this->couleur = 'blanc';
		$this->vitesse = 50;
	}
	
	//Getters

	public function getId(){
		return $this->id;
	}

	public function getMarque(){
		return $this->marque;
	}
	
	public function getModele(){
		return $this->modele;
	}

	public function getCouleur(){
		return $this->couleur;
	}
	
	public function getNbRoues(){
		return $this->nbRoues;
	}
	
	public function getVitesse(){
		return $this->vitesse;
	}

	public function getPrix(){
		return $this->prix;
	}
	
	//Setters

	public function setId($v){
		return $this->id = $v; 
	}

	public function setMarque($v){
		return $this->marque = $v;
	}

	public function setModele($v){
		return $this->modele = $v;
	}

	public function setCouleur($v){
		return $this->couleur = $v;
	}

	public function setPrix($v){
		return $this->prix = $v;
	}
	
	public function setVitesse($v){
		return $this->vitesse = $v;
	}

	public function setNbRoues($v){
		return $this->nbRoues = $v;
	}


	public function accelerer(){
		$this->vitesse++;
	}
	
	public function freiner(){
		$this->vitesse--;
	}

	public function __set($nom,$valeur){
		echo 'Impossible d\'assigner à l\'attribut '.$nom.' la valeur '.$valeur;
	}
	
	/*Convertit la vitesse en mph*/
	public static function getVitesseMph($vitesse){
		//1 mph = 1.609344 km/h
		return $vitesse / 1.609344;
	}
	
	public function hydrate($aDonnees){
		foreach ($aDonnees as $sKey => $sValue){

			//toCamelCase
			$aKey = explode('_', $sKey);
			foreach ($aKey as &$oneKey){
				$oneKey = ucfirst($oneKey); 
			}
			$sKey = implode($aKey);

		    $sMethod = 'set'.$sKey;
		        
		    if (method_exists($this, $sMethod)){
		      	$this->$sMethod($sValue);
		    }
		}
		
	}
}
