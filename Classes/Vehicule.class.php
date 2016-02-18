<?php

namespace POOExos\Classes;

/**
 * Classe définissant un véhicule
 *
 * @author Lucile Gentner <lucile.gentner@gmail.com>
 */

abstract class Vehicule implements \POOExos\Interfaces\MoyensDeTransport{

	use FonctionsUtiles;

	protected $id;
	protected $marque;
	protected $modele;
	protected $couleur;
	protected $nbRoues;
	protected $prix;
	protected $vitesse;
	const VITESSE_MAX = 130;
	
	/**
	 * Constructeur de la classe
	 *
	 * @return Vehicule object
	 */
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
	
	/**
	 * Modifie la vitesse du Vehicule
	 *
	 * @param float $vitesse la valeur souhaitée pour la vitesse
 	 * 
	 * @throws InvalidSpeedException
	 *
	 * @return array la nouvelle vitesse
	 */
	public function setVitesse($v){
		if ($v < 0){
			throw new InvalidSpeedException('La vitesse ne peut pas être négative !');
		}
		return $this->vitesse = $v;
	}

	public function setNbRoues($v){
		return $this->nbRoues = $v;
	}


	/**
	 * Accélère la vitesse du véhicule
	 *
	 * @return void
	 */	
	public abstract function accelerer();
	
	public function freiner(){
		$this->vitesse--;
	}

	public function __set($nom,$valeur){
		echo 'Impossible d\'assigner à l\'attribut '.$nom.' la valeur '.$valeur;
	}
	
	/**
	 * Convertit la vitesse en mph
	 *
	 * @param float $vitesse la vitesse à convertir
	 *
	 * @return float la vitesse convertie
	 */
	public static function getVitesseMph($vitesse){
		//1 mph = 1.609344 km/h
		return $vitesse / 1.609344;
	}

	/**
	 * Hydrate un objet Vehicule
	 *
	 * @param $aDonnees les données à assigner à l'objet
	 *
	 * @return Vehicule object l'objet hydraté
	 */
	
	public function hydrate($aDonnees){
		foreach ($aDonnees as $sKey => $sValue){

			$sKey = FonctionsUtiles::toCamelCase($sKey);

		    $sMethod = 'set'.$sKey;
		        
		    if (method_exists($this, $sMethod)){
		      	$this->$sMethod($sValue);
		    }
		}
		
	}


}
